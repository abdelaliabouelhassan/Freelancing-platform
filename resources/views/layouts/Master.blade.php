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
{{--    <style>--}}
{{--        blockquote{border-right:5px solid #eee;border-left:0}blockquote.pull-left p,blockquote.pull-left small,blockquote.pull-left .small{text-align:left}@media (min-width:768px){.dl-horizontal dt{float:right;width:160px;clear:right;text-align:left}.dl-horizontal dd{margin-left:0;margin-right:180px}}.navbar-brand{float:right}@media (min-width:768px){.navbar>.container .navbar-brand,.navbar>.container-fluid .navbar-brand{margin-right:-15px;margin-left:0}}@media (min-width:768px){.navbar-header{float:right}}.navbar-toggle{float:left;margin-left:15px}@media (min-width:768px){.navbar-collapse{width:auto;border-top:0;box-shadow:none}.navbar-collapse .navbar-nav.navbar-right:last-child{margin-right:0}}.navbar-form{margin-left:-15px;margin-right:-15px}.navbar-text{float:right}@media (min-width:768px){.navbar-text{margin-left:15px;margin-right:15px}}@media (max-width:767px){.navbar-nav .open .dropdown-menu>li>a,.navbar-nav .open .dropdown-menu .dropdown-header{padding:5px 25px 5px 15px}}@media (min-width:768px){.navbar-nav{float:right}.navbar-nav>li{float:right}}.nav-justified{width:100%}.nav-justified>li{float:none}.nav-justified>li>a{text-align:center;margin-bottom:5px}@media (min-width:768px){.nav-justified>li{display:table-cell;width:1%}.nav-justified>li>a{margin-bottom:0}}body{direction:rtl;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif}h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6{font-family:"Helvetica Neue",Helvetica,Arial,sans-serif}.nav-tabs{border-bottom:1px solid #ddd}.nav-tabs>li{float:right;margin-bottom:-1px}.nav-tabs>li>a{margin-right:-2px;border-radius:4px 4px 0 0}.nav-tabs.nav-justified{width:100%}.nav-tabs.nav-justified>li{float:none}.nav-tabs.nav-justified>li>a{text-align:center;margin-bottom:5px}@media (min-width:768px){.nav-tabs.nav-justified>li{display:table-cell;width:1%}.nav-tabs.nav-justified>li>a{margin-bottom:0}}.nav-tabs.nav-justified>li>a{margin-left:0}@media (min-width:768px){.nav-tabs.nav-justified>li>a{border-radius:4px 4px 0 0;color:#00f}}.nav-tabs.nav-justified>li>a{margin-left:0}.nav-tabs-justified>li>a{margin-left:0}@media (min-width:768px){.nav-tabs-justified>li>a{border-radius:4px 4px 0 0;color:#00f}}.progress-bar{float:right}.alert-dismissable .close{font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;top:-2px;left:21px;right:0}.close{font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;float:left}.caret{margin-right:2px}.dropdown-menu{right:0;float:left;left:auto}.dropdown-menu.pull-left{left:0;float:right;right:auto}.pull-left>.dropdown-menu{left:0;float:right;right:auto}.navbar-nav.pull-left>li>.dropdown-menu,.navbar-nav>li>.dropdown-menu.pull-left{right:auto;left:0}.nav-tabs-justified>li>a{margin-left:0}.nav-tabs>li{float:right}.nav-tabs>li>a{margin-left:2px}.nav-pills>li{float:right}.nav-pills>li>a{border-radius:4px}.nav-pills>li+li{margin-right:2px;margin-left:0}.nav-stacked>li{float:none}.nav-stacked>li+li{margin-right:0}.nav{padding-right:0}.nav-tabs.nav-justified,.nav-pills.nav-justified{width:100%}.nav-tabs.nav-justified>li,.nav-pills.nav-justified>li{float:none!important}.nav-tabs.nav-justified>li>a,.nav-pills.nav-justified>li>a{text-align:center;margin-bottom:5px}.nav-tabs.nav-justified>.dropdown .dropdown-menu,.nav-pills.nav-justified>.dropdown .dropdown-menu{top:auto;left:auto}@media (min-width:768px){.nav-tabs.nav-justified>li,.nav-pills.nav-justified>li{display:table-cell;width:1%}.nav-tabs.nav-justified>li>a,.nav-pills.nav-justified>li>a{margin-bottom:0}}.nav-tabs.nav-justified>li>a{color:#428bca}.input-group .form-control:first-child,.input-group-addon:first-child,.input-group-btn:first-child>.btn,.input-group-btn:first-child>.dropdown-toggle,.input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle){border-bottom-right-radius:4px;border-top-right-radius:4px;border-bottom-left-radius:0;border-top-left-radius:0}.input-group-addon:first-child{border-right:1px solid #ccc;border-left:0}.input-group .form-control:last-child,.input-group-addon:last-child,.input-group-btn:last-child>.btn,.input-group-btn:last-child>.dropdown-toggle,.input-group-btn:first-child>.btn:not(:first-child){border-bottom-left-radius:4px;border-top-left-radius:4px;border-bottom-right-radius:0;border-top-right-radius:0}.input-group-addon:last-child{border-left:1px solid #ccc;border-right:0}.input-group-btn:first-child>.btn{margin-left:-1px}.input-group-btn:last-child>.btn{margin-right:-1px}.input-group-btn>.btn{position:relative}.input-group-btn>.btn+.btn{margin-right:-4px}.input-group-btn>.btn:hover,.input-group-btn>.btn:active{z-index:2}.radio,.checkbox{padding-right:20px}.radio input[type=radio],.radio-inline input[type=radio],.checkbox input[type=checkbox],.checkbox-inline input[type=checkbox]{float:right;margin-right:-20px}.radio-inline+.radio-inline,.checkbox-inline+.checkbox-inline{margin-right:10px}.form-inline .radio,.form-inline .checkbox{padding-right:0}.form-inline .radio input[type=radio],.form-inline .checkbox input[type=checkbox]{margin-right:0}@media (min-width:768px){.form-horizontal .control-label{text-align:left}}.popover.top,.popover.bottom{direction:ltr}.popover.top .popover-title,.popover.top .popover-content,.popover.bottom .popover-title,.popover.bottom .popover-content{direction:rtl;text-align:right}th{text-align:right}.list-group{padding-right:0}.btn-group>.btn,.btn-group-vertical>.btn{float:right}.btn-group .btn+.btn,.btn-group .btn+.btn-group,.btn-group .btn-group+.btn,.btn-group .btn-group+.btn-group{margin-right:-1px}.btn-toolbar{margin-right:-5px}.btn-toolbar .btn-group,.btn-toolbar .input-group{float:right}.btn-toolbar>.btn,.btn-toolbar>.btn-group,.btn-toolbar>.input-group{margin-right:5px}.btn-group>.btn:first-child{margin-right:0}.btn-group>.btn:first-child:not(:last-child):not(.dropdown-toggle){border-bottom-left-radius:0;border-top-left-radius:0;border-bottom-right-radius:4px;border-top-right-radius:4px}.btn-group>.btn:last-child:not(:first-child),.btn-group>.dropdown-toggle:not(:first-child){border-bottom-right-radius:0;border-top-right-radius:0;border-bottom-left-radius:4px;border-top-left-radius:4px}.btn-group>.btn-group{float:right}.btn-group>.btn-group:first-child>.btn:last-child,.btn-group>.btn-group:first-child>.dropdown-toggle{border-bottom-left-radius:0;border-top-left-radius:0;border-bottom-right-radius:4px;border-top-right-radius:4px}.btn-group>.btn-group:last-child>.btn:first-child{border-bottom-right-radius:0;border-top-right-radius:0;border-bottom-left-radius:4px;border-top-left-radius:4px}.btn-group-justified>.btn,.btn-group-justified>.btn-group{float:none}.container{margin-right:auto;margin-left:auto;padding-left:15px;padding-right:15px}.row{margin-left:-15px;margin-right:-15px}.col-xs-1,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9,.col-xs-10,.col-xs-11,.col-xs-12,.col-sm-1,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-sm-10,.col-sm-11,.col-sm-12,.col-md-1,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-md-10,.col-md-11,.col-md-12,.col-lg-1,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-lg-10,.col-lg-11,.col-lg-12{position:relative;min-height:1px;padding-left:15px;padding-right:15px;margin-left:0}.col-xs-1,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9,.col-xs-10,.col-xs-11{float:right}.col-xs-1{width:8.333333333333332%}.col-xs-2{width:16.666666666666664%}.col-xs-3{width:25%}.col-xs-4{width:33.33333333333333%}.col-xs-5{width:41.66666666666667%}.col-xs-6{width:50%}.col-xs-7{width:58.333333333333336%}.col-xs-8{width:66.66666666666666%}.col-xs-9{width:75%}.col-xs-10{width:83.33333333333334%}.col-xs-11{width:91.66666666666666%}.col-xs-12{width:100%}@media (min-width:768px){.container{max-width:750px}.col-sm-1,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-sm-10,.col-sm-11{float:right}.col-sm-1{width:8.333333333333332%}.col-sm-2{width:16.666666666666664%}.col-sm-3{width:25%}.col-sm-4{width:33.33333333333333%}.col-sm-5{width:41.66666666666667%}.col-sm-6{width:50%}.col-sm-7{width:58.333333333333336%}.col-sm-8{width:66.66666666666666%}.col-sm-9{width:75%}.col-sm-10{width:83.33333333333334%}.col-sm-11{width:91.66666666666666%}.col-sm-12{width:100%}.col-sm-push-1{right:8.333333333333332%}.col-sm-push-2{right:16.666666666666664%}.col-sm-push-3{right:25%}.col-sm-push-4{right:33.33333333333333%}.col-sm-push-5{right:41.66666666666667%}.col-sm-push-6{right:50%}.col-sm-push-7{right:58.333333333333336%}.col-sm-push-8{right:66.66666666666666%}.col-sm-push-9{right:75%}.col-sm-push-10{right:83.33333333333334%}.col-sm-push-11{right:91.66666666666666%}.col-sm-pull-1{left:8.333333333333332%}.col-sm-pull-2{left:16.666666666666664%}.col-sm-pull-3{left:25%}.col-sm-pull-4{left:33.33333333333333%}.col-sm-pull-5{left:41.66666666666667%}.col-sm-pull-6{left:50%}.col-sm-pull-7{left:58.333333333333336%}.col-sm-pull-8{left:66.66666666666666%}.col-sm-pull-9{left:75%}.col-sm-pull-10{left:83.33333333333334%}.col-sm-pull-11{left:91.66666666666666%}.col-sm-offset-1{margin-right:8.333333333333332%}.col-sm-offset-2{margin-right:16.666666666666664%}.col-sm-offset-3{margin-right:25%}.col-sm-offset-4{margin-right:33.33333333333333%}.col-sm-offset-5{margin-right:41.66666666666667%}.col-sm-offset-6{margin-right:50%}.col-sm-offset-7{margin-right:58.333333333333336%}.col-sm-offset-8{margin-right:66.66666666666666%}.col-sm-offset-9{margin-right:75%}.col-sm-offset-10{margin-right:83.33333333333334%}.col-sm-offset-11{margin-right:91.66666666666666%}.col-sm-offset-1,.col-sm-offset-2,.col-sm-offset-3,.col-sm-offset-4,.col-sm-offset-5,.col-sm-offset-6,.col-sm-offset-7,.col-sm-offset-8,.col-sm-offset-9,.col-sm-offset-10,.col-sm-offset-11{margin-left:0}}@media (min-width:992px){.container{max-width:970px}.col-md-1,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-md-10,.col-md-11{float:right}.col-md-1{width:8.333333333333332%}.col-md-2{width:16.666666666666664%}.col-md-3{width:25%}.col-md-4{width:33.33333333333333%}.col-md-5{width:41.66666666666667%}.col-md-6{width:50%}.col-md-7{width:58.333333333333336%}.col-md-8{width:66.66666666666666%}.col-md-9{width:75%}.col-md-10{width:83.33333333333334%}.col-md-11{width:91.66666666666666%}.col-md-12{width:100%}.col-md-push-1{right:8.333333333333332%}.col-md-push-2{right:16.666666666666664%}.col-md-push-3{right:25%}.col-md-push-4{right:33.33333333333333%}.col-md-push-5{right:41.66666666666667%}.col-md-push-6{right:50%}.col-md-push-7{right:58.333333333333336%}.col-md-push-8{right:66.66666666666666%}.col-md-push-9{right:75%}.col-md-push-10{right:83.33333333333334%}.col-md-push-11{right:91.66666666666666%}.col-md-pull-1{left:8.333333333333332%}.col-md-pull-2{left:16.666666666666664%}.col-md-pull-3{left:25%}.col-md-pull-4{left:33.33333333333333%}.col-md-pull-5{left:41.66666666666667%}.col-md-pull-6{left:50%}.col-md-pull-7{left:58.333333333333336%}.col-md-pull-8{left:66.66666666666666%}.col-md-pull-9{left:75%}.col-md-pull-10{left:83.33333333333334%}.col-md-pull-11{left:91.66666666666666%}.col-md-offset-1{margin-right:8.333333333333332%}.col-md-offset-2{margin-right:16.666666666666664%}.col-md-offset-3{margin-right:25%}.col-md-offset-4{margin-right:33.33333333333333%}.col-md-offset-5{margin-right:41.66666666666667%}.col-md-offset-6{margin-right:50%}.col-md-offset-7{margin-right:58.333333333333336%}.col-md-offset-8{margin-right:66.66666666666666%}.col-md-offset-9{margin-right:75%}.col-md-offset-10{margin-right:83.33333333333334%}.col-md-offset-11{margin-right:91.66666666666666%}.col-md-offset-1,.col-md-offset-2,.col-md-offset-3,.col-md-offset-4,.col-md-offset-5,.col-md-offset-6,.col-md-offset-7,.col-md-offset-8,.col-md-offset-9,.col-md-offset-10,.col-md-offset-11{margin-left:0}}@media (min-width:1200px){.container{max-width:1170px}.col-lg-1,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-lg-10,.col-lg-11{float:right}.col-lg-1{width:8.333333333333332%}.col-lg-2{width:16.666666666666664%}.col-lg-3{width:25%}.col-lg-4{width:33.33333333333333%}.col-lg-5{width:41.66666666666667%}.col-lg-6{width:50%}.col-lg-7{width:58.333333333333336%}.col-lg-8{width:66.66666666666666%}.col-lg-9{width:75%}.col-lg-10{width:83.33333333333334%}.col-lg-11{width:91.66666666666666%}.col-lg-12{width:100%}.col-lg-push-1{right:8.333333333333332%}.col-lg-push-2{right:16.666666666666664%}.col-lg-push-3{right:25%}.col-lg-push-4{right:33.33333333333333%}.col-lg-push-5{right:41.66666666666667%}.col-lg-push-6{right:50%}.col-lg-push-7{right:58.333333333333336%}.col-lg-push-8{right:66.66666666666666%}.col-lg-push-9{right:75%}.col-lg-push-10{right:83.33333333333334%}.col-lg-push-11{right:91.66666666666666%}.col-lg-pull-1{left:8.333333333333332%}.col-lg-pull-2{left:16.666666666666664%}.col-lg-pull-3{left:25%}.col-lg-pull-4{left:33.33333333333333%}.col-lg-pull-5{left:41.66666666666667%}.col-lg-pull-6{left:50%}.col-lg-pull-7{left:58.333333333333336%}.col-lg-pull-8{left:66.66666666666666%}.col-lg-pull-9{left:75%}.col-lg-pull-10{left:83.33333333333334%}.col-lg-pull-11{left:91.66666666666666%}.col-lg-offset-1{margin-right:8.333333333333332%}.col-lg-offset-2{margin-right:16.666666666666664%}.col-lg-offset-3{margin-right:25%}.col-lg-offset-4{margin-right:33.33333333333333%}.col-lg-offset-5{margin-right:41.66666666666667%}.col-lg-offset-6{margin-right:50%}.col-lg-offset-7{margin-right:58.333333333333336%}.col-lg-offset-8{margin-right:66.66666666666666%}.col-lg-offset-9{margin-right:75%}.col-lg-offset-10{margin-right:83.33333333333334%}.col-lg-offset-11{margin-right:91.66666666666666%}.col-lg-offset-1,.col-lg-offset-2,.col-lg-offset-3,.col-lg-offset-4,.col-lg-offset-5,.col-lg-offset-6,.col-lg-offset-7,.col-lg-offset-8,.col-lg-offset-9,.col-lg-offset-10,.col-lg-offset-11{margin-left:0}}.list-group-item>.badge{float:left}.list-group-item>.badge+.badge{margin-left:5px;margin-right:0}.pagination{padding-right:0}.pagination>li>a,.pagination>li>span{float:right;margin-right:-1px;margin-left:0}.pagination>li:first-child>a,.pagination>li:first-child>span{margin-left:0;border-bottom-right-radius:4px;border-top-right-radius:4px;border-bottom-left-radius:0;border-top-left-radius:0}.pagination>li:last-child>a,.pagination>li:last-child>span{margin-right:-1px;border-bottom-left-radius:4px;border-top-left-radius:4px;border-bottom-right-radius:0;border-top-right-radius:0}.pager{padding-right:0}.pager .next>a,.pager .next>span{float:left}.pager .previous>a,.pager .previous>span{float:right}.modal-footer{text-align:left}.modal-footer .btn+.btn{margin-right:5px;margin-left:0}.modal-footer .btn-group .btn+.btn{margin-right:-1px;margin-left:0}.modal-footer .btn-block+.btn-block{margin-right:0}.carousel-inner>.item{-webkit-transition:.6s ease-in-out left;-o-transition:.6s ease-in-out left;transition:.6s ease-in-out left}--}}

{{--    </style>--}}
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
                    <a href=""  title=""><img src="{{asset('images/logotesticon.png')}}" style="height: 38px; width: 60px;" alt=""></a>
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
                        <Message v-if="$gets.IsLogedIn()"></Message>

                        <li v-if="$gets.IsLogedIn()">
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
        <p><img src="{{asset('images/cp.png')}}" alt="">Copyright &copy; 2020 Bricole</p>
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
<script type="text/javascript" src="{{asset('js/jquery.mCustomScrollbar.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/slick/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/scrollbar.js')}}"></script>
<script type="text/javascript" src="{{asset('js/script.js')}}"></script>

<script>
        @if(auth()->check())
    const globalUserId = {{auth()->id()}}
    @endif
</script>
<script type="text/javascript" src="{{asset("js/app.js")}}"></script>
<script>
        @if(auth()->check())

    Echo.private('chat.' + {{auth()->id()}})
        .listen('MessageSent', (e) => {
            if(!window.location.href.includes( e.message.url)){
                Toast.fire({
                    icon: 'question',
                    title:  '<strong>New Message</strong>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> ' + e.message.user.name  + ' </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h1>: ' + e.message.message + ' </h1> ',
                })
            }

        });
    @endif
    Swal.fire({
        title: 'Welcome To Brikol This Platform Still In Development Please If You Note Any bugs or anything let me know thank You For being here enjoy (:',
        width: 600,
        padding: '3em',
        background: '#fff url(/images/trees.png)',
        backdrop: `
    rgba(0,0,123,0.4)
    url("https://media.giphy.com/media/j0R2xnont0Z6E/giphy.gif")
    left top
    no-repeat
  `
    })
</script>
</body>
