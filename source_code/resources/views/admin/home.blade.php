@extends('admin.layout')

@section('title', 'Home')
@section('content-name', 'Welcome')
@section('content')
    {{-- Session::has('user') ? Session::get('user')->fullname : null --}}
@endsection
