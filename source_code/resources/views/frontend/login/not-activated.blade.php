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
        <div class="register-form" style="margin: 30px 0;">
            <div class="page-wrapper container">
                <div class="wrapper">
                    <div class="card card-5">
                        <div class="card-heading bg-success" >
                            <h2 class="title" >Not activated</h2>
                        </div>
                        <div class="card-body">
                            <p class = "text-center text-warning">Tài khoản chưa kích hoạt, vui lòng kích hoạt tài khoản trước khi đăng nhập</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection