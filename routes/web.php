<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Stevebauman\Location\Facades\Location;


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
include 'includes/vue_route.php';
App::setLocale('ar');


Route::get('/', function () {
    if(auth()->check()){
        return view('home');
    }
    return view('welcome');
})->middleware('localization');

Route::get('/{lng}/setlongae/youfkingou', function ($lng) {
    \session(['long' => $lng]);
    return redirect()->back();
})->name('lgn');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//socialite login
Route::get('facebook', function () {
    return view('facebook');
});
Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

//chat app

Route::post('/message/send','MessageController@sendMessage');



