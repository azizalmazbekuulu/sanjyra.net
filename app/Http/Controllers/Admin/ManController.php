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
        return view('admin.men.index', [
            'man'           => Man::find(1),
            'children'      => Man::with('children')->where('father_id', 1)->get(),
            'grandchildren' => Man::with('children')->where('father_id', 2)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.men.create', [
            'man'    => [],
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $man = Man::create($request->all());
        //Categories
        if ($request->input('categories')) :
            $man->categories()->attach($request->input('categories'));
        endif;
        return redirect()->route('admin.man.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Man  $man
     * @return \Illuminate\Http\Response
     */
    public function show(Man $man)
    {
        if ($man->id == 1)
            return view('admin.men.index', [
                'man'           => Man::find(1),
                'children'      => Man::with('children')->where('father_id', 1)->get(),
                'grandchildren' => Man::with('children')->where('father_id', 2)->get()
            ]);
        else
            return view('admin.men.show', [
                'man'           => Man::find($man->father_id),
                'children'      => Man::with('children')->where('father_id', $man->father_id)->get(),
                'grandchildren' => Man::with('children')->where('father_id', $man->id)->get()
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Man  $man
     * @return \Illuminate\Http\Response
     */
    public function man(Man $man)
    {
        if ($man->id == 1)
            return view('men.show', [
                'man'           => Man::find(1),
                'children'      => Man::with('children')->where('father_id', 1)->get(),
                'grandchildren' => Man::with('children')->where('father_id', 2)->get()
            ]);
        else
            return view('men.show', [
                'man'           => Man::find($man->father_id),
                'children'      => Man::with('children')->where('father_id', $man->father_id)->get(),
                'grandchildren' => Man::with('children')->where('father_id', $man->id)->get()
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Man  $man
     * @return \Illuminate\Http\Response
     */
    public function edit(Man $man)
    {
        return view('admin.men.edit', [
            'man'    => $man,
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
        $man->update();

        //Categories
        $man->categories()->detach();
        if ($request->input('categories')) :
            $man->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('admin.man.index');
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
        $man->delete();

        return redirect()->route('admin.man.index');
    }
}
