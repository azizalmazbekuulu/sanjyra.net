<?php

namespace App\Http\Controllers;

use App\Man;
use App\Name;
use App\Uruu;
use App\Woman;
use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SanjyraController extends Controller
{
    public function index($id = 1)
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

    public function woman_show($id)
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

    public function name($slug = '')
    {
        return view('sanjyra.names.show', [
            'active_name'  => Name::where('slug', $slug)->get()->first(),
            'names' => Name::orderBy('created_at', 'desc')->paginate(7),
            'common_names' => Name::orderBy('number_of_name', 'desc')->paginate(7)
        ]);
    }

    public function famous_people(Category $category = null)
    {
        return view('sanjyra.famous.index', [
            // 'famous_people' => ,
        ]);
    }

    public function category()
    {
        # code...
    }

    public function article()
    {
        # code...
    }
}
