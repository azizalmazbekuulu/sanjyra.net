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
    Route::resource('/name', 'NameController', ['as'=>'admin']);
    Route::resource('/man', 'ManController', ['as'=>'admin']);
    Route::resource('/woman', 'WomanController', ['as'=>'admin']);
    Route::group(['prefix' => 'user_management', 'namespace' => 'UserManagement'], function() {
        Route::resource('/user', 'UserController', ['as' => 'admin.user_management']);
    });
});

Route::get('/', 'SanjyraController@index');

Auth::routes([
    'register' => false
]);

Route::get('/home', 'SanjyraController@index')->name('home');

Route::get('/man/{id?}', 'SanjyraController@man')->name('man');
Route::get('/woman/{woman}', 'SanjyraController@woman_show')->name('woman-show');

Route::get('/name/{slug?}', 'SanjyraController@name')->name('name');

Route::post('/person-search', 'SanjyraController@person_search')->name('person-search');

Route::get('/famous-people/{category?}', 'SanjyraController@famous_people')->name('famous-people');

Route::get('/article', 'SanjyraController@article')->name('article');

Route::get('/category', 'SanjyraController@category')->name('category');

