@extends('welcome')

@section('content')

    <div class="sign_in_sec current" >
      @include('includes.errors.all')
        <h3>Sign in</h3>
        <form method="POST" action="{{ route('login') }}">
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
                    <div class="sn-field">
                        <input type="password"  @error('email') style="border: 1px solid red" @enderror name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
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
                <li><a href="{{url('login/facebook')}}" title="" class="fb"><i class="fa fa-facebook"></i>Login Via Facebook</a></li>
                {{--                <li><a href="#" title="" class="tw"><i class="fa fa-twitter"></i>Login Via Twitter</a></li>--}}
            </ul>
        </div> <!--login-resources end-->
    </div>


@endsection
