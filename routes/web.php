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
		if(Auth::user()->userType == 1){
			return view('admin.index');
		} else {
			return view('user.index');
		}
	}

	return redirect('/login');
});

Route::get('/login', function(){

	if(Auth::check()){
		return redirect('/');
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