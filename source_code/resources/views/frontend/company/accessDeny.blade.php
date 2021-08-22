@extends('frontend.layout')
@section('title')
    Access Denied
@endsection
@section('content')
    <main>
        <div class="register-form" style="margin: 30px 0;">
            <div class="page-wrapper container">
                <div class="wrapper">
                    <div class="card card-5">
                        <div class="card-heading bg-danger" >
                            <h2 class="title" >Access Denied</h2>
                        </div>
                        <div class="card-body">
                            <p class = "text-center text-danger" style="font-size: 30px">
                                <i class="fas fa-times-circle"></i>
                                Không thể truy cập trang này
                            </p>
                            @if(session()->has('user') && session()->get('user')->company->status == 0)
                                <p class = "text-center text-warning">Doanh nghiệp của bạn chưa được duyệt</p>
                                <p class = "text-center text-warning">Hãy cập nhật thông tin doanh nghiệp của bạn và liên hệ admin để được duyệt doanh nghiệp</p>
                            @else
                                <p class = "text-center text-warning">Doanh nghiệp của bạn đã bị khóa</p>
                                <p class = "text-center text-warning">Hãy liên hệ admin để biết nguyên nhân và mở khóa doanh nghiệp</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
