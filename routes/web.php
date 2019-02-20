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

Route::get('/', "HomeController@index")->middleware('auth');
Route::get('/main', "indexcontroller@index")->middleware('auth');
Route::Post('/Createpost', "indexcontroller@create")->middleware('auth');
Route::get('/comment', "indexcontroller@comment")->middleware('auth');



Auth::routes();
Route::get('/comment/{id}', "indexcontroller@comment")->middleware('auth');;
Route::post('/seach', "indexcontroller@search")->middleware('auth');;
Route::get('/home', 'HomeController@index')->middleware('auth');;
Route::get('/searchcat/{name}', "indexcontroller@searchcat")->middleware('auth');
Route::post('/makecomment/{id}', "indexcontroller@makecomments")->middleware('auth');



// ahmad
Route::get('/myuniversity', "UniversityController@show")->middleware('auth');
Route::get('/university', "UniversityController@index")->middleware('auth');
Route::get('/university/{id}', "UniversityController@showMyUni")->middleware('auth');
Route::post('university/store', "UniversityController@store")->middleware('auth');

Route::get('/admin/adduniversity', "AdminController@adduniversity")->middleware('auth');
Route::post('/admin/adduniversity', "AdminController@adduniversityinDb")->middleware('auth');
Route::get('/download/{id}', "fileController@show")->middleware('auth');

Route::get('/User/{id}', "indexcontroller@userprofile")->middleware('auth');
