<?php

namespace App\Http\Controllers\Admin;

use App\Models\Man;
use App\Models\Name;
use App\Models\Woman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NameController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index(Request $request)
	{
		if ($request['name'] != '')
		return view('admin.names.index', [
			'query' => $request['name'],
			'names' => Name::where('name', 'like', $request['name'].'%')->orderBy('name')->get()
		]);
		elseif ($request['name'] == '')
		return view('admin.names.index');
	}

	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
		return view('admin.names.create', [
			'name' => [],
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
		$name = Name::create($request->all());
		if ($name->male_female)
			$number_of_name = Man::where('name', $name->name)->count();
		else
			$number_of_name = Woman::where('name', $name->name)->count();
		$name->number_of_name = $number_of_name;
		$name->save();
		return redirect()->route('admin.name.index');
	}

	/**
	* Display the specified resource.
	*
	* @param  \App\Name  $name
	* @return \Illuminate\Http\Response
	*/
	public function show(Name $name)
	{
		//
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Name  $name
	* @return \Illuminate\Http\Response
	*/
	public function edit(Name $name)
	{
		return view('admin.names.edit', [
			'name'    => $name
		]);
	}

	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  \App\Name  $name
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, Name $name)
	{
		$name->update($request->except('name'));
		return redirect()->route('admin.name.index');
	}

	/**
	* Remove the specified resource from storage.
	*
	* @param  \App\Name  $name
	* @return \Illuminate\Http\Response
	*/
	public function destroy(Name $name)
	{
		$name->delete();
		return redirect()->route('admin.name.index');
	}
}
