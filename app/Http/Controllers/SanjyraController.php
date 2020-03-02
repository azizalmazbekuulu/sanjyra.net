<?php

namespace App\Http\Controllers;

use App\Man;
use App\Woman;
use App\Category;
use App\Article;
use App\Name;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

    public function man($id = 1)
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
            // Full generation
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

    public function famous_people(Category $category = null)
    {
        return view('sanjyra.famous.index', [
            // 'famous_people' => ,
        ]);
    }

    public function person_search(Request $request)
    {
        $name = $request["name"];
        $father_name = $request['father_name'];
        $query = "SELECT t1.id,t1.name,t1.uruusu,t2.name AS father_name,t2.id AS father_id,
        t2.father_id AS grand_id,t3.name AS grand_name,
        (
        case
            when t1.name like '$name' && t2.name like '$father_name' then 20
            when t1.name like '$name' && t2.name like '$father_name%' then 19
            when t1.name like '$name' && t2.name like '%$father_name' then 18
            when t1.name like '$name' && t2.name like '%$father_name%' then 17
            when t1.name like '$name%' && t2.name like '$father_name' then 16
            when t1.name like '$name%' && t2.name like '$father_name%' then 15
            when t1.name like '$name%' && t2.name like '%$father_name' then 14
            when t1.name like '$name%' && t2.name like '%$father_name%' then 13
            when t1.name like '%$name' && t2.name like '$father_name' then 12
            when t1.name like '%$name' && t2.name like '$father_name%' then 11
            when t1.name like '%$name' && t2.name like '%$father_name' then 10
            when t1.name like '%$name' && t2.name like '%$father_name%' then 9
            when t1.name like '%$name%' && t2.name like '$father_name' then 8
            when t1.name like '%$name%' && t2.name like '$father_name%' then 7
            when t1.name like '%$name%' && t2.name like '%$father_name' then 6
            when t1.name like '%$name%' && t2.name like '%$father_name%' then 5
            else 1
        end
        ) as relevance
        FROM men t1,men t2,men t3 
        WHERE t1.father_id=t2.id AND t2.father_id=t3.id AND t1.name LIKE '%$name%' 
                AND t2.name LIKE '%$father_name%'
        ORDER BY relevance desc";
        $men = DB::select($query);
        $men = collect($men);
        return view('sanjyra.search.person_search_result', [
            'men' => $men//->paginate(50)
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
