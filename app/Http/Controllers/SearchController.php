<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function person_search(Request $request)
    {
        $name = $request["name"];
        $father_name = $request['father_name'];
        $uruusu = $request['uruusu'];
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
                AND t2.name LIKE '%$father_name%' AND t2.uruusu LIKE '%$uruusu%'
        ORDER BY relevance desc";
        $query_women = "SELECT t1.id,t1.name,t2.uruusu,t2.name AS father_name,t2.id AS father_id,
        t2.father_id AS grand_id,t3.name AS grand_name, $relevance
        FROM women t1,men t2,men t3 
        WHERE t1.father_id=t2.id AND t2.father_id=t3.id AND t1.name LIKE '%$name%' 
                AND t2.name LIKE '%$father_name%' AND t2.uruusu LIKE '%$uruusu%'
        ORDER BY relevance desc";
        $men = DB::select($query_men);
        $women = DB::select($query_women);
        $route = 'sanjyra.search.person_search_result';
        if (isset($request['route'])) {
            $route = 'admin.men';
        }
        return view('', [
            'men' => $men,
            'women' => $women,
            'uruular' => Uruu::orderBy('name')->get()
        ]);
    }
}
