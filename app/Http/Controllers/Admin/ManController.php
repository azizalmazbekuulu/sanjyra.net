<?php

namespace App\Http\Controllers\Admin;

use App\Man;
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
        $id = $man->id;
        $father_id = $man->father_id;
        if ($man->id == 1)
        {
            $id = 2;
            $father_id = $man->id;
        }
        return view('admin.men.edit', [
            'active'     => $man->id,
            'father'     => Man::with(['children' => function ($query) {
                $query->orderBy('kanchanchy_bala');
              }])->where('id', $father_id)->get()->first(),
            'man'        => Man::with(['children' => function ($query) {
                $query->orderBy('kanchanchy_bala');
              }])->where('id', $id)->get()->first(),
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            'delimiter'  => ''
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
        $man->update($request->all());

        //Categories
        $man->categories()->detach();
        if ($request->input('categories')) :
            $man->categories()->attach($request->input('categories'));
        endif;
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
        $man->delete();
        $father = Man::with('children')->find($father_id);
        $father->update(['bala_sany' => ($father->bala_sany - 1)]);
        foreach ($father->children as $child)
            if ($child->kanchanchy_bala > $kanchanchy_bala)
                $child->update(['kanchanchy_bala' => ($child->kanchanchy_bala -1)]);
        return redirect()->route('admin.man.edit', $father);
    }
}
