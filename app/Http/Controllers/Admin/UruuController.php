<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Uruu;
use App\Category;
use Illuminate\Http\Request;

class UruuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.uruu.index', [
            'uruular'=>Uruu::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.uruu.create', [
            'uruu'   => [],
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
        Uruu::create($request->all());
        //Categories
        if ($request->input('categories')) :
            $uruu->categories()->attach($request->input('categories'));
        endif;
        return redirect()->route('admin.uruu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Uruu  $uruu
     * @return \Illuminate\Http\Response
     */
    public function show(Uruu $uruu)
    {
        return view('admin.uruu.show', [
            'uruu' => $uruu
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Uruu  $uruu
     * @return \Illuminate\Http\Response
     */
    public function edit(Uruu $uruu)
    {
        return view('admin.uruu.edit', [
            'uruu'   => $uruu,
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Uruu  $uruu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Uruu $uruu)
    {
        $uruu->update($request->except('slug'));
        //Categories
        $uruu->categories()->detach();
        if ($request->input('categories')) :
            $article->categories()->attach($request->input('categories'));
        endif;
        return redirect()->route('admin.uruu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Uruu  $uruu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uruu $uruu)
    {
        $uruu->categories()->detach();
        $uruu->delete();

        return redirect()->route('admin.uruu.index');
    }
}
