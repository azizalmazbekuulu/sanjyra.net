<?php

namespace App\Http\Controllers;

use App\Models\Man;
use App\Models\Uruu;
use App\Models\Woman;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function main_search(Request $request)
    {
        $query = $request['query'];
        $query_men = "SELECT *
        FROM men WHERE MATCH (info) AGAINST
        ('".$query."' IN NATURAL LANGUAGE MODE)";
        $query_women = "SELECT *
        FROM women WHERE MATCH (info) AGAINST
        ('".$query."' IN NATURAL LANGUAGE MODE)";
        $query_article = "SELECT *
        FROM articles WHERE MATCH (title, description) AGAINST
        ('".$query."' IN NATURAL LANGUAGE MODE)";
        $men = DB::select($query_men);
        $women = DB::select($query_women);
        $articles = DB::select($query_article);
        return view('sanjyra.search.main_search_result',[
            'men' => $men,
            'women' => $women,
            'articles' => $articles,
            'query' => $query
        ]);
    }

    public function person_search(Request $request)
    {
        $name = $request["name"];
        $father_name = $request['father_name'];
        if ($request['uruusu'] == 'all') {
            $man_uruusu = '';
            $woman_uruusu = '';
        }
        else {
            $man_uruusu = " AND t1.uruusu = '".$request['uruusu']."'";
            $woman_uruusu = " AND t2.uruusu = '".$request['uruusu']."'";
        }
        $relevance = "
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
            ) as relevance";
        $query_men = "SELECT t1.id,t1.name,t1.uruusu,t2.name AS father_name,t2.id AS father_id,
        t2.father_id AS grand_id,t3.name AS grand_name, $relevance
        FROM men t1,men t2,men t3 
        WHERE t1.father_id=t2.id AND t2.father_id=t3.id AND t1.name LIKE '%$name%' 
                AND t2.name LIKE '%$father_name%'$man_uruusu
        ORDER BY relevance desc";
        $query_women = "SELECT t1.id,t1.name,t2.uruusu,t2.name AS father_name,t2.id AS father_id,
        t2.father_id AS grand_id,t3.name AS grand_name, $relevance
        FROM women t1,men t2,men t3 
        WHERE t1.father_id=t2.id AND t2.father_id=t3.id AND t1.name LIKE '%$name%' 
                AND t2.name LIKE '%$father_name%'$woman_uruusu
        ORDER BY relevance desc";
        $men = DB::select($query_men);
        $women = DB::select($query_women);
        if ($request['admin'] == true)
        {
            return view('admin.men.search.person_search_result', [
                'men' => $men,
                'women' => $women,
                'uruular' => Uruu::orderBy('name')->get()
            ]);
        }
        else {
            return view('sanjyra.search.person_search_result', [
                'men' => $men,
                'women' => $women,
                'uruular' => Uruu::orderBy('name')->get(),
                'name' => $name,
                'father_name' => $father_name
            ]);
        }
    }
}
