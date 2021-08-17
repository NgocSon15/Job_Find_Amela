@extends('admin.layout')

@section('title', 'Company Information')
@section('active2', 'active')
@section('content-name', 'Thông tin doanh nghiệp')
@section('content')
    <h3>{{ $company->fullname }}</h3>
@endsection