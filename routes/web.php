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

Route::get('/', function () {

	if(Auth::check()){
		return view('admin.index');
	}

	return redirect('/login');
});


Route::group(['middleware' => 'auth'], function(){


	Route::get('/test/guid', function(){	
		echo guid();
	});

	Route::get('/api/get/ideas-brief', function(){	
		return DB::select("SELECT ideas.id, ideas.name, categories.name as `category`, ideas.access_lvl, ideas.created_at, ideas.updated_at, users.name as `user` FROM ideas INNER JOIN categories ON ideas.category_id=categories.id INNER JOIN users ON ideas.user_id=users.id");
	});

});


Route::get('/login', function(){

	if(Auth::check()){
		return redirect('/home');
	}
	return view('auth.login');
});	

Route::post('/login', function(){

	if(!Auth::attempt(request(['email', 'password'])))
		return back();

	return redirect('/');
});

Route::get('/{vue_capture?}', function ($page) {
	
	if(Auth::check())
		return view('admin.index', compact('page'));

	return redirect('/login');
})->where('vue_capture', '[\/\w\.-]*');