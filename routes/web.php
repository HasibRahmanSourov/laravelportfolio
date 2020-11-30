<?php

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
//     return view('welcome');
// });
Route::get('/', 'PageController@index')->name('home');
Route::prefix('admin')->group(function(){
Route::get('/dashboard', 'PageController@admin')->name('dashboard');
Route::get('/main', 'MainController@index')->name('main');
Route::put('/main', 'MainController@update')->name('admin.main.update');

Route::get('/services/create', 'ServicePageController@create')->name('admin.services.create');
Route::post('/services/create', 'ServicePageController@store')->name('admin.services.store');
Route::get('/services/list', 'ServicePageController@list')->name('admin.services.list');
Route::get('/services/edit/{id}', 'ServicePageController@edit')->name('admin.services.edit');
Route::post('/services/update/{id}', 'ServicePageController@update')->name('admin.services.update');
Route::delete('/services/destroy/{id}', 'ServicePageController@destroy')->name('admin.services.destroy');

Route::get('/portfolios/create', 'PortfolioPageController@create')->name('admin.portfolios.create');
Route::put('/portfolios/create', 'PortfolioPageController@store')->name('admin.portfolios.store');
Route::get('/portfolios/list', 'PortfolioPageController@list')->name('admin.portfolios.list');
Route::get('/portfolios/edit/{id}', 'PortfolioPageController@edit')->name('admin.portfolios.edit');
Route::post('/portfolios/update/{id}', 'PortfolioPageController@update')->name('admin.portfolios.update');
Route::delete('/portfolios/destroy/{id}', 'PortfolioPageController@destroy')->name('admin.portfolios.destroy');

Route::get('/abouts/create', 'AboutPageController@create')->name('admin.abouts.create');
Route::put('/abouts/create', 'AboutPageController@store')->name('admin.abouts.store');
Route::get('/abouts/list', 'AboutPageController@list')->name('admin.abouts.list');
Route::get('/abouts/edit/{id}', 'AboutPageController@edit')->name('admin.abouts.edit');
Route::post('/abouts/update/{id}', 'AboutPageController@update')->name('admin.abouts.update');
Route::delete('/abouts/destroy/{id}', 'AboutPageController@destroy')->name('admin.abouts.destroy');

Route::get('/about', 'PageController@about')->name('about');

Route::get('/team', 'PageController@team')->name('team');
});

Route::post('/contact', 'ContactPageController@store')->name('contact.store');

Auth::routes();


//Route::get('/home', 'HomeController@index')->name('home');
