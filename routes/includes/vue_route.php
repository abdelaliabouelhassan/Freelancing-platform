<?php

Route::get('/Jobs', function () {
    return view('home');
});
Route::get('/Projects', function () {
    return view('home');
});
Route::get('/Home', function () {
    return view('home');
});
route::group(['middleware'=>'auth'],function () {
    Route::get('/Profile', function () {
        return view('home');
    });

});
