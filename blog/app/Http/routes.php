<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//
//Route::get('/', function () {
//    return view('index');
//});

Route::get('/','NotesController@index');

Route::get('/register','NotesController@showRegister');

Route::get('/forgotpassword','NotesController@forgotPassword');

Route::post('/','NotesController@login');

Route::post('/register','NotesController@register');

Route::get('/notes','NotesController@showNotes');

Route::get('/logout','NotesController@logout');

Route::post('/notes','NotesController@saveNotes');

Route::get('/user/{id}/image', function($id)
{
    $note = App\Note::find($id);
    $response = Response::make($note->image, 200);
    $response->header('Content-Type', 'image/jpeg');
    return $response;
});





