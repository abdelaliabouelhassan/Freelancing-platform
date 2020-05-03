@extends('layouts.master')
@section('title')
<title> {{ config('app.name')." | ".__("Home") }}</title>
@endsection
@section('content')
    <router-view></router-view>
    <vue-progress-bar></vue-progress-bar>
@endsection
