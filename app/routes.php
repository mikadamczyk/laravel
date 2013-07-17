<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('hello');
// });
Route::group(array('before' => 'auth'), function()
{
    Route::get('/', array('before' => 'auth' ,function()
    {
        //return 'Hello, '.Auth::user()->email.'!';
        return Redirect::to('obslogs');
    }));
    
    Route::get('/logout', function() {
        Auth::logout();
        return Redirect::to('login');
    });
    Route::get('messages/stick/{id}', array('as' => 'stick', 'before' => 'auth', 'uses' => 'MessagesController@stick'));
    Route::get('messages/unstick/{id}', array('as' => 'unstick', 'before' => 'auth', 'uses' => 'MessagesController@unstick'));
//     Route::post('messages/stick/{id}', array('as' => 'stick', 'before' => 'auth', function($id)
//     {
// //         return 'Hello World'.$id;
// //         Message::update(array('sticky'=>1));
//         return Redirect::to('messages');
//     }));
//     Route::get('users', array('before' => 'auth', function()
//     {
//         $users = User::all();
//         return View::make('users/users')->with('users',$users);
//     }));

    Route::resource('users', 'UsersController');
    
    Route::resource('objects', 'ObjectsController');
    
    Route::resource('programs', 'ProgramsController');
    
    Route::resource('telescopes', 'TelescopesController');
    
    Route::resource('detectors', 'DetectorsController');
    
    Route::resource('filters', 'FiltersController');
    
    Route::resource('conditions', 'ConditionsController');
    
    Route::resource('devices', 'DevicesController');
    
    Route::resource('types', 'TypesController');
    
    Route::resource('obslogs', 'ObslogsController');
    
    Route::resource('techlogs', 'TechlogsController');
    
    Route::resource('messages', 'MessagesController');

});
    

Route::get('/login', function()
{
    return View::make('login/login');
});

Route::post('/login', function()
{
    // Validation? Not in my quickstart!
    // No, but really, I'm a bad person for leaving that out
    Auth::attempt( array('email' => Input::get('email'), 'password' => Input::get('password')) );

    return Redirect::to('/');
});
    