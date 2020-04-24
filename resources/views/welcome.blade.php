<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{config("app.name")." | ".__("Sign up Or Sign in") }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/line-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/line-awesome-font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/slick/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">



</head>
<body>
<div class="flex-center position-ref full-height">

    <body class="sign-in">


    <div class="wrapper">


        <div class="sign-in-page">
            <div class="signin-popup">
                <div class="signin-pop">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="cmp-info">
                                <div class="cm-logo">
                                    <img src="images/cm-logo.png" alt="">
                                    <p>Workwise,  is a global freelancing platform and social networking where businesses and independent professionals connect and collaborate remotely</p>
                                </div><!--cm-logo end-->
                                <img src="images/cm-main-img.png" alt="">
                            </div><!--cmp-info end-->
                        </div>

                        <div class="col-lg-6">
                            <div class="login-sec">
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
                        @if(\Request::is('login') || Request::is('/') && !session()->has('good'))
                                    current
                                @endif" id="tab-1">
                                    @if(!session()->has('good'))
                                        @include('includes.errors.all')
                                    @endif
                                    <h3>Sign In</h3>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="row">
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="email" name="email"   @if(!session()->has('good'))  @error('email') style="border: 1px solid red" @enderror  @endif placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                    <i class="la la-user"></i>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }} </strong>
                                                </span>
                                                    @enderror
                                                </div><!--sn-field end-->
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="password"  @if(!session()->has('good')) @error('email') style="border: 1px solid red" @enderror  @endif name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
                                                    <i class="la la-lock"></i>

                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="checky-sec">
                                                    <div class="fgt-sec">
                                                        <input type="checkbox" name="remember" id="c1"   {{ old('remember') ? 'checked' : '' }}>
                                                        <label for="c1">
                                                            <span></span>
                                                            {{ __('Remember Me') }}
                                                        </label>

                                                    </div><!--fgt-sec end-->
                                                    @if (Route::has('password.request'))
                                                        <a  href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <button type="submit"> {{ __('Login') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="login-resources">
                                        <h4>Login Via Social Account</h4>
                                        <ul>
                                            <li><a href="{{ url('auth/facebook') }}" title="" class="fb"><i class="fa fa-facebook"></i>Login Via Facebook</a></li>
                                            <li><a href="#" title="" class="tw"><i class="fa fa-twitter"></i>Login Via Twitter</a></li>
                                        </ul>
                                    </div><!--login-resources end-->
                                </div>


                                <!--sign_in_sec end-->
                                <div class="sign_in_sec
                              @if(\Request::is('register') || session()->has('good'))
                                    current
                                        @endif
                                    " id="tab-2">
                                    <h3>Sign Up</h3>
                                    @if(session()->has('good'))
                                @include('includes.errors.all')
                                @endif
                                    <!--signup-tab end-->
                                    <div class="dff-tab current" id="tab-3">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="name" type="text"    @if(session()->has('good')) @error('name') style="border: 1px solid red" @enderror @endif name="name" value="{{ old('name') }}"   placeholder="{{ __('Full Name') }}" required autocomplete="name" autofocus>
                                                        <i class="la la-male"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="email" type="email" @if(session()->has('good')) @error('email') style="border: 1px solid red" @enderror  @endif name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail Address') }}">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="password" type="password" @if(session()->has('good')) @error('password') style="border: 1px solid red" @enderror @endif name="password" required autocomplete="password" placeholder="{{ __('Password') }}">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 no-pdd">
                                                    <div class="checky-sec st2">
                                                        <div class="fgt-sec">
                                                            <input type="checkbox" name="Terms" id="c2" required title="You should Agree Our Terms & Conditions.">
                                                            <label for="c2">
                                                                <span></span>
                                                            </label>
                                                            <small id="checkcolor">Yes, I understand and agree to the workwise Terms & Conditions.</small>
                                                        </div><!--fgt-sec end-->
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <button type="submit" id="btn" value="submit">Get Started</button>
                                                </div>
                                                <script>
                                                    var checkBox = document.getElementById("c2");
                                                    document.getElementById("btn").addEventListener("click", function(){

                                                        if(checkBox.checked){
                                                            console.log('good');
                                                        }else{
                                                            console.log('bad');
                                                            document.getElementById("checkcolor").style.color = 'red';
                                                            document.getElementById('c2').style.backgroundColor = 'red';
                                                        }
                                                    });
                                                </script>
                                            </div>
                                        </form>
                                    </div><!--dff-tab end-->

                                </div>
                            </div><!--login-sec end-->

                        </div>










                    </div>
                </div><!--signin-pop end-->
            </div><!--signin-popup end-->
            <div class="footy-sec">
                <div class="container">
                    <ul>
                        <li><a href="#" title="">Help Center</a></li>
                        <li><a href="#" title="">Privacy Policy</a></li>
                        <li><a href="#" title="">Community Guidelines</a></li>
                        <li><a href="#" title="">Cookies Policy</a></li>
                        <li><a href="#" title="">Career</a></li>
                        <li><a href="#" title="">Forum</a></li>
                        <li><a href="#" title="">Language</a></li>
                        <li><a href="#" title="">Copyright Policy</a></li>
                    </ul>
                    <p><img src="{{asset('images/copy-icon.png')}}" alt="">Copyright <span id="date-nd"></span>
                        <script >var d = new Date();
                            document.getElementById("date-nd").innerHTML = d.getFullYear();</script></p>
                </div>
            </div><!--footy-sec end-->
        </div><!--sign-in-page end-->


    </div><!--theme-layout end-->


    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="lib/slick/slick.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    </body>
</html>
