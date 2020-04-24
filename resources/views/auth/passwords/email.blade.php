@extends('layouts.header')
@section('title')
    <title> {{ config('app.name')." | ".__("Rest Password") }}</title>
@endsection
@section('style')
<style>
    #tab1 {
        padding: 5px 5px 5px 5px;
        background-color: orangered;
        border-radius: 5px;
        text-decoration-color: #fff3cd;
        color: #fff3cd;

    }

    #tab2 {
        color: black;
        padding: 3px 3px 3px 3px;
        background-color: gray;
        border-radius: 5px;
        text-decoration-color: black;
    }

    #tab1:hover {
        padding: 10px 10px 10px 10px;
        border-radius: 10px;
    }

    #tab2:hover {
        padding: 6px 6px 6px 6px;
        border-radius: 10px;
    }

</style>
@endsection
@section('content')
@if(!Auth::check())
<ul class="sign-control">
    <a data-tab="tab-1" id="tab1" class="current" href="{{url('login')}}" title="">Sign in</a>
    <a data-tab="tab-2" id="tab2" href="{{url('register')}}" title="">Sign
        up</a>
</ul>
@endif
    <div class="sign_in_sec current" >
        @include('includes.errors.all')
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h3>{{ __('Reset Password') }}</h3>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">

                            <input type="email" name="email"    @error('email') style="border: 1px solid red" @enderror placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <i class="la la-user"></i>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }} </strong>
                    </span>
                            @enderror
                        </div><!--sn-field end-->
                    </div>

                    <div class="col-lg-12 no-pdd">
                        <button type="submit"> {{ __('Send Password Reset Link') }}</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection