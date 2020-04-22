@extends('welcome')

@section('content')
    <div class="sign_in_sec current" >
            @include('includes.errors.all')

        <div class="dff-tab current" id="tab-3">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                            <input id="name" type="text"  @error('name') style="border: 1px solid red" @enderror  name="name" value="{{ old('name') }}"   placeholder="Full Name" required autocomplete="name" autofocus>
                            <i class="la la-male"></i>
                        </div>
                    </div>
                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                            <input id="email" type="email" @error('email') style="border: 1px solid red" @enderror name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail Address') }}">
                            <i class="la la-user"></i>
                        </div>
                    </div>
                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                            <input id="password" type="password" @error('password') style="border: 1px solid red" @enderror name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">
                            <i class="la la-lock"></i>
                        </div>
                    </div>
                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                            <i class="la la-lock"></i>
                        </div>
                    </div>
                    <div class="col-lg-12 no-pdd">
                        <div class="checky-sec st2">
                            <div class="fgt-sec">
                                <input type="checkbox" name="Terms" id="c2" required title="You should Agree Our Terms & Conditions.">
                                <label for="c2">
                                    <span></span>
                                </label>
                                <small id="checkcolor">Yes, I understand and agree to the workwise Terms & Conditions.</small>
                            </div><!--fgt-sec end-->
                        </div>
                    </div>
                    <div class="col-lg-12 no-pdd">
                        <button type="submit" id="btn" value="submit">Get Started</button>
                    </div>
                </div>
            </form>
            <div class="login-resources">
                <h4>Sign Up Via Social Account</h4>
                <ul>
                    <li><a href="{{url('login/facebook')}}" title="" class="fb"><i class="fa fa-facebook"></i>Sign Up Via Facebook</a></li>
                    {{--                <li><a href="#" title="" class="tw"><i class="fa fa-twitter"></i>Login Via Twitter</a></li>--}}
                </ul>
            </div> <!--login-resources end-->
        </div><!--dff-tab end-->

    </div>


    <script>
        var checkBox = document.getElementById("c2");
        document.getElementById("btn").addEventListener("click", function(){
            if(checkBox.checked){
                console.log('good');
            }else{
                console.log('bad');
                document.getElementById("checkcolor").style.color = 'red';
                document.getElementById('c2').style.backgroundColor = 'red';
            }
        });
    </script>

@endsection
