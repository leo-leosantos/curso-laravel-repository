<?php



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$this->any('admin/products/search', 'Admin\ProductController@search')->name('products.search');

Route::get('admin', function(){
})->name('admin');

Route::any('admin/categories/search','Admin\CategoryController@search')->name('categories.search');
Route::resource('admin/categories', 'Admin\CategoryController');
Route::resource('admin/products', 'Admin\ProductController');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
