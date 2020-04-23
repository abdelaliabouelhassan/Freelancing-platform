@extends('layouts.resetPass')

@section('content')
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
