@extends('admin.layout')

@section('title', 'Job List')
@section('content-name', 'Danh sách tin tuyển dụng')
@section('content')
    <div class="col-12">
        @if (Session::has('success'))
            <p class="text-success">
                <i class="fa fa-check" aria-hidden="true"></i>
                {{ Session::get('success') }}
            </p>
        @endif
    </div>
    <div class="d-flex">
        <form class="navbar-form navbar-left" action="{{ route('admin.job.search') }}">
            @csrf
            <div class="d-flex">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" name="keyWord"
                        @if(isset($keyword))
                            value="{{$keyword}}"
                        @endif
                    >
                </div>
                <button type="submit" class="btn btn-primary mb-3 ml-1">Tìm kiếm</button>
            </div>
        </form>
        <div class="d-flex ml-auto">
            <a href="{{ route('admin.job.create') }}" class="btn btn-success mb-3 ml-1">
                Thêm mới
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Mã công việc</th>
                    <th>Lương nhỏ nhất</th>
                    <th>Lương lớn nhất</th>
                    <th>Địa điểm</th>
                    <th>Số lượng</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($jobs as $key => $job)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $job->job_title }}</td>
                        <td>{{ $job->job_description }}</td>
                        <td>{{ $job->job_code }}</td>
                        <td>{{ $job->min_salary }}</td>
                        <td>{{ $job->max_salary }}</td>
                        <td>{{ $job->work_location }}</td>
                        <td>{{ $job->quantity }}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.job.edit', $job->id) }}" class="btn-sm btn-secondary mr-1">Sửa</a>
                            <a href="{{ route('admin.job.delete', $job->id) }}" class="btn-sm btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                {{ $jobs->appends(request()->query()) }}
            </ul>
        </div>
    </div>
@endsection
