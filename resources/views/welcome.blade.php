@extends('layouts.header')
@section('title')
<title> {{ config('app.name')." | ".__("Sign up or Sign in") }}</title>
@endsection
@section('content')
<ul class="sign-control">
    <li data-tab="tab-1" class="
    @if(\Request::is('login') || Request::is('/') && !session()->has('good'))
        current
    @endif">
        <a href="{{ route('login') }}" title="login">Sign in</a></li>
    <li data-tab="tab-2" class="
    @if(\Request::is('register') || session()->has('good'))
        current
    @endif"><a href="{{ route('register') }}" title="register">Sign up</a></li>
</ul>

<div class="sign_in_sec 
    @if(Request::is('login') || Request::is('/') && !session()->has('good'))
        current
    @endif" id="tab-1">    
    <h3>Sign In</h3>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row">
            <div class="col-lg-12 no-pdd">
                <div class="sn-field">
                    <input type="email" id="signin_email" name="email" @if(!session()->has('good'))
                    @error('email')
                    style="border: 1px solid red" @enderror @endif
                    placeholder="{{ __('E-Mail Address') }}"
                    value="{{ old('email') }}" required autocomplete="email"
                    autofocus>
                    <i class="la la-user"></i>                    
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }} </strong>
                    </span>
                    @enderror
                </div>
                <!--sn-field end-->
            </div>
            <div class="col-lg-12 no-pdd">
                <div class="sn-field">
                    <input type="password" id="signin_password" @if(!session()->has('good'))
                    @error('email') style="border: 1px solid red" @enderror
                    @endif name="password" placeholder="{{ __('Password') }}"
                    required autocomplete="current-password">
                    <i class="la la-lock"></i>                    

                </div>
            </div>
            <div class="col-lg-12 no-pdd">
                <div class="checky-sec">
                    <div class="fgt-sec">
                        <input type="checkbox" name="remember" id="c1" {{ old('remember') ? 'checked' : '' }}>
                        <label for="c1">
                            <span></span>
                            {{ __('Remember Me') }}
                        </label>

                    </div>
                    <!--fgt-sec end-->
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div>
            <div class="col-lg-12 no-pdd">
                <button type="submit" id="btn_signin"> {{ __('Login') }}</button>
            </div>
        </div>
    </form>
    <div class="login-resources">
        <h4>Login Via Social Account</h4>
        <ul>
            <li><a href="{{ url('auth/facebook') }}" title="" class="fb"><i class="fa fa-facebook"></i>Login Via
                    Facebook</a></li>
            <li><a href="#" title="" class="tw"><i class="fa fa-twitter"></i>Login
                    Via Twitter</a></li>
        </ul>
    </div>
    <!--login-resources end-->
</div>


<!--sign_in_sec end-->
<div class="sign_in_sec
    @if(\Request::is('register') || session()->has('good'))
    current
        @endif
    " id="tab-2">
    <h3>Sign Up</h3>    
    <div class="dff-tab current" id="tab-3">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
                <div class="col-lg-12 no-pdd">
                    <div class="sn-field">
                        <input id="name" type="text" @if(session()->has('good'))
                        @error('name') style="border: 1px solid red" @enderror
                        @endif name="name" value="{{ old('name') }}"
                        placeholder="{{ __('Full Name') }}" required
                        autocomplete="name" autofocus>
                        <i class="la la-male"></i>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <div class="sn-field">
                        <input id="email" type="email" @if(session()->has('good'))
                        @error('email')
                        style="border: 1px solid red" @enderror @endif
                        name="email" value="{{ old('email') }}" required
                        autocomplete="email"
                        placeholder="{{ __('E-Mail Address') }}">
                        <i class="la la-user"></i>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <div class="sn-field">
                        <input id="pwd1" type="password" @if(session()->has('good')) @error('password')
                        style="border: 1px solid red" @enderror @endif
                        name="password" required autocomplete="password"
                        placeholder="{{ __('Password') }}">
                        <i class="la la-lock"></i>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <div class="sn-field" id="pwd_conf">
                        <input id="pwd2" type="password" name="password_confirmation" required
                            autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                        <i class="la la-lock"></i>
                    </div>
                </div>

                <div class="col-lg-12 no-pdd">
                    <div class="checky-sec st2">
                        <div class="fgt-sec">
                            <input type="checkbox" name="Terms" id="c2" required
                                title="You should Agree Our Terms & Conditions.">
                            <label for="c2" id="checkcolor">
                                <span></span>
                                {{__('Yes, I understand and agree
                                to the workwise Terms & Conditions.')}}
                            </label>
                        </div>
                        <!--fgt-sec end-->
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <button type="submit" id="btn_signup" value="submit">Get
                        Started</button>
                </div>
            </div>
        </form>
        <div class="login-resources">            
            <ul>
                <li><a href="{{ url('auth/facebook') }}" title="" class="fb"><i class="fa fa-facebook"></i>Sign Up with
                        Facebook</a></li>                
            </ul>
        </div>  
    </div>
    <!--dff-tab end-->
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/slick/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/script.js')}}"></script>
<script type="text/javascript" src="{{asset('js/validation_form.js')}}"></script>
<script type="text/javascript" src="{{asset('js/validation.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/notifications.js')}}"></script>
@include('includes.errors.all')
@endsection
