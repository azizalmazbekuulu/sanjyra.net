<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SanjyraController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManController;
use App\Http\Controllers\Admin\WomanController;
use App\Http\Controllers\Admin\UruuController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NameController;
use App\Http\Controllers\Admin\LiteratureController;
use App\Http\Controllers\Admin\UserManagement\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return redirect('admin');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Custom routes

Route::get('/', [SanjyraController::class, 'index'])->name('index');

Route::get('/man/{id?}', [SanjyraController::class, 'man'])->name('man');
Route::get('/woman/{id}', [SanjyraController::class, 'woman_show'])->name('woman-show');

Route::get('/name/{name?}', [SanjyraController::class, 'name'])->name('name');

Route::get('/person-search', [SearchController::class, 'person_search'])->name('person-search');
Route::get('/main-search', [SearchController::class, 'main_search'])->name('main-search');

Route::get('/literatures', [SanjyraController::class, 'literatures'])->name('literatures');

Route::get('/terms-of-use', [SanjyraController::class, 'terms_of_use'])->name('terms-of-use');

Route::get('/famous-people/{category?}', [SanjyraController::class, 'famous_people'])->name('famous-people');

Route::get('/article/{slug?}', [SanjyraController::class, 'article'])->name('article');

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/', [DashboardController::class, 'dashboard'])->name('admin.index');

    Route::resources([
        'category' => CategoryController::class,
        'man'      => ManController::class,
        'article'  => ArticleController::class,
        'name'     => NameController::class,
        'woman'    => WomanController::class,
        'uruu'     => UruuController::class,
        'literature' => LiteratureController::class,
    ], ['as'=>'admin']);

    Route::delete('/article/image-delete/{article}', [ArticleController::class, 'image_delete'], ['as'=>'admin'])->name('admin.article.image-delete');

    Route::delete('/man/image-delete/{man}', [ManController::class, 'image_delete'], ['as'=>'admin'])->name('admin.man.image-delete');
    Route::post('/man/up', [ManController::class, 'up'], ['as'=>'admin'])->name('admin.man.up');

    Route::delete('/woman/image-delete/{woman}', [WomanController::class, 'image_delete'], ['as'=>'admin'])->name('admin.woman.image-delete');

    Route::delete('/literature/image-delete/{literature}', [LiteratureController::class, 'image_delete'], ['as'=>'admin'])->name('admin.literature.image-delete');

    Route::prefix('user_management')->group(function() {
        Route::resource('user', UserController::class, ['as' => 'admin.user_management']);
    });
});

Route::get('/forum', function() {
    return Redirect::to('https://forum.sanjyra.net');
})->name('forum');

Route::get('/app', function() {
    return view('sanjyra.about.sanjyra_app');
})->name('app');
