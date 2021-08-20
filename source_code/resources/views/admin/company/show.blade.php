@extends('admin.layout')

@section('title', 'Company Information')
@section('active2', 'active')
@section('content-name', 'Thông tin doanh nghiệp')
@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img"
                             src="{{ asset('storage/images/'. $company->logo) }}"
                             alt="User profile picture"
                             style="max-height: 100px; border: none">
                    </div>

                    <h3 class="profile-username text-center">{{ $company->fullname }}</h3>

                    <p class="text-muted text-center">{{ $company->field ? $company->field->field_name : null }}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Quy mô nhân viên</b> <a class="float-right">{{ $company->companySize ? $company->companySize->size : null }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Số công việc</b> <a class="float-right">{{ $company->total_jobs }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Số người cần tuyển</b> <a class="float-right">{{ $company->total_employee }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thông tin liên hệ</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                    <p class="text-muted">
                        {{ $company->email }}
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                    <p class="text-muted">{{ $company->address }}</p>

                    <hr>

                    <strong><i class="fas fa-phone mr-1"></i> Phone Number</strong>

                    <p class="text-muted">
                        {{ $company->phone }}
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header" style="background-color: #007bff; color:white">
                    <h3 class="card-title">Thông tin doanh nghiệp</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong>Tên doanh nghiệp</strong>

                    <p class="text-muted">
                        {{ $company->fullname }}
                    </p>

                    <hr>

                    <strong>Mã doanh nghiệp</strong>

                    <p class="text-muted">
                        {{ $company->company_code }}
                    </p>

                    <hr>

                    <strong><i class="fas fa-book mr-1"></i> Mã số thuế</strong>

                    <p class="text-muted">{{ $company->tax_code }}</p>

                    <hr>
                    @if($company->website)
                        <strong><i class="fas fa-globe mr-1"></i> Website</strong>
                        <br>
                        <a class="text-muted" href="{{ $company->website }}">
                            {{ $company->website }}
                        </a>

                        <hr>
                    @endif

                    @if($company->map)
                        <strong><i class="fas fa-map mr-1"></i> Bản đồ</strong>
                        <br>
                        <a class="text-muted" href="{{ $company->map }}">
                            {{ $company->fullname }}
                        </a>

                        <hr>
                    @endif

                    <strong><i class="fas fa-file mr-1"></i> Mô tả</strong>
                    <br>
                    <p class="text-muted">
                        {{ $company->description }}
                    </p>

                    <hr>

                    <strong>Trạng thái</strong>
                    <br>
                    <p class="text-muted">
                        @if($company->status == 0)
                            Đang đợi duyệt
                        @elseif($company->status == 1)
                            Đang hoạt động
                        @elseif($company->status == 2)
                            Đã bị khóa
                        @endif
                    </p>

                    <hr>

                    <strong class="mr-2">Đề xuất</strong>
                    <br>
                    <p class="text-muted">
                        @if($company->is_suggest)
                            Được đề xuất
                        @else
                            Không được đề xuất
                        @endif
                    </p>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
