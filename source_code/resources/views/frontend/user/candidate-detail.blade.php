@extends('frontend.layout')
@section('title')
    Candidate Detail
@endsection
@section('content')
    <main>
        <!-- job post company Start -->
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->
                        <div class="single-job-items mb-50">
                            <div class="job-items">
                                <div class="company-img company-img-details">
                                    <a href="#"><img src="{{ asset('storage/images/default-avt.png') }}" alt="" style="max-height: 85px; max-width: 85px;"></a>
                                </div>
                                <div class="job-tittle job-tittle2">
                                    <a href="#">
                                        <h4>{{$user->customer->fullname}}</h4>
                                    </a>
                                    <ul>
                                        <li><i class="fas fa-mobile"></i>{{ $user->customer->phone }}</li>
                                        <li><i class="fas fa-envelope"></i>{{ $user->customer->email }}</li>
                                        <li><i class="fas fa-map-marker-alt"></i>{{ $user->customer->address }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- job single End -->

                        <div class="job-post-details">
                            <div class="post-details4 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Thông tin cơ bản</h4>
                                </div>
                                <ul>
                                    <li>Họ tên: <span>{{ $user->customer->fullname }}</span></li>
                                    @if($user->customer->birth)
                                        <li>Ngày sinh: <span>{{ $user->customer->birth }}</span></li>
                                    @endif
                                    @if($user->customer->sex)
                                        <li>Giới tính: <span>{{ $user->customer->sex == 1 ? 'Nam' : 'Nữ' }}</span></li>
                                    @endif
                                    @if($user->customer->marry)
                                        <li>Tình trạng hôn nhân: <span>{{ $user->customer->marry == 1 ? 'Đã kết hôn' : 'Chưa kết hôn'}}</span></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="post-details4 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Quá trình làm việc</h4>
                                </div>
                                @if($user->experiences)
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Từ</th>
                                            <th scope="col">Đến</th>
                                            <th scope="col">Công Ty</th>
                                            <th scope="col">Chức Vụ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user->experiences as $key=>$exp)
                                            <tr>
                                                <td scope="row">{{++$key}}</td>
                                                <td>{{$exp->since}}</td>
                                                <td>{{$exp->to_date}}</td>
                                                <td>{{$exp->company}}</td>
                                                <td>{{$exp->position}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>Người này chưa làm việc ở đâu</p>
                                @endif
                            </div>
                        </div>

                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Thông tin liên hệ</h4>
                            </div>
                            <ul>
                                <li>Số điện thoại : <span>{{ $user->customer->phone }}</span></li>
                                <li>Email : <span>{{ $user->customer->email }}</span></li>
                                <li>Địa chỉ : <span>{{ $user->customer->address }}</span></li>
                            </ul>
                            <div class="apply-btn2">
                                @if($user->customer->cv)
                                <a href="{{-- route('customer.cv.download', $user->customer->user_id) --}}" class="btn">Download CV</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- job post company End -->

    </main>
@endsection
