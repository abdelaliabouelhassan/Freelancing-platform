
@extends('layouts.resetPass')

@section('content')
    <div class="sign_in_sec current" >
        @include('includes.errors.all')
        <div class="card-body">

            <h3>{{ __('Confirm Password') }}</h3>
            {{ __('Please confirm your password before continuing.') }}
            <br><br>
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                            <input type="password" name="password"    @error('password') style="border: 1px solid red" @enderror placeholder="{{ __('Password') }}" value="{{ old('email') }}" required autocomplete="current-password" autofocus>
                            <i class="la la-user"></i>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }} </strong>
                    </span>
                            @enderror
                        </div><!--sn-field end-->
                    </div>

                    <div class="col-lg-12 no-pdd">
                        <button type="submit">   {{ __('Confirm Password') }}</button>
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

