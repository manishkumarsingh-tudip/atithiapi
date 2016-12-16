<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users','UserController@display');

Route::post('/signUp','UserController@signUp');
//  Route::post('signUp', 'UserController@signUp');
Route::post('/addVisitors','VisitorsController@visitors');
Route::post('/login','LoginController@login');
Route::group(['prefix' => 'api/v1','middleware' => ['App\Http\Middleware\authenticateUser']], function () {
Route::post('logout', 'LoginController@logout');
Route::get('viewVisitor','VisitorsController@view');
Route::post('updateVisitor', 'VisitorsController@updateVisitor');
Route::post('deleteVisitor', 'VisitorsController@deleteVisitor');

});