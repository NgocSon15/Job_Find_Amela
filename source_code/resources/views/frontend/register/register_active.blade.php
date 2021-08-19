@extends('frontend.layout')
@section('title')
    Confirm Email
@endsection

@section('content')
    <main>
        <div class="register-form" style="margin: 30px 0;">
            <div class="page-wrapper container">
                <div class="wrapper">
                    <div class="card card-5">
                        @if(session()->has('activeFail'))
                        <div class="card-heading bg-warning" >
                            <h2 class="title" >Register</h2>
                        </div>
                        <div class="card-body">
                            <p class = "text-center text-danger" style="font-size: 30px">
                                <i class="fas fa-check-circle"></i>
                                Xác nhận địa chỉ mail thất bại
                            </p>
                            <p class="text-center"> <a href="" class="genric-btn success-border circle arrow">Gửi lại mail</a></p>
                        </div>
                        @else
                        <div class="card-heading bg-success" >
                            <h2 class="title" >Register</h2>
                        </div>
                        <div class="card-body">
                            <p class = "text-center text-success" style="font-size: 30px">
                                <i class="fas fa-check-circle"></i>
                                Lưu thông tin thành công
                            </p>
                                <p class = "text-center text-warning">Vui lòng kiểm tra mail và làm theo hướng dẫn để hoàn tất thủ tục đăng ký</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection