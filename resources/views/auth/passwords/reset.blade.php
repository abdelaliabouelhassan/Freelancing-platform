@extends('layouts.header')
@section('title')
<title> {{ config('app.name')." | ".__("Rest Password") }}</title>
@endsection
@section('content')
@if(!Auth::check())
<ul class="sign-control">
    <a data-tab="tab-1" id="tab1" class="current" href="{{url('login')}}" title="">Sign in</a>
    <a data-tab="tab-2" id="tab2" href="{{url('register')}}" title="">Sign
        up</a>
</ul>
@endif
<div class="sign_in_sec current">
    @include('includes.errors.all')
    <h3>{{ __('Reset Password') }}</h3>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="row">
            <div class="col-lg-12 no-pdd">
                <div class="sn-field">

                    <input type="email" name="email" @error('email') style="border: 1px solid red" @enderror
                        placeholder="{{ __('E-Mail Address') }}" value="{{ $email ?? old('email') }}" required
                        autocomplete="email" autofocus>
                    <i class="la la-user"></i>

                </div>
                <!--sn-field end-->
            </div>
            <div class="col-lg-12 no-pdd">
                <div class="sn-field">
                    <input type="password" @error('password') style="border: 1px solid red" @enderror name="password"
                        placeholder="{{ __('Password') }}" required autocomplete="new-password">
                    <i class="la la-lock"></i>
                </div>
            </div>
            <div class="col-lg-12 no-pdd">
                <div class="sn-field">
                    <input type="password" id="password-confirm" name="password_confirmation"
                        placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                    <i class="la la-lock"></i>
                </div>
            </div>
            <div class="col-lg-12 no-pdd">
                <button type="submit"> {{ __('Reset Password') }}</button>
            </div>
        </div>
    </form>
    <!--login-resources end-->
</div>
@endsection
