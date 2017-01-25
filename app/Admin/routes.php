<?php

Route::get('', ['as' => 'admin.dashboard', function () {
	$content = 'Define your dashboard here.';
	return AdminSection::view($content, 'Dashboard');
}]);

Route::get('information', ['as' => 'admin.information', function () {
	$content = 'Define your information here.';
	return AdminSection::view($content, 'Information');
}]);

Route::post('/news/export.json', ['as' => 'admin.news.export', function () {
	$response = new \Illuminate\Http\JsonResponse([
		'title' => 'Congratulation! You exported news.',
		'news' => App\Model\News5::whereIn('id', Request::get('id', []))->get()
	]);

	$response->setJsonOptions(JSON_PRETTY_PRINT);

	return $response;
}]);


//Route::get('/admin/users', ['as' => 'admin.users', function () {
//	$content = 'Define your information here.';
//	return AdminSection::view($content, 'users');
//}]);



//Route::get('/users', [
//	'as' => 'admin.users',
//	'uses' => '\App\Http\Controllers\MyUsersController@index',
//]);



//Route::post('admin/users', '\App\Http\Controllers\MyUsersController@index');



//Route::get('/admin/user', '\App\Vendor\laravelrus\sleepingowl\src\Http\Controllers\AdminController@index');


//Route::group(['prefix' => 'admin'], function(){
//	Route::resource('/user','UserController');
//	Route::resource('/post','PostController');
//});

//Route::get('user', ['as' => 'admin.user', function () {
//	Route::resource('/user','app/Admin/UserController');

//}]);




//Route::get('/admin/home', 'UserController@index');