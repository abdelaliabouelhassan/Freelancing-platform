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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


/*   POSTS  api    */



Route::apiResources(['post'=>'API\PostController']);
Route::get('city','API\PostController@city');
Route::get('category','API\PostController@category');
Route::get('filter/{cat}/{city}/{price}/{isdone}','API\PostController@filter');
Route::post('search','API\PostController@search');
Route::get('search1/{input}','API\PostController@search1');

/*  END POSTS api */



