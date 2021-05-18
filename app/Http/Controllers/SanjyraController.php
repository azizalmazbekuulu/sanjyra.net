<?php

namespace App\Http\Controllers;

use App\Models\Man;
use App\Models\Name;
use App\Models\Uruu;
use App\Models\Woman;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SanjyraController extends Controller
{
	public function index()
	{
		$active_id = 1;
		$man_id = 2;
		$father_id = 1;
		return cache()->remember('sanjyra-home-page', 3600*24*30, function() use ($active_id,$father_id,$man_id){
			return  view('sanjyra.home', [
				'active_man_id' => $active_id,
				'father' => Man::with(['children' => function ($query) {
									$query->where('is_removed', '0')->orderBy('kanchanchy_bala');
							}])->find($father_id),
				'man'    => Man::with(['children' => function ($query) {
									$query->where('is_removed', '0')->orderBy('kanchanchy_bala');
							},'kyzdary' => function ($query) {
									$query->where('is_removed', '0')->orderBy('kanchanchy_kyz');
							}])->find($man_id),
				'uruular' => Uruu::orderBy('name')->get(),
				'person' => Man::with('father')->where('id', $active_id)->first()
			])->render();
		});
	}

	public function man(Int $id = 1)
	{
		$man = cache()->rememberForever('man-query-'.$id, function() use ($id){
			return Man::find($id);
		});
		$active_id = 1;
		$man_id = 2;
		$father_id = 1;
		if ($man->id != 1) {
			$active_id = $man->id;
			$man_id = $man->id;
			$father_id = $man->father_id;
		}
		return cache()->rememberForever('man-'.$active_id, function() use ($active_id,$man_id,$father_id) {
			return view('sanjyra.home', [
				'active_man_id' => $active_id,
				'father' => Man::with(['children' => function ($query) {
									$query->where('is_removed', '0')->orderBy('kanchanchy_bala');
							}])->find($father_id),
				'man'    => Man::with(['children' => function ($query) {
									$query->where('is_removed', '0')->orderBy('kanchanchy_bala');
							},'kyzdary' => function ($query) {
									$query->where('is_removed', '0')->orderBy('kanchanchy_kyz');
							}])->find($man_id),
				'uruular' => Uruu::orderBy('name')->get(),
				// Full generation
				'person' => Man::with('father')->where('id', $active_id)->first()
			])->render();
		});
	}

	public function woman_show(Int $id)
	{
		$woman = cache()->rememberForever('women-query-'.$id, function() use ($id) {
			return Woman::find($id);
		});
		$man = cache()->rememberForever('man-query-'.$woman->father_id, function() use ($woman) {
			return Man::find($woman->father_id);
		});
		$active_id = 1;
		$man_id = 2;
		$father_id = 1;
		if ($man->id != 1) {
			$active_id = $man->id;
			$man_id = $man->id;
			$father_id = $man->father_id;
		}
		return cache()->rememberForever('woman-'.$id, function() use ($active_id,$man_id,$father_id,$woman,$man) {
			return view('sanjyra.home', [
				'active_man_id'   => $man->id,
				'active_woman' => Woman::with(['uuldary' => function ($query) {
										$query->where('is_removed', '0')->orderBy('kanchanchy_bala');
								}, 'kyzdary' => function ($query) {
										$query->where('is_removed', '0')->orderBy('kanchanchy_kyz');
								}])->find($woman->id),
				'father' => Man::with(['children' => function ($query) {
										$query->where('is_removed', '0')->orderBy('kanchanchy_bala');
								}])->find($father_id),
				'man'    => Man::with(['children' => function ($query) {
										$query->where('is_removed', '0')->orderBy('kanchanchy_bala');
								},'kyzdary' => function ($query) {
										$query->where('is_removed', '0')->orderBy('kanchanchy_kyz');
								}])->find($man_id),
				'uruular' => Uruu::orderBy('name')->get(),
				'person' => Man::with('father')->where('id', $active_id)->first()
			])->render();
		});
	}

	public function name(Request $request)
	{
		$name = $request['name'];
		return cache()->rememberForever('name-'.$name, function() use ($name) {
			return view('sanjyra.names.show', [
				'active_name'  => Name::where('name', $name)->first(),
				'common_names' => Name::where('number_of_name', '>', 150)->orderBy('number_of_name', 'desc')->paginate(10),
				'name' => $name
			])->render();
		});
	}

	public function famous_people(String $category = null)
	{
		if (null == $category)
			$category = 'tarykhiy-insandar';
		return cache()->rememberForever('famous-people-'.$category, function() use ($category) {
			return view('sanjyra.famous.famous', [
				'category' => Category::with(['men' => function ($query) {
								$query->where('is_removed', '0')->orderBy('image', 'desc');
						},'women' => function ($query) {
								$query->where('is_removed', '0')->orderBy('image', 'desc');
						}])->where('slug', $category)->get()->first(),
				'categories' => Category::where('published', 1)->orderBy('title')->get()
			])->render();
		});
	}

	public function article(String $slug = '')
	{
		$article = cache()->rememberForever('article-query-'.$slug, function() use ($slug) {
			return Article::where('slug', $slug)->first();
		});
		if ($article != null)
			$article->update(['viewed' => $article->viewed + 1]);
		return cache()->rememberForever('article-'.$slug, function() use ($article) {
			return view('sanjyra.articles.articles', [
				'active_article' => $article,
				'articles' => Article::where('published', 1)->orderBy('created_at', 'desc')->paginate(10)
			])->render();
		});
	}

	public function terms_of_use()
	{
		return cache()->rememberForever('terms-of-use', function() {
			return view('sanjyra.about.terms_of_use')->render();
		});
	}

	public function literatures()
	{
		return cache()->rememberForever('literatures', function() {
			return view('sanjyra.literatures.literatures')->render();
		});
	}
}
