<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Literature;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LiteratureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.literatures.index', [
            'literatures' => Literature::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.literatures.create', [
            'literature'    => [],
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
        $literature = Literature::create($request->except(['photo','categories']));

        // Image
        $literature->image = $request->file('photo')->store('literature-image', 'public');
        $literature->save();

        // Categories
        if ($request->input('categories')) :
            $literature->categories()->attach($request->input('categories'));
        endif;
        
        return redirect()->route('admin.literature.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Literature  $literature
     * @return \Illuminate\Http\Response
     */
    public function show(Literature $literature)
    {
        return view('admin.literatures.show', [
            'literature' => $literature
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Literature  $literature
     * @return \Illuminate\Http\Response
     */
    public function edit(Literature $literature)
    {
        return view('admin.literatures.edit', [
            'literature'    => $literature,
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Literature  $literature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Literature $literature)
    {
        $literature->update($request->except('slug','categories', 'photo'));

        // Image
        if ($request->file('photo') != null) {
            Storage::delete($literature->image);
            $literature->image = $request->file('photo')->store('literature-image', 'public');
            $literature->save();
        }

        //Categories
        $literature->categories()->detach();
        if ($request->input('categories')) :
            $literature->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('admin.literature.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Literature  $literature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Literature $literature)
    {
        Storage::delete($literature->image);

        $literature->categories()->detach();
        $literature->delete();

        return redirect()->route('admin.literature.index');
    }
}
