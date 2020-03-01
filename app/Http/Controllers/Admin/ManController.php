<?php

namespace App\Http\Controllers\Admin;

use App\Man;
use App\Name;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ManController extends Controller
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
        $man = Man::create([
            'name' => $request['name'],
            'father_id' => $request['father_id'],
            'level' => $request['level'] + 1,
            'uruusu' => $request['uruusu'],
            'kanchanchy_bala' => $request['kanchanchy_bala'] + 1,
            'created_by' => $request['created_by']
        ]);
        $father = Man::find($request->father_id);
        $father->update(['bala_sany' => $father->bala_sany + 1]);
        $name = Name::where('name', $man->name)->get()->first();
        if ($name == null) {
            $number_of_name = Man::where('name', $man->name)->count();
            Name::create(['name' => $man->name, 'slug' => '', 'male_female' => 1, 'number_of_name' => $number_of_name]);
        }
        else {
            $name = Name::where('name', $man->name)->get()->first();
            $name->number_of_name++;
            $name->save();
        }
        return redirect()->route('admin.man.edit', $father);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Man  $man
     * @return \Illuminate\Http\Response
     */
    public function show(Man $man)
    {
        return redirect()->route('admin.man.edit', $man);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Man  $man
     * @return \Illuminate\Http\Response
     */
    public function edit(Man $man)
    {
        if ($man->id == 1) {
            $id = 2;
            $father_id = 1;
        }
        else {
            $id = $man->id;
            $father_id = $man->father_id;
        }
        return view('admin.men.edit', [
            'active_man_id' => $man->id,
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
            'delimiter'  => '',
            'person' => Man::with('father')->where('id', $man->id)->get()->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Man  $man
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Man $man)
    {
        if ($man->name !== $request['name']) {
            $name = Name::where('name', $man->name)->get()->first();
            $name->number_of_name--;
            $name->save();
        }
        $man->update($request->except('categories'));

        //Categories
        $man->categories()->detach();
        if ($request->input('categories')) :
            $man->categories()->attach($request->input('categories'));
        endif;
        $name = Name::where('name', $man->name)->get()->first();
        if ($name == null)
            Name::create(['name' => $man->name, 'slug' => '', 'male_female' => 1, 'number_of_name' => 1]);
        return redirect()->route('admin.man.edit', $man);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Man  $man
     * @return \Illuminate\Http\Response
     */
    public function destroy(Man $man)
    {
        $man->categories()->detach();
        $father_id = $man->father_id;
        $kanchanchy_bala = $man->kanchanchy_bala;
        $name = Name::where('name', $man->name)->get()->first();
        if ($name != null) {
            $name->number_of_name--;
            $name->save();
        }
        $man->delete();
        $father = Man::with('children')->find($father_id);
        $father->update(['bala_sany' => ($father->bala_sany - 1)]);
        foreach ($father->children as $child)
            if ($child->kanchanchy_bala > $kanchanchy_bala)
                $child->update(['kanchanchy_bala' => ($child->kanchanchy_bala -1)]);
        return redirect()->route('admin.man.edit', $father);
    }
}
