<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    if(auth()->check()){
        return view('home');
    }
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//socialite login
Route::get('facebook', function () {
    return view('facebook');
});
Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

Route::get('details', function () {
    $url = 'https://whatismyipaddress.com/';
    $client = new GuzzleHttp\Client();
    $res = $client->get($url, ['verify' => false]);
    $content = (string) $res->getBody();
    $myip = Str::between( $content, 'Click for more details<br>about <b>','</b>\').openPopup()');
    $data = Location::get($myip);
     dd($data);
});
