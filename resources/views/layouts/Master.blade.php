<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">    
    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="icon" href="{{asset('images/logotesticon.png')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.range.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/line-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/line-awesome-font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/slick/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
    @yield('style')
</head>

<body>
<div class="wrapper" id="app">
    <header>
        <div class="container">
            <div class="header-data">
                <div class="menu-btn">
                    <a href="javascript:void(0)" title=""><i class="fa fa-bars"></i></a>
                </div>
                <div class="logo">
                    <a href="index.html" title=""><img src="images/logo.png" alt=""></a>
                </div><!--logo end-->
                <div class="search-bar">
                    <form>
                        <input type="text" name="search" placeholder="Search...">
                        <button type="submit"><i class="la la-search"></i></button>
                    </form>
                </div><!--search-bar end-->
                <nav>
                    <ul>
                        <li>
                            <span><img src="images/icon1.png" alt=""></span>
                            <router-link to="/Home">Home</router-link>

                        </li>

                        <li>
                            <span><img src="images/icon3.png" alt=""></span>
                            <router-link to="/Projects">Projects</router-link>

                        </li>
                        <li v-if="$gets.IsLogedIn()">
                            <span><img src="images/icon4.png" alt=""></span>
                            <router-link to="/Profile">Profiles</router-link>
                        </li>
                        <li>
                            <span><img src="images/icon5.png" alt=""></span>
                            <router-link to="/Jobs">Jobs</router-link>
                        </li>
                        <li v-if="$gets.IsLogedIn()">
                            <a href="javascript:void(0)" title="" class="not-box-open">
                                <span><img src="images/icon6.png" alt=""></span>
                                Messages
                            </a>
                            <div class="notification-box msg">
                                <div class="nt-title">
                                    <h4>Setting</h4>
                                    <a href="javascript:void(0)" title="">Clear all</a>
                                </div>
                                <div class="nott-list">
                                    <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="messages.html" title="">Jassica William</a> </h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
                                            <span>2 min ago</span>
                                        </div><!--notification-info -->
                                    </div>
                                    <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="messages.html" title="">Jassica William</a></h3>
                                            <p>Lorem ipsum dolor sit amet.</p>
                                            <span>2 min ago</span>
                                        </div><!--notification-info -->
                                    </div>
                                    <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="messages.html" title="">Jassica William</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt ut labore et dolore magna aliqua.</p>
                                            <span>2 min ago</span>
                                        </div><!--notification-info -->
                                    </div>
                                    <div class="view-all-nots">
                                        <a href="messages.html" title="">View All Messsages</a>
                                    </div>
                                </div><!--nott-list end-->
                            </div><!--notification-box end-->
                        </li>
                        <li v-if="$gets.IsLogedIn()">
                            <a href="javascript:void(0)" title="" class="not-box-open">
                                <span><img src="images/icon7.png" alt=""></span>
                                Notification
                            </a>
                            <div class="notification-box">
                                <div class="nt-title">
                                    <h4>Setting</h4>
                                    <a href="#" title="">Clear all</a>
                                </div>
                                <div class="nott-list">
                                    <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                            <span>2 min ago</span>
                                        </div><!--notification-info -->
                                    </div>
                                    <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                            <span>2 min ago</span>
                                        </div><!--notification-info -->
                                    </div>
                                    <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                            <span>2 min ago</span>
                                        </div><!--notification-info -->
                                    </div>
                                    <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                            <span>2 min ago</span>
                                        </div><!--notification-info -->
                                    </div>
                                    <div class="view-all-nots">
                                        <a href="#" title="">View All Notification</a>
                                    </div>
                                </div><!--nott-list end-->
                            </div><!--notification-box end-->
                        </li>
                    </ul>
                </nav><!--nav end-->
                <!--menu-btn end-->

                <div class="user-account" v-if="$gets.IsLogedIn()">
                    <div class="user-info">
                        <img src="http://via.placeholder.com/30x30" alt="">
                        <a href="javascript:void(0)" title="" v-text="$gets.user.name"></a>
                        <i class="la la-sort-down"></i>
                    </div>
                    <div class="user-account-settingss">
                        <h3>Online Status</h3>
                        <ul class="on-off-status">
                            <li>
                                <div class="fgt-sec">
                                    <input type="radio" name="cc" id="c5">
                                    <label for="c5">
                                        <span></span>
                                    </label>
                                    <small>Online</small>
                                </div>
                            </li>
                            <li>
                                <div class="fgt-sec">
                                    <input type="radio" name="cc" id="c6">
                                    <label for="c6">
                                        <span></span>
                                    </label>
                                    <small>Offline</small>
                                </div>
                            </li>
                        </ul>
                        <h3>Custom Status</h3>
                        <div class="search_form">
                            <form>
                                <input type="text" name="search">
                                <button type="submit">Ok</button>
                            </form>
                        </div><!--search_form end-->
                        <h3>Setting</h3>
                        <ul class="us-links">
                            <li><a href="profile-account-setting.html" title="">Account Setting</a></li>
                            <li><a href="#" title="">Privacy</a></li>
                            <li><a href="#" title="">Faqs</a></li>
                            <li><a href="#" title="">Terms & Conditions</a></li>
                        </ul>
                        <h3 class="tc"><a href="{{ route('logout') }}" title="{{ __('Logout') }}"
                                          onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></h3>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div><!--user-account-settingss end-->
                </div>
            </div><!--header-data end-->
        </div>
    </header><!--header end-->

    @yield('content')

</div><!--theme-bricole end-->
<script>
    window.user = @json(auth()->user())
</script>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('js/jquery.range-min.js')}}"></script>--}}
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="{{asset('lib/slick/slick.min.js')}}"></script>
<script type="text/javascript" src="js/scrollbar.js"></script>
<script type="text/javascript" src="{{asset('js/script.js')}}"></script>
<script src="{{asset("js/app.js")}}"></script>
@yield('script')
</body>
