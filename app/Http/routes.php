<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', 'MainController@index');

//Route::get('/shop', 'ShopController@index');

Route::get('/admin');

Route::get('/forum');

Route::get('/news', 'PageController@newsAll');
Route::get('/news/{id}', 'PageController@getNews');

// метод отправки новых товаров в бд со стороны клиента
Route::get('additem','ItemsController@add');
Route::post('additem','ItemsController@save');

// для добавление параметров товара (ajax)
Route::post('/get_parameters','ParametersController@get');
// для сохранения параметров товара (ajax)
Route::post('/save_parameters','ParametersController@save');

// вывод всех товаров
Route::get('/shop', 'ItemsController@index');
// вывод товаров по категории
Route::get('/shop/{category}', 'ItemsController@getCategory');
// вывод товара по категории
Route::get('/shop/{category}/{id}','ItemsController@getId');



// страница товара
Route::get('/show/{id}', 'ItemsController@show');


//  для статических страниц
Route::get('/{url}', 'PageController@index');




//Route::group(['prefix' => 'admin'], function(){
//   Route::resource('/user','UserController');
//   Route::resource('/post','PostController');
//});
