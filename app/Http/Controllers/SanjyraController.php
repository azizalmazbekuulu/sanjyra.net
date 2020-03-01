<?php

namespace App\Http\Controllers;

use App\Man;
use App\Woman;
use App\Category;
use App\Article;
use App\Name;
use Illuminate\Http\Request;

class SanjyraController extends Controller
{
    public function index()
    {
        return view('sanjyra.home', [
            'active_man_id' => 1,
            'father' => Man::with(['children' => function ($query) {
                                $query->orderBy('kanchanchy_bala');
                            },'kyzdary' => function ($query) {
                                $query->orderBy('kanchanchy_kyz');
                            }])->find(1),
            'man'    => Man::with(['children' => function ($query) {
                                $query->orderBy('kanchanchy_bala');
                            },'kyzdary' => function ($query) {
                                $query->orderBy('kanchanchy_kyz');
                            }])->find(2),
            'names' => Name::orderBy('created_at', 'desc')->paginate(7),
            'common_names' => Name::orderBy('number_of_name', 'desc')->paginate(7)
        ]);
    }

    public function man(Man $man = null)
    {
        $active_id = 1;
        $man_id = 2;
        $father_id = 1;
        if ($man != null && $man->id != 1) {
            $active_id = $man->id;
            $man_id = $man->id;
            $father_id = $man->father_id;
        }
        return view('sanjyra.men.show', [
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
            'person' => Man::with('father')->where('id', $active_id)->get()->first()
        ]);
    }

    public function woman_show(Woman $woman)
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
        return view('sanjyra.men.show', [
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

    public function famous_people(Category $category)
    {
        return view('sanjyra.famous.index', [
            // 'famous_people' => ,
        ]);
    }

    public function person_search(String $man, String $father)
    {
        // $men = Man::where('name');
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
