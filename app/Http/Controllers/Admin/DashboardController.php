<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'categories' => Category::lastCategories(5),
            'articles'   => Article::lastArticles(5),
            'count_categories' => Category::count(),
            'count_articles' => Article::count()
        ]);
    }
}
