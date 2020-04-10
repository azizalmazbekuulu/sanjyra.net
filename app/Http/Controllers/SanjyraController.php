<?php

namespace App\Http\Controllers;

use App\Man;
use App\Name;
use App\Uruu;
use App\Woman;
use App\Article;
use App\Category;
use App\Literature;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SanjyraController extends Controller
{
	public function index()
	{
		$active_id = 1;
		$man_id = 2;
		$father_id = 1;
		return view('sanjyra.home', [
			'active_man_id' => $active_id,
			'father' => Man::with(['children' => function ($query) {
								$query->orderBy('kanchanchy_bala');
						},'kyzdary' => function ($query) {
								$query->orderBy('kanchanchy_kyz');
						}])->find($father_id),
			'man'    => Man::with(['children' => function ($query) {
								$query->orderBy('kanchanchy_bala');
						},'kyzdary' => function ($query) {
								$query->orderBy('kanchanchy_kyz');
						}])->find($man_id),
			'uruular' => Uruu::orderBy('name')->get(),
			'person' => Man::with('father')->where('id', $active_id)->get()->first()
		]);
	}

	public function man(Int $id = 1)
	{
		$man = Man::find($id);
		$active_id = 1;
		$man_id = 2;
		$father_id = 1;
		if ($man->id != 1) {
			$active_id = $man->id;
			$man_id = $man->id;
			$father_id = $man->father_id;
		}
		return view('sanjyra.home', [
			'active_man_id' => $active_id,
			'father' => Man::with(['children' => function ($query) {
								$query->orderBy('kanchanchy_bala');
						},'kyzdary' => function ($query) {
								$query->orderBy('kanchanchy_kyz');
						}])->find($father_id),
			'man'    => Man::with(['children' => function ($query) {
								$query->orderBy('kanchanchy_bala');
						},'kyzdary' => function ($query) {
								$query->orderBy('kanchanchy_kyz');
						}])->find($man_id),
			'uruular' => Uruu::orderBy('name')->get(),
			// Full generation
			'person' => Man::with('father')->where('id', $active_id)->get()->first()
		]);
	}

	public function woman_show(Int $id)
	{
		$woman = Woman::find($id);
		$man = Man::find($woman->father_id);
		$active_id = 1;
		$man_id = 2;
		$father_id = 1;
		if ($man->id != 1) {
			$active_id = $man->id;
			$man_id = $man->id;
			$father_id = $man->father_id;
		}
		return view('sanjyra.home', [
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
							}])->find($man_id),
			'uruular' => Uruu::orderBy('name')->get(),
			'person' => Man::with('father')->where('id', $active_id)->get()->first()
		]);
	}

	public function name(Request $request)
	{
		$name = $request['name'];
		return view('sanjyra.names.show', [
			'active_name'  => Name::where('name', $name)->get()->first(),
			'common_names' => Name::where('number_of_name', '>', 150)->orderBy('number_of_name', 'desc')->paginate(10),
			'name' => $name
		]);
	}

	public function famous_people(String $category = null)
	{
		if (null == $category)
			$category = 'pervaya-1502200522';
		return view('sanjyra.famous.famous', [
			'category' => Category::with(['men' => function ($query) {
							$query->orderBy('image', 'desc');
					},'women' => function ($query) {
							$query->orderBy('image', 'desc');
					}])->where('slug', $category)->get()->first(),
			'categories' => Category::where('published', 1)->orderBy('title')->get()
		]);
	}

	public function article(String $slug = '')
	{
		$article = Article::where('slug', $slug)->get()->first();
		return view('sanjyra.articles.articles', [
			'active_article' => $article,
			'articles' => Article::where('published', 1)->orderBy('created_at', 'desc')->paginate(10)
		]);
	}

	public function terms_of_use()
	{
		return view('sanjyra.about.terms_of_use');
	}

	public function literatures()
	{
		return view('sanjyra.literatures.literatures');
	}

	/**
	* Update names from Men and Women tables
	*
	* @return \Illuminate\Http\Response
	*/
	// public function fillFrom()
	// {
	// 	$man_names = Man::selectRaw('name, count(*) as count_name')->groupBy('name')->get();
	// 	$woman_names = Woman::selectRaw('name, count(*) as count_name')->groupBy('name')->get();
	// 	foreach ($man_names as $man_name) {
	// 		if (Name::where('name', $man_name['name'])->exists()) {
	// 			$name = Name::where('name', $man_name['name'])->get()->first();
	// 			$name->number_of_name = $man_name['count_name'];
	// 			$name->updated_at = Carbon::now();
	// 			$name->save();
	// 		} else {
	// 			Name::create([
	// 				'name' => $man_name['name'],
	// 				'number_of_name' => $man_name['count_name'],
	// 				'created_by' => 1,
	// 				'male_female' => 0,
	// 				'created_at' => Carbon::now(),
	// 				'updated_at' => Carbon::now()
	// 			]);
	// 		}
	// 	}
	// 	foreach ($woman_names as $woman_name) {
	// 		if (Name::where('name', $woman_name['name'])->exists()) {
	// 			$name = Name::where('name', $woman_name['name'])->get()->first();
	// 			$name->number_of_name = $woman_name['count_name'];
	// 			$name->updated_at = Carbon::now();
	// 			$name->save();
	// 		} else {
	// 			Name::create([
	// 				'name' => $woman_name['name'],
	// 				'number_of_name' => $woman_name['count_name'],
	// 				'created_by' => 1,
	// 				'male_female' => 0,
	// 				'created_at' => Carbon::now(),
	// 				'updated_at' => Carbon::now()
	// 			]);
	// 		}
	// 	}
	// 	return redirect()->route('name');
	// }
}
