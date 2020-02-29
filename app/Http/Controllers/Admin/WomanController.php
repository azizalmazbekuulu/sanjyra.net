<?php

namespace App\Http\Controllers\Admin;

use App\Man;
use App\Name;
use App\Category;
use App\Woman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WomanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $man = Man::find(1);
        return redirect()->route('admin.man.edit', $man);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $man = Man::find(1);
        return redirect()->route('admin.man.edit', $man);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $father = Man::with('kyzdary')->find($request->father_id);
        $kanchanchy_kyz = $father->kyzdary->count() + 1;
        $woman = Woman::create([
            'name' => $request['name'],
            'father_id' => $request['father_id'],
            'kanchanchy_kyz' => $kanchanchy_kyz,
            'created_by' => $request['created_by']
        ]);
        $name = Name::where('name', $woman->name)->get()->first();
        if ($name == null)
            Name::create(['name' => $woman->name, 'slug' => '', 'male_female' => 0, 'number_of_name' => 1]);
        else {
            $name = Name::where('name', $woman->name)->get()->first();
            $name->number_of_name++;
            $name->save();
        }
        return redirect()->route('admin.man.edit', $father);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Woman  $woman
     * @return \Illuminate\Http\Response
     */
    public function show(Woman $woman)
    {
        return redirect()->route('admin.woman.edit', $woman);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Woman  $woman
     * @return \Illuminate\Http\Response
     */
    public function edit(Woman $woman)
    {
        $man = Man::find($woman->father_id);
        if ($man->id == 1) {
            $id = 2;
            $father_id = 1;
        }
        else {
            $id = $man->id;
            $father_id = $man->father_id;
        }
        return view('admin.men.edit', [
            'active_man_id'   => $man->id,
            'active_woman' => Woman::with(['uuldary' => function ($query) {
                                $query->orderBy('kanchanchy_bala');
                            }])->find($woman->id),
            'father' => Man::with(['children' => function ($query) {
                                $query->orderBy('kanchanchy_bala');
                            },'kyzdary' => function ($query) {
                                $query->orderBy('kanchanchy_kyz');
                            }])->find($father_id),
            'man'    => Man::with(['children' => function ($query) {
                                $query->orderBy('kanchanchy_bala');
                            },'kyzdary' => function ($query) {
                                $query->orderBy('kanchanchy_kyz');
                            }])->find($id),
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Woman  $woman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Woman $woman)
    {
        if ($woman->name !== $request['name']) {
            $name = Name::where('name', $woman->name)->get()->first();
            $name->number_of_name--;
            $name->save();
        }
        $woman->name = $request['name'];
        $woman->mother_id = $request['mother_id'];
        $woman->mother_name = $request['mother_name'];
        $woman->info = $request['info'];

        //Categories
        $woman->categories()->detach();
        if ($request->input('categories')) :
            $woman->categories()->attach($request->input('categories'));
        endif;
        $woman->save();
        $name = Name::where('name', $woman->name)->get()->first();
        if ($name == null)
            Name::create(['name' => $woman->name, 'male_female' => 0, 'slug' => '', 'number_of_name' => 1]);
        return redirect()->route('admin.woman.edit', $woman);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Woman  $woman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Woman $woman)
    {
        $woman->categories()->detach();
        $father_id = $woman->father_id;
        $kanchanchy_kyz = $woman->kanchanchy_kyz;
        $name = Name::where('name', $woman->name)->get()->first();
        $name->number_of_name--;
        $name->save();
        $woman->delete();
        $father = Man::with('kyzdary')->find($father_id);
        foreach ($father->kyzdary as $child)
            if ($child->kanchanchy_kyz > $kanchanchy_kyz)
                $child->update(['kanchanchy_kyz' => ($child->kanchanchy_kyz -1)]);
        return redirect()->route('admin.man.edit', $father);
    }
}
