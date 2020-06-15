
@extends('layouts.header')
@section('title')
    <title> {{ config('app.name')." | ".__("Change Password") }}</title>
@endsection
@section('content')
@section('content')
@if(!Auth::check())
<ul class="sign-control">
    <li data-tab="tab-2"><a id="tab2" class="controle" href="/">{{__('Already using Brikole? Sign in')}}</a></li>
</ul>
@endif
    <div class="sign_in_sec current" >
        <div class="card-body">

            <h3>{{ __('Confirm Password') }}</h3>
            {{ __('Please confirm your password before continuing.') }}
            <br><br>
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                            <input type="password" name="password"  id="pwd"  @error('password') style="border: 1px solid red" @enderror placeholder="{{ __('Password') }}" value="{{ old('email') }}" required autocomplete="current-password" autofocus>
                            <i class="la la-lock"></i>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }} </strong>
                    </span>
                            @enderror
                        </div><!--sn-field end-->
                    </div>

                    <div class="col-lg-12 no-pdd">
                        <button type="submit" id="confirm_pwd">   {{ __('Confirm Password') }}</button>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>

        </div>
    </div>

@endsection
@section('script')
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/validation_rest.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/notifications.js')}}"></script>
@include('includes.errors.all')
@endsection

