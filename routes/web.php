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







// Route::get('save',function(){
//     return view('auth/password/confirm');
// });
//testing routes
Route::get('details', function () {

    //in devloper mode we are going to use that coe below
    /*
    $url = 'https://whatismyipaddress.com/';
    $client = new GuzzleHttp\Client();
    $res = $client->get($url, ['verify' => false]);
    $content = (string) $res->getBody();
    $myip = Str::between( $content, 'Click for more details<br>about <b>','</b>\').openPopup()');
*/

    //in live serve we are going to use that code

    function get_client_ip()
    {
        foreach (array(
                     'HTTP_CLIENT_IP',
                     'HTTP_X_FORWARDED_FOR',
                     'HTTP_X_FORWARDED',
                     'HTTP_X_CLUSTER_CLIENT_IP',
                     'HTTP_FORWARDED_FOR',
                     'HTTP_FORWARDED',
                     'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER)) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip);
                    if ((bool) filter_var($ip, FILTER_VALIDATE_IP,
                        FILTER_FLAG_IPV4 |
                        FILTER_FLAG_NO_PRIV_RANGE |
                        FILTER_FLAG_NO_RES_RANGE)) {
                        return $ip;
                    }
                }
            }
        }
        return null;
    }
    $myid = get_client_ip();
    $data = Location::get('41.214.182.10');
     dd($data);



});
