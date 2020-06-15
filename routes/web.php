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


route::group(['middleware'=>'localization'],function () {
include 'includes/vue_route.php';

Route::get('/', function () {
    if(auth()->check()){
        return view('home');
    }
    return view('welcome');
})->middleware('localization');

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
Route::get('/{lng}/forreal/youfkingou', function ($lng) {
    $user = auth()->id();

 $setting =   \App\Settings::where('user_id',$user);
 $setting->update(['long'=>$lng]);
 return redirect()->back();

})->name('setlng');

Route::get('/{lng}/setlongae/youfkingou', function ($lng) {
    \session(['long' => $lng]);
    return redirect()->back();
})->name('lgn');


});
