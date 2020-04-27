@extends('layouts.header')
@section('title')
<title> {{ config('app.name')." | ".__("Rest Password") }}</title>
@endsection
@section('content')
@if(!Auth::check())
    <ul class="sign-control">
        <li data-tab="tab-2"><a id="tab2" class="controle" href="{{url('login')}}">{{__('Already using Bricole? Sign in')}}</a></li>
    </ul>
@endif
<div class="sign_in_sec current">
    <h3>{{ __('Reset Password') }}</h3>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="row">
            <div class="col-lg-12 no-pdd">
                <div class="sn-field">
                    <input type="email" id="email" value="{{ $email ?? old('email') }}" @error('email') style="border: 1px solid red" @enderror name="email"
                           placeholder="{{ __('E-Mail Address') }}" required autocomplete=email" autofocus>
                    <i class="la la-user"></i>
                </div>
            </div>
            <div class="col-lg-12 no-pdd">
                <div class="sn-field">
                    <input type="password" id="pwd1" @error('password') style="border: 1px solid red" @enderror name="password"
                        placeholder="{{ __('Password') }}" required autocomplete="new-password">
                    <i class="la la-lock"></i>
                </div>
            </div>
            <div class="col-lg-12 no-pdd">
                <div class="sn-field">
                    <input type="password" id="pwd2" name="password_confirmation"
                        placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                    <i class="la la-lock"></i>
                </div>
            </div>
            <div class="col-lg-12 no-pdd">
                <button type="submit" id="pwd_rest"> {{ __('Reset Password') }}</button>
            </div>
        </div>
    </form>
    <!--login-resources end-->
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/validation_form.js')}}"></script>
<script type="text/javascript" src="{{asset('js/validation_rest.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/notifications.js')}}"></script>
@if (session('status'))
    <script>
        showNotification("alert-success", "{{ session('status') }}", "top","center", "", "");
    </script>
@endif
@include('includes.errors.all')
@endsection
