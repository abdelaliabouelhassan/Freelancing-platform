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



//patri learning delete me later
//

Route::get('learng/fr/ep1',function (){
    return "J'arrive au Guatemala le jour des morts, le 1er novembre. Je suis curieux de ces vacances, alors je vais au cimetière pour voir ce qui se passe. Ce que je trouve est assez intéressant. L'ambiance est comme une fête. Il y a des gens partout. Les familles sont assises autour du tombes de leurs ancêtres morts. Ils nettoient les tombes et ajoutent des fleurs fraîches. Je marche à travers le cimetière et admirez la beauté de toutes les fleurs colorées. Il y a aussi de la couleur dans le ciel, car de nombreux enfants volent des cerfs-volants. Certaines familles font un pique-nique à côté des tombes. Ils mangent, boivent et discutent ensemble. Les gens rient et sourient. Aux États-Unis, les cimetières sont toujours sombres. Nous n'avons certainement jamais de festivals ou de fêtes à côté des tombes. Nous ne rions pas, nous ne jouons pas de la musique ou nous ne volons pas de cerf-volant dans les cimetières. Je trouve que je préfère l'approche guatémaltèque. J'aime la façon dont ils se souviennent et célèbrent ces qui sont décédés. J'aime qu'ils reconnaissent la mort, au lieu de la nier comme ça Les Américains le font. J'aime qu'il y ait de la vie et de la mort dans leurs cimetières. Les Guatémaltèques l'appellent «Le jour des morts», mais c'est aussi une journée pour apprécier la vie.";
});
