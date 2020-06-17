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
Route::get('{slug}', function () {
    return view('home');
});
Route::get('/Chat/{slug}/{userslug}', function () {
    return view('home');
});
route::group(['middleware'=>'auth'],function () {
    Route::get('/Profile', function () {
        return view('home');
    });

});
Route::get('/Settings', function () {
    return view('home');
});
