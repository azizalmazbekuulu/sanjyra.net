<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Models\Name;
use App\Models\Man;
use App\Models\Woman;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'categories' => Category::lastCategories(5),
            'articles'   => Article::lastArticles(5),
            'names'      => Name::lastNames(5),
            'men'        => Man::lastMen(5),
            'women'      => Woman::lastWomen(5),
            'count_categories' => Category::count(),
            'count_articles'   => Article::count(),
            'count_names'      => Name::count(),
            'count_men'        => Man::count() + Woman::count(),
            'count_women'      => Woman::count()
        ]);
    }
}
