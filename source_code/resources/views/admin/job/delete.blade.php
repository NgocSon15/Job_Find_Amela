@extends('admin.layout')

@section('title', 'Delete job')
@section('content-name', 'Xóa tin tuyển dụng')
@section('content')
    <p>Bạn có muốn xóa quần áo {{ $job->job_title }}?</p>
    <form method="post" action="{{ route('admin.job.destroy', $job->id) }}">
        @csrf
        <div class="d-flex">
            <input type="submit" class="btn btn-danger" value="Xoá">
            <a href="{{ route('admin.job.index') }}" class="btn btn-default ml-2">Huỷ</a>
        </div>
    </form>
@endsection