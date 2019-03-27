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
    return view('welcome');
});
Route::get('about', 'StaticsController@about')->name('about');
Route::get('contactUs', 'StaticsController@contactUs')->name('contact');
// Route::get('article', 'StaticsController@article')->name('article');

/*Crud Articles*/
Route::resource('articles','ArticlesController');
// Route::get('/', 'ArticlesController@index');
/*endCrud Articles*/



Auth::routes();

Route::get('dashboard', 'HomeController@index')
->middleware('auth','role:employee,manager')
->name('dashboard');

Route::resource('employee', 'EmployeeController');
Route::resource('manager', 'ManagerController');

//Route Pasien
Route::resource('pasiens','PasiensController');
Route::resource('details','DetailsController');

