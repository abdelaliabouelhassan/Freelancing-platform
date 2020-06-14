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

Route::get('indexProject','API\PostController@indexProject');
Route::get('filterProject/{cat}/{city}/{price}/{isdone}','API\PostController@filterProject');
Route::post('searchProject','API\PostController@searchProject');
Route::get('search1Project/{input}','API\PostController@search1Project');
Route::get('AllPosts','API\PostController@AllPosts');
Route::post('SavePost','API\PostController@SavePost')->middleware('localization');

/*  END POSTS api */

/* Project*/
Route::apiResources(['CreateProject'=>'API\ProjectController']);

/*End Project*/

/*Jobs*/
Route::apiResources(['CreateJob'=>'API\JobController']);
/*End Jobs*/

/*Profile*/
Route::apiResources(['Profile'=>'API\ProfileController']);
Route::patch('UpdateImage','API\ProfileController@updateProfileImage');
Route::patch('UpdateBackGround','API\ProfileController@UpdateBackGroundImage');
Route::get('feeds','API\ProfileController@feed');
Route::get('save','API\ProfileController@savejob');
Route::get('bids','API\ProfileController@myBids');
Route::put('overview','API\ProfileController@overview');
Route::get('getoverview','API\ProfileController@getoverview');
Route::get('getExperience','API\ProfileController@getExperience');
Route::post('addExperience','API\ProfileController@addExperience');
Route::post('UpdateExperience','API\ProfileController@UpdateExperience');
Route::post('DeleteExperience','API\ProfileController@DeleteExperience');
Route::get('getEduc','API\ProfileController@getEduc');
Route::post('addEduc','API\ProfileController@addEduc');
Route::post('UpdateEduc','API\ProfileController@UpdateEduc');
Route::post('DeleteEduc','API\ProfileController@DeleteEduc');
Route::post('addLocation','API\ProfileController@addLocation');
Route::get('getLocation','API\ProfileController@getLocation');
Route::get('getPortfolio','API\ProfileController@getPortfolio');
Route::post('addProt','API\ProfileController@addProt');
Route::post('DeleteProt','API\ProfileController@DeleteProt');
Route::get('getUrl','API\ProfileController@getUrl');
Route::post('AddUrl','API\ProfileController@AddUrl');
Route::post('DeleteUrl','API\ProfileController@DeleteUrl');
Route::post('AddBio','API\ProfileController@AddBio');
Route::get('showUser/{slug}','API\ProfileController@show');
Route::get('showfeeds/{slug}','API\ProfileController@showProfileFeeds');
Route::get('showoverview/{slug}','API\ProfileController@showoverview');
Route::get('showexp/{slug}','API\ProfileController@showexp');
Route::get('showeduc/{slug}','API\ProfileController@showeduc');
Route::get('showloac/{slug}','API\ProfileController@showloac');
Route::get('showportload/{slug}','API\ProfileController@showportload');
Route::post('follow','API\ProfileController@follow');
Route::get('userforfolw','API\ProfileController@userforfolw');

/*End Profile*/

Route::get('/user','API\ProfileController@fetchuser');

/*chat*/
//Route::apiResources(['getuser'=>'API\ChatController']);
Route::get('/message/get/{slug}/{userslug}','MessageController@fetchMessage');
Route::get('getuser/{slug}/{userslug}','API\ChatController@getusertoAndFrom');
Route::get('getchatmsg','API\ChatController@getchatmsg');
Route::post('getPostMessage','API\ChatController@getPostMessage');
/*end chat*/


/*BidSystem*/
Route::get('BidNow/{user}/{slug}','API\BidsController@BidNow')->middleware('localization');
/*End BidSystem*/
