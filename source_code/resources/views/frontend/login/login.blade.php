@extends('frontend.layout')
@section('title')
Login
@endsection
@section('link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('jobfinderportal-master/assets/css/login.css') }}">
@endsection
@section('content')
<main>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('./jobfinderportal-master/assets/img/bg-01.jpg')">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form" action="{{ route('login') }}" method="post">
                    @csrf
                    <input type="text" hidden name="previous" value="{{ $previous }}">
                    <span class="login100-form-title p-b-49">
                        Login
                    </span>
                    @if(session()->has('LoginFail'))
                    <p class="text-danger text-center"> Đăng nhập thất bại, sai mật khẩu </p>
                    @endif
                    <div class="wrap-input100 m-b-23">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="text" name="email" placeholder="Type your email" value="{{ old('email') }}">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                        @if($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="wrap-input100">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Type your password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                        @if($errors->has('password'))
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="text-right p-t-8 p-b-31">
                        <a href="{{ route('forgot-password') }}" class="forgot-password">
                            Forgot password?
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>

                    <div class="txt1 text-center p-t-54 p-b-20">
                        <span>
                            Or Sign Up Using
                        </span>
                    </div>

                    <div class="flex-c-m">
                        <a href="#" class="login100-social-item bg1">
                            <i class="fab fa-facebook-f"></i>
                        </a>

                        <a href="#" class="login100-social-item bg2">
                            <i class="fab fa-twitter"></i>
                        </a>

                        <a href="#" class="login100-social-item bg3">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>
</main>
@endsection