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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/create', 'ProjectsController@create');
Route::post('/projects', 'ProjectsController@store');
//
//Route::post('/projects', function () {
//dd('dafak');
//    Log::info('INFO');
//    App\Project::create(request(['title', 'description']));
////
//});
//
//Route::get('/projects1', function () {
//dd('dafak');
////    Log::info('INFO');
////    App\Project::create(request('title', 'description'));
////
//});