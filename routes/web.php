<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.index');
});
//branch
Route::get('/admin/branch',"BranchController@index");
Route::get('/admin/branch/create',"BranchController@create");
Route::post('/admin/branch/create',"BranchController@postCreate");
Route::get('/admin/branch/{id}/edit',"BranchController@edit");
Route::post('/admin/branch/{id}/edit',"BranchController@postEdit");
Route::post('/admin/branch/{id}/delete',"BranchController@postDelete");
//user
Route::get('/admin/user', function () {
    $users = \App\User::all();
    return view('admin.user.index')
        ->with('users',$users);
});

Route::get('/admin/user/{id}/edit', function ($id) {
    $user = \App\User::find($id);
    $branches = \App\Branch::all();
    return view('admin.user.edit')
        ->with('user',$user)
        ->with('branches',$branches);
});

Route::post('/admin/user/{id}/edit', function (Request $request,$id) {
    $user = \App\User::find($id);
    $userForm = $request->get('user');
    $user->fill($userForm);

    $branch = \App\Branch::where('id',$userForm['branch_id'])->first();
    $user->branch()->associate($branch);

    $user->save();

    return redirect('/admin/user');
});

Route::post('/admin/user/{id}/delete', function (Request $request,$id) {
    $user = \App\User::find($id);
    $user->delete();

    return redirect('/admin/user');
});


Route::get('/admin/user/create', function () {
    $branches = \App\Branch::all();
    return view('admin.user.create')
        ->with('branches',$branches);
});

use App\Http\Requests\AdminUserRequest;

Route::post('/admin/user/create', function (AdminUserRequest $request) {
    $userForm = $request->get('user');
    $user = new \App\User();
    $user->fill($userForm);
    $user->password = \Illuminate\Support\Facades\Hash::make(
        $userForm['password']
    );

    $branch = \App\Branch::where('id',$userForm['branch_id'])->first();
    $user->branch()->associate($branch);

    $user->save();
    return redirect('/admin/user');
});