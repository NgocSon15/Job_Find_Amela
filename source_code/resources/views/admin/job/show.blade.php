@extends('admin.layout')

@section('title', 'Job Information')
@section('content-name', 'Thông tin danh sách tin')
@section('content')
    <h3>{{ $job->job_title }}</h3>
    <p>{{ $job->company_id }}</p>
    <p>{{ $job->job_description }}</p>
    <p>{{ $job->skill_id }}</p>
    <p>{{ $job->job_code }}</p>
    <p>{{ $job->category_id }}</p>
    <p>{{ $job->min_salary }}</p>
    <p>{{ $job->max_salary }}</p>
    <p>{{ $job->work_location }}</p>
    <p>{{ $job->job_type }}</p>
    <p>{{ $job->experiences }}</p>
    <p>{{ $job->expiration }}</p>
    <p>{{ $job->position_id }}</p>
    <p>{{ $job->gender }}</p>
    <p>{{ $job->quantity }}</p>
    <p>{{ $job->status }}</p>
    <p>{{ $job->is_hot }}</p>
    <p>{{ $job->is_suggest }}</p>
    <p>{{ $job->view }}</p>
    <p>{{ $job->reference_ids }}</p>
@endsection