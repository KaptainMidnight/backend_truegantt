<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('users', 'MainController@list');
Route::get('users/{id}', 'MainController@show');
Route::post('user', 'MainController@create');
Route::get('project/{id}', 'MainController@show_project');
Route::post('createproject', 'Maincontroller@create_project');
Route::post('projects', 'MainController@projects_list');
Route::post('usersprojects', 'MainController@users_projects');
