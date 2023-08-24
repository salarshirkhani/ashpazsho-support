<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/auth/login','AuthController@loginUser')->name('auth.login');
Route::post('/auth/register','AuthController@createUser')->name('auth.register');
//SUPPORT MANAGMENT
Route::get('groups', 'ApiController@GetGroups')->name('groups');
Route::get('chats','ApiController@GetChatsGroup')->name('chats')->middleware('auth:sanctum');

                
                
