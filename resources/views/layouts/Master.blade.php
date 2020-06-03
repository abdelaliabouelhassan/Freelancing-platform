<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="icon" href="{{asset('images/logotesticon.png')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.range.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/line-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/line-awesome-font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/slick/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
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
                    <a href=""  title=""><img src="images/logotesticon.png" style="height: 38px; width: 60px;" alt=""></a>
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
                            <router-link to="/home" ><span><i class="fa fa-home"></i></span>
                            Home</router-link>

                        </li>

                        <li>
                            <router-link to="/Projects" ><span><i class="fa fa-bullhorn"></i></span>
                            Projects</router-link>

                        </li>
                        <li v-if="$gets.IsLogedIn()">
                            <router-link to="/Profile" ><span><i class="fa fa-user"></i></span>
                            My Profile</router-link>
                        </li>
                        <li>
                            <router-link to="/Jobs" >
                            <span><i class="fa fa-briefcase"></i></span>
                            Jobs</router-link>
                        </li>
                        <li v-if="$gets.IsLogedIn()">
                            <router-link to="/Chat" >
                                <span><i class="fa fa-envelope"></i></span>
                                Messages</router-link>
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
                    </ul>
                </nav><!--nav end-->
                <!--menu-btn end-->

                <div class="user-account" v-if="$gets.IsLogedIn()">
                    <div class="notification not-box-open">
                        <i class="fa fa-bell not-box-open"></i>
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
                    </div>
                    <div class="user-info">

                    <img @if(auth()->check()) src="{{asset(auth()->user()->image ? auth()->user()->image->path  : 'http://via.placeholder.com/40x40')}}" @else src="http://via.placeholder.com/40x40" @endif style="height: 40px; width: 40px;" alt="">
                        {{-- <a href="javascript:void(0)" title="" v-text="$gets.user.name"></a>
                        <i class="la la-sort-down"></i> --}}
                    </div>
                    <div class="user-account-settingss">
                        @if (auth()->check())
                            <h3> {{auth()->user()->name}}</h3>
                        @endif
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
<div class="tags-sec full-width">
    <ul>
        <li><a href="#" title="">Help Center</a></li>
        <li><a href="#" title="">About</a></li>
        <li><a href="#" title="">Privacy Policy</a></li>
        <li><a href="#" title="">Community Guidelines</a></li>
        <li><a href="#" title="">Cookies Policy</a></li>
        <li><a href="#" title="">Career</a></li>
        <li><a href="#" title="">Language</a></li>
        <li><a href="#" title="">Copyright Policy</a></li>
    </ul>
    <div class="cp-sec">
        <img src="{{asset('images/logotest.png')}}" alt="">
        <p><img src="images/cp.png" alt="">Copyright &copy; 2020 Bricole</p>
    </div>
</div>
<script>
    @if(auth()->check())
    window.user = @json(auth()->user()->first('name'));
    @endif
    var style = 'color: tomato; background:#eee; -webkit-text-stroke: 1px black; font-size:30px;';
    console.log('%cHi, We are Happy 😆 to have you Here, But This is a browser feature intended for developers. If someone told you to copy-paste something here to enable a Brikol feature or "hack" 🛑 someone\'s account, it is a scam and will give them access to your Brikol account.', style );
</script>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('js/jquery.range-min.js')}}"></script>--}}
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="{{asset('lib/slick/slick.min.js')}}"></script>
<script type="text/javascript" src="js/scrollbar.js"></script>
<script type="text/javascript" src="{{asset('js/script.js')}}"></script>

<script>
    @if(auth()->check())
     const globalUserId = {{auth()->id()}}
    @endif


</script>
<script type="text/javascript" src="{{asset("js/app.js")}}"></script>
<script>
    Echo.private('chat.' + {{auth()->id()}})
        .listen('MessageSent', (e) => {
            if(!window.location.href.includes( e.message.url)){
                Toast.fire({
                    icon: 'question',
                    html:  '<span style="color:white"> '+e.message.user.name  + '</span>  <br> <h1> ' + e.message.message + '</h1> <a href=" ' + e.message.url + '">Go To Message !!</a>',
                    title:'<strong>New Message</strong>',
                })
            }

        });
</script>
</body>
