@extends('admin.layout')

@section('title', 'Delete company')
@section('active2', 'active')
@section('content-name', 'Xóa doanh nghiệp')
@section('content')
    <p>Bạn có muốn xóa hãng {{ $company->fullname }}?</p>
    <form method="post" action="{{ route('admin.company.destroy', $company->id) }}">
        @csrf
        <div class="d-flex">
            <input type="submit" class="btn btn-danger" value="Xoá">
            <a href="{{ route('admin.company.index') }}" class="btn btn-default ml-2">Huỷ</a>
        </div>
    </form>
@endsection