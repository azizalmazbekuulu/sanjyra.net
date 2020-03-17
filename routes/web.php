<?php

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

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], function(){
    Route::get('/', 'DashboardController@dashboard')->name('admin.index');

    Route::resource('/category', 'CategoryController', ['as'=>'admin']);

    Route::resource('/article', 'ArticleController', ['as'=>'admin']);
    Route::delete('/article/image-delete/{article}', 'ArticleController@image_delete', ['as'=>'admin'])->name('admin.article.image-delete');

    Route::resource('/name', 'NameController', ['as'=>'admin']);

    Route::resource('/man', 'ManController', ['as'=>'admin']);
    Route::delete('/man/image-delete/{man}', 'ManController@image_delete', ['as'=>'admin'])->name('admin.man.image-delete');

    Route::resource('/woman', 'WomanController', ['as'=>'admin']);
    Route::delete('/woman/image-delete/{woman}', 'WomanController@image_delete', ['as'=>'admin'])->name('admin.woman.image-delete');

    Route::resource('/uruu', 'UruuController', ['as'=>'admin']);

    Route::resource('/literature', 'LiteratureController', ['as'=>'admin']);
    Route::delete('/literature/image-delete/{literature}', 'LiteratureController@image_delete', ['as'=>'admin'])->name('admin.literature.image-delete');

    Route::group(['prefix' => 'user_management', 'namespace' => 'UserManagement'], function() {
        Route::resource('/user', 'UserController', ['as' => 'admin.user_management']);
    });
});

Auth::routes([
    'register' => false
]);

Route::get('/', 'SanjyraController@index')->name('index');
Route::get('/man/{id?}', 'SanjyraController@index')->name('man');
Route::get('/woman/{id}', 'SanjyraController@woman_show')->name('woman-show');

Route::get('/name/{slug?}', 'SanjyraController@name')->name('name');

Route::get('/person-search', 'SearchController@person_search')->name('person-search');
Route::get('/main-search', 'SearchController@main_search')->name('main-search');

Route::get('/terms-of-use', 'SanjyraController@terms_of_use')->name('terms-of-use');

Route::get('/famous-people/{category?}', 'SanjyraController@famous_people')->name('famous-people');

Route::get('/article/{article?}', 'SanjyraController@article')->name('article');

Route::get('/category', 'SanjyraController@category')->name('category');