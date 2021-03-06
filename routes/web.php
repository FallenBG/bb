<?php


/**
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
**/

Route::get(
    '/',
    function () {
        return view('layout');
    }
);


Route::group(
    ['middleware' => 'auth'],
    function () {
//        Route::get('/projects', 'ProjectsController@index');
//        // BE CEAREFULL HOW YOU ORDER THE routes!!! IF create is after show - it will always trigger the show method.
//        Route::get('/projects/create', 'ProjectsController@create');
//        Route::get('/projects/{project}/update', 'ProjectsController@edit');
//        Route::get('/projects/{project}', 'ProjectsController@show');
//        Route::post('/projects', 'ProjectsController@store');
//        Route::patch('/projects/{project}', 'ProjectsController@update');
//        Route::delete('/projects/{project}', 'ProjectsController@destroy');

        Route::resource('projects', 'ProjectsController');

        Route::post('projects/{project}/tasks', 'ProjectTasksController@store');
        Route::patch('projects/{project}/tasks/{task}', 'ProjectTasksController@update');

        Route::get('projects/{project}/note', 'ProjectNoteController@store');
        Route::patch('projects/{project}/note/{note}', 'ProjectNoteController@update');

//        Route::get('projects/{project}/invitations', 'ProjectInvitationsController@index');
        Route::post('projects/{project}/invitations', 'ProjectInvitationsController@store');

        Route::get('/home', 'HomeController@index')->name('home');
    }
);


// Route::get('/login');
//
// Route::post('/projects', function () {
// dd('dafak');
// Log::info('INFO');
// App\Project::create(request(['title', 'description']));
//
// });
//
// Route::get('/projects1', function () {
// dd('dafak');
// Log::info('INFO');
// App\Project::create(request('title', 'description'));
//
// });
Auth::routes();
