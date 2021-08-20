@extends('admin.layout')
@section('title')
    Thông tin website
@endsection
@section('active3', 'active')
@section('content-name', 'Cấu hình trang web')
@section('content')
<div class="col-12">
    @if (Session::has('success'))
    <p class="text-success">
        <i class="fa fa-check" aria-hidden="true"></i>
        {{ Session::get('success') }}
    </p>
    @endif
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="width: 10px">ID</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Nội dung</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($configs as $key => $config)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$config->name}}</td>
                    <td>{{$config->description}}</td>
                    <td>
                        {{$config->content}}
                    </td>
                    <td>sửa</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
        </ul>
    </div>
</div>

@endsection