<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" href="{{asset('images/logo.png')}}" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/line-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/line-awesome-font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/slick/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
    @yield('style')
</head>

<body class="sign-in">
    <div class="flex-center position-ref full-height">
        <div class="wrapper">
            <div class="sign-in-page">
                <div class="signin-popup">
                    <div class="signin-pop">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="cmp-info">
                                    <div class="cm-logo">
                                        <img src="{{asset('images/cm-logo.png')}}" alt="">
                                        <p>Workwise, is a global freelancing platform and social networking where
                                            businesses and independent professionals connect and collaborate
                                            remotely</p>
                                    </div>
                                    <!--cm-logo end-->
                                    <img src="{{asset('images/sign.png')}}" alt="">
                                </div>
                                <!--cmp-info end-->
                            </div>
                            <div class="col-lg-6">
                                <div class="login-sec">
                                    @yield('content')
                                    <!--sign_in_sec end-->
                                </div>
                                <!--login-sec end-->
                            </div>

                        </div>
                    </div>
                    <!--signin-pop end-->
                </div>
                <!--signin-popup end-->
                <div class="footy-sec">
                    <div class="container">
                        <ul>
                            <li><a href="#" title="">Help Center</a></li>
                            <li><a href="#" title="">Privacy Policy</a></li>
                            <li><a href="#" title="">Community Guidelines</a></li>
                            <li><a href="#" title="">Cookies Policy</a></li>
                            <li><a href="#" title="">Career</a></li>
                            <li><a href="" title="">Contact Us</a></li>
                            <li><a href="#" title="">Language</a></li>
                            <li><a href="#" title="">Copyright Policy</a></li>
                        </ul>
                        <p><img src="{{asset('images/copy-icon.png')}}" alt="">Copyright <span id="date-nd"></span>
                            <script>
                                var d = new Date();
                                document.getElementById("date-nd").innerHTML = d.getFullYear();

                            </script>
                        </p>
                    </div>
                </div>
                <!--footy-sec end-->
            </div>
            <!--sign-in-page end-->


        </div>
        <!--theme-layout end-->
    </div>

    @yield('script')

</body>

</html>
