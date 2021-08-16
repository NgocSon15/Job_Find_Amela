@extends('frontend.layout')
@section('title')
Register
@endsection

@section('content')
<main>
    <div class="register-form" style="margin: 30px 0;">
        <div class="page-wrapper container">
            <div class="wrapper">
                <div class="card card-5">
                    <div class="card-heading bg-success" >
                        <h2 class="title" >Register Success</h2>
                    </div>
                    <div class="card-body">
                        <p class = "text-center text-success" style="font-size: 30px">
                        <i class="fas fa-check-circle"></i>
                            Đăng ký thành công
                        </p>
                        @if(session()->has('companySuccess'))
                        <p class = "text-center text-warning">Mật khẩu đã được gửi vào địa chỉ email mà bạn đã đăng ký</p>
                        <p class = "text-center text-warning">Yêu cầu của bạn được xử lý trong 1-5 ngày làm việc</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
  