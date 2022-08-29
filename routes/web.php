<?php



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::resource('admin/categories', 'Admin\CategoryController');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
