@extends('frontend.layout')
@section('title')
    Sửa tin tuyển dụng
@endsection
@section('link')
    <link rel="stylesheet" href="{{ asset('jobfinderportal-master/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('jobfinderportal-master/assets/css/select-skill.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('content')
    @if(session()->get('user')->company->status == 1)
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ asset('jobfinderportal-master/assets/img/hero/about.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Edit job</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin: 30px 0;">
            <div class="page-wrapper container">
                <div class="wrapper">
                    <form method="POST" class="row" action="{{ route('frontend.job.update', $job->id) }}" enctype="multipart/form-data">
                        @csrf
                        <input value="{{ $job->id }}" name="id" disabled hidden>
                        <input type="text" name="company_id" value="@if(Session::has('user') && Session::get('user')->role == 'company'){{ Session::get('user')->company->id }}@else{{1}}@endif" hidden>
                        <div class="col-lg-6">
                            <div class="form-row" style="display: block;">
                                <div class="name">Job Title <span style="color: #e83e8c">*</span></div>
                                <div class="value">
                                    <div class="input-group">
                                        <input type="text" name="job_title" placeholder="Job Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Job Title'" required="" class="single-input" value="{{ $job->job_title }}">
                                        @if($errors->has('job_title'))
                                            <p class="text-danger">{{ $errors->first('job_title') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" style="display: block;">
                                <div class="name">Category <span style="color: #e83e8c">*</span></div>
                                <div class="value">
                                    <div class="default-select" id="default-select" style="width: 100%">
                                        <select name="category_id" style="display: none;">
                                            <option value="" selected hidden disabled>Choose Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->cat_id }}"
                                                @if($job->category_id == $category->cat_id)
                                                    {{ 'selected' }}
                                                    @endif
                                                >
                                                    {{ $category->cat_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="nice-select" tabindex="0" style="width: 100%">
                                            <span class="current">
                                                @if($job->category_id == null)
                                                    Choose Category
                                                @else
                                                    @foreach($categories as $category)
                                                        @if($job->category_id == $category->cat_id)
                                                            {{ $category->cat_name }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </span>
                                            <ul class="list">
                                                @foreach($categories as $category)
                                                    <li data-value="{{ $category->cat_id }}" class="option">{{ $category->cat_name }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    @if($errors->has('category_id'))
                                        <p class="text-danger">{{ $errors->first('category_id') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row" style="display: block;">
                                <div class="name">Min Salary <span style="color: #e83e8c">*</span></div>
                                <div class="value">
                                    <div class="input-group">
                                        <input type="number" name="min_salary" placeholder="Min Salary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Min Salary'" required="" class="single-input" value="{{ $job->min_salary }}">
                                        @if($errors->has('min_salary'))
                                            <p class="text-danger">{{ $errors->first('min_salary') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" style="display: block;">
                                <div class="name">Max Salary <span style="color: #e83e8c">*</span></div>
                                <div class="value">
                                    <div class="input-group">
                                        <input type="number" name="max_salary" placeholder="Max Salary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Max Salary'" required="" class="single-input" value="{{ $job->max_salary }}">
                                        @if($errors->has('max_salary'))
                                            <p class="text-danger">{{ $errors->first('max_salary') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" style="display: block;">
                                <div class="name">Work Location <span style="color: #e83e8c">*</span></div>
                                <div class="value">
                                    <div class="input-group">
                                        <input type="text" name="work_location" placeholder="Work Location" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Work Location'" required="" class="single-input" value="{{ $job->work_location }}">
                                        @if($errors->has('work_location'))
                                            <p class="text-danger">{{ $errors->first('work_location') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" style="display: block;">
                                <div class="name">Position <span style="color: #e83e8c">*</span></div>
                                <div class="value">
                                    <div class="default-select" id="default-select" style="width: 100%">
                                        <select name="position_id" style="display: none;">
                                            <option value="" selected disabled hidden>Choose Position</option>
                                            @foreach($positions as $position)
                                                <option value="{{ $position->position_id }}"
                                                @if($job->position_id == $position->position_id)
                                                    {{ 'selected' }}
                                                    @endif
                                                >
                                                    {{ $position->position_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="nice-select" tabindex="0" style="width: 100%">
                                            <span class="current">
                                                @if($job->position_id == null)
                                                    Choose Position
                                                @else
                                                    @foreach($positions as $position)
                                                        @if($job->position_id == $position->position_id)
                                                            {{ $position->position_name }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </span>
                                            <ul class="list">
                                                @foreach($positions as $position)
                                                    <li data-value="{{ $position->position_id }}" class="option">{{ $position->position_name }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    @if($errors->has('position_id'))
                                        <p class="text-danger">{{ $errors->first('position_id') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row" style="display: block;">
                                <div class="name">Skill <span style="color: #e83e8c">*</span></div>
                                <div class="value" id="skill">
                                    <select name="skill_id[]" id="skill_id" style="width: 100%;" multiple="multiple">
                                        @foreach($skills as $skill)

                                            <option value="{{$skill->skill_id}}"
                                            @if($job->skill_id)
                                                @if(in_array($skill->skill_id, $job_skills))
                                                    {{'selected'}}
                                                    @endif
                                                @endif
                                            >{{$skill->skill}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('skill_id'))
                                        <p class="text-danger">{{ $errors->first('skill_id') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row" style="display: block;">
                                <div class="name">Year Of Experience <span style="color: #e83e8c">*</span></div>
                                <div class="value">
                                    <div class="input-group">
                                        <input type="text" name="experiences" placeholder="Experience" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Experience'" required="" class="single-input" value="{{ $job->experiences }}">
                                        @if($errors->has('experiences'))
                                            <p class="text-danger">{{ $errors->first('experiences') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" style="display: block;">
                                <div class="name">Job Type <span style="color: #e83e8c">*</span></div>
                                <div class="value">
                                    <div class="default-select" id="default-select" style="width: 100%">
                                        <select name="job_type" style="display: none;">
                                            <option value="" selected disabled hidden>Choose Gender</option>
                                            <option value="1"
                                            @if($job->job_type == 1)
                                                {{ 'selected' }}
                                                @endif
                                            >
                                                Parttime
                                            </option>
                                            <option value="2"
                                            @if($job->job_type == 2)
                                                {{ 'selected' }}
                                                @endif
                                            >
                                                Fulltime
                                            </option>
                                        </select>
                                        <div class="nice-select" tabindex="0" style="width: 100%">
                                            <span class="current">
                                                @if($job->job_type == null)
                                                    Choose Job Type
                                                @else
                                                    @if($job->job_type == 1)
                                                        Parttime
                                                    @else
                                                        Fulltime
                                                    @endif
                                                @endif
                                            </span>
                                            <ul class="list">
                                                <li data-value="1" class="option">Parttime</li>
                                                <li data-value="2" class="option">Fulltime</li>
                                            </ul>
                                        </div>
                                    </div>
                                    @if($errors->has('job_type'))
                                        <p class="text-danger">{{ $errors->first('job_type') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row" style="display: block;">
                                <div class="name">Expire Date <span style="color: #e83e8c">*</span></div>
                                <div class="value">
                                    <div class="input-group">
                                        <input class="single-input" type="date" name="expiration" value="{{ $job->expiration}}">
                                        @if($errors->has('expiration'))
                                            <p class="text-danger">{{ $errors->first('expiration') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" style="display: block;">
                                <div class="name">Description <span style="color: #e83e8c">*</span></div>
                                <div class="value">
                                    <div class="input-group">
                                        <textarea id="job_description" class="single-textarea" placeholder="Description" name="job_description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Description'" required="">{{ $job->job_description }}</textarea>
                                        @if($errors->has('job_description'))
                                            <p class="text-danger">{{ $errors->first('job_description') }}</p>
                                        @endif
                                        <script> window.onload = function() {
                                                $('#skill_id').select2();
                                                $('#job_description').summernote();
                                                var btn = document.querySelectorAll('.note-btn-group button')
                                                for(var i = 0; i < btn.length; i++){
                                                    btn[i].classList.remove('btn');
                                                }

                                            };
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" style="display: block;">
                                <div class="name">Quantity <span style="color: #e83e8c">*</span></div>
                                <div class="value">
                                    <div class="input-group">
                                        <input type="text" name="quantity" placeholder="Quantity" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Quantity'" required="" class="single-input" value="{{ $job->quantity }}">
                                        @if($errors->has('quantity'))
                                            <p class="text-danger">{{ $errors->first('quantity') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" style="display: block;">
                                <div class="name" style="width: 100%;">Gender</div>
                                <div class="value">
                                    <div class="default-select" id="default-select" style="width: 100%">
                                        <select name="gender" style="display: none;">
                                            <option disabled hidden selected></option>
                                            <option value="1"
                                            @if($job->gender == 1)
                                                {{ 'selected' }}
                                                @endif
                                            >Nam</option>
                                            <option value="2"
                                            @if($job->gender == 2)
                                                {{ 'selected' }}
                                                @endif
                                            >Nữ</option>
                                            <option value="3"
                                            @if($job->gender == 3)
                                                {{ 'selected' }}
                                                @endif
                                            >Khác</option>
                                        </select>
                                        <div class="nice-select" tabindex="0" style="width: 100%">
                                            <span class="current">
                                                @if($job->gender == null)
                                                    Choose Gender
                                                @else
                                                    @if($job->gender == 1)
                                                        Nam
                                                    @elseif($job->gender == 2)
                                                        Nữ
                                                    @else
                                                        Khác
                                                    @endif
                                                @endif
                                            </span>
                                            <ul class="list">
                                                <li data-value="1" class="option">Nam</li>
                                                <li data-value="2" class="option">Nữ</li>
                                                <li data-value="3" class="option">Khác</li>
                                            </ul>
                                        </div>
                                    </div>
                                    @if($errors->has('gender'))
                                        <p class="text-danger">{{ $errors->first('gender') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class = "col-lg-12 mt-20">
                            <button class="btn head-btn2 genric-btn circle" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
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
    @endif
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
@endsection
