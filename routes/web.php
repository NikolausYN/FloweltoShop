<?php

use App\Http\Controllers\RepasswordController;
use App\Http\Controllers\UpdateController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', 'WelcomeController@welcome');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/addf', 'ProductController@addf');
Route::patch('/products/addf', 'ProductController@addflower');


Route::get('/products/{id}', 'ProductController@index');
Route::get('/products/{id}/search', 'ProductController@search');
Route::get('/products/{id}/searchharga', 'ProductController@searchharga');

Route::get('/repassword', function () {
     return view("repassword");
    });
Route::patch('/repassword/{user}', 'RepasswordController@index');

Route::get('/details/{id}', 'DetailsController@index');

Route::get('/update/{id}', 'UpdateController@index');
Route::patch('/products/{id}/update', 'ProductController@update');
Route::patch('/products/{id}/delete', 'ProductController@delete');

Route::get('/managec', 'CategoryController@show');
Route::patch('/managec/{id}/delete', 'CategoryController@delete');

Route::get('/updatec/{id}', 'UpdatecController@index');
Route::get('/cart', 'ProductController@showcart');
Route::get('/cart/{id}', 'ProductController@cart');

Route::get('/co', 'ProductController@transh');
Route::get('/trans', 'ProductController@showtrans');

