@extends('layouts.header')
@section('title')
    <title> {{ config('app.name')." | ".__("Rest Password") }}</title>
@endsection
@section('content')
@if(!Auth::check())
    <ul class="sign-control">
        <li data-tab="tab-2"><a id="tab2" class="controle" href="/">{{__('Already using Brikole? Sign in')}}</a></li>
    </ul>
@endif
    <div class="sign_in_sec current" >
        @include('includes.errors.all')
        <div class="card-body">
            <h3>{{ __('Reset Password') }}</h3>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">

                            <input type="email" name="email" id="send_email"   @error('email') style="border: 1px solid red" @enderror placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <i class="la la-user"></i>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }} </strong>
                    </span>
                            @enderror
                        </div><!--sn-field end-->
                    </div>

                    <div class="col-lg-12 no-pdd">
                        <button type="submit" id="send_pwd"> {{ __('Send Password Reset Link') }}</button>
                    </div>
                </div>
            </form>

        </div>
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
