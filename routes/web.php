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


Auth::routes();

$checkLang = request()->segment(1);
if ($checkLang != 'vi') {
    $language = '';
} else {
    $language = 'vi';
}
Route::group(['prefix' => $language,'middleware' => 'set_locale'],function (){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('news', 'Frontend\NewsController@index');
    Route::get('news/category/{id}', 'Frontend\NewsController@getCategory');
    Route::get('news/{slug}', 'Frontend\NewsController@show');
    Route::get('work', 'Frontend\WorkController@index');
    Route::get('work/{slug}', 'Frontend\WorkController@show');
    Route::get('office', 'Frontend\OfficeController@index');
});
Route::get('set-locale/{slug}','HomeController@setLocate');


Route::group(['middleware'=>'auth','namespace' => 'Backend','prefix'=>'admin', 'as' => 'admin.'], function () {
    Route::resource('news','NewsController');
    Route::resource('slide','SlideController');
    Route::resource('work/categories','CategoryController');
    Route::resource('news-categories','CategoryNewController');
    Route::resource('work/products','ProductController');
    Route::resource('offices/contents','OfficeController');
    Route::resource('offices/people','PeopleController');
    Route::post('work/categories/serialize', 'CategoryController@serialize');
    Route::resource('san-pham', 'ProductController');
    Route::resource('setting','SettingController');
    Route::get('get-user','UserController@getUser');
    Route::post('edit-profile','UserController@editProfile');
});
