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
if ($checkLang == 'en') {
    $language = 'en';
} else {
    $language = '';
}
Route::group(['prefix' => $language,'middleware' => 'set_locale'],function (){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('news', 'Frontend\NewsController@index');
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
    Route::resource('work/products','ProductController');
    Route::resource('offices/contents','OfficeController');
    Route::resource('offices/people','PeopleController');
    Route::post('work/categories/serialize', 'CategoryController@serialize');
    Route::resource('san-pham', 'ProductController');


//    Route::group(['prefix' => 'depots', 'as' => 'depots.'], function () {
//        Route::resource('product', 'ProductDepotController');
//        Route::resource('history', 'HistoryDepotController');
//        Route::resource('list', 'DepotController');
//    });
//
//    Route::group(['prefix' => 'marketing', 'as' => 'marketing.'], function () {
//        Route::resource('fanpage', 'FanpageController');
//        Route::get('ranking', 'RankingController@marketing')->name('marketing.ranking.marketing');
//        Route::resource('fanpage-post', 'FanpagePostController');
//        Route::resource('seeding-number', 'SeedingNumberController');
//        Route::resource('custom-data', 'InsertDataCustomController');
//    });
//
//    Route::group(['namespace' => 'Sale', 'prefix' => 'sale', 'as' => 'sale.'], function () {
//        Route::resource('customer', 'CustomerController');
//    });
//
//    Route::group(['namespace' => 'Marketing', 'prefix' => 'marketing', 'as' => 'marketing.'], function () {
//        Route::resource('source','SourceController');
//    });
//
//    Route::group(['namespace' => 'System', 'prefix' => 'system', 'as' => 'system.'], function () {
//        Route::resource('team', 'TeamController');
//    });
//
//
//    /*
//  |--------------------------------------------------------------------------
//  | CMS for AJAX
//  |--------------------------------------------------------------------------
//  */
//    Route::group(['prefix' => 'ajax'], function () {
//        Route::get('searchLocation', 'LocationController@searchAllLocation');
//        Route::get('searchDistrict/{city}', 'LocationController@searchAllDistrict');
//        Route::get('searchWards/{district}', 'LocationController@searchAllWards');
//        Route::get('searchAllUseWards/{ward}', 'LocationController@searchAllUseWards');
//        Route::get('location/cac-tinh-mien-bac', 'LocationController@locationMienBac');
//        Route::get('location/cac-tinh-mien-trung', 'LocationController@locationMienTrung');
//        Route::get('location/cac-tinh-mien-nam', 'LocationController@locationMienNam');
//
//        Route::get('showDepot/{id}', 'DepotController@showDepot');
//
//        Route::get('get-all-sale','UserController@getAllSale');
//    });
});
