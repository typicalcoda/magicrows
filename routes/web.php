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

Route::get('/test/guid', function(){	
	echo guid();
});

Route::group(['middleware' => 'auth'], function(){

	// GETS
	Route::get('/api/get/collections', function(){
		try{
			$user_id = auth()->user()->id;
			$collections = DB::select("SELECT collections.*, SUBSTRING(group_permissions.access_rights, 2, 1) as `CAN_VIEW`,SUBSTRING(group_permissions.access_rights, 3, 1) as `CAN_WRITE` FROM collections JOIN users INNER JOIN groups ON groups.id=users.group_id INNER JOIN group_permissions ON group_permissions.group_id = users.group_id WHERE users.id = '45ACE88A-918F-ED12-FFF1-73955DCC37DF' AND group_permissions.access_rights LIKE '1%%'");
			foreach($collections as $collection){
				$collection->active_records = DB::table("mugs")->where('deleted_at', NULL)->get()->count();
				$collection->fields = DB::select("SELECT fields.* FROM fields WHERE collection_id='".$collection->id."'");
			}
			return $collections;
		}
		catch(Exception $ex){
			if(strpos($ex->getMessage(), "Base table or view not found"))
				return array("error" => "A table is missing from the database. Please see your administrator.");
		}
	});

	// PUT 
	Route::put('/api/save/field/', function(){
		$data = request()->json()->all();
		$field = App\Field::find($data['id']);
		$field->name = $data['newValues']['name'];
		$field->type = $data['newValues']['type'];
		$field->prefix = $data['newValues']['prefix'];
		$field->suffix = $data['newValues']['suffix'];
		$field->max_length = $data['newValues']['max_length'];
		$field->min_length = $data['newValues']['min_length'];
		$field->unique = $data['newValues']['unique'];
		$field->updated_at = \Carbon\Carbon::now();
		$field->save();
		
		return $field;

	});




	Route::get('/logout', function(){	
		if(Auth::check())
			Auth::logout();
		return redirect('/');
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