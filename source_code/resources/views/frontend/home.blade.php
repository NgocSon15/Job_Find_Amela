@extends('frontend.layout')
@section('title')
Trang chủ
@endsection
@section('content')
<main>

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center" data-background="{{ asset('jobfinderportal-master/assets/img/hero/'.$bannerImg) }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-9 col-md-10">
                            <div class="hero__caption">
                                <h1>{{ $bannerText }}</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Search Box -->
                    <div class="row">
                        <div class="col-xl-8">
                            <!-- form -->
                            <form action=" {{route('frontend.search')}} " method="get" class="search-box">
                                <div class="input-form">
                                    <input type="text" name="keyWord" placeholder="Job Tittle or keyword">
                                </div>
                                <div class="select-form">
                                    <div class="select-itms">
                                        <select name="city_id" id="select1">
                                            <option value="">City: all</option>
                                            @foreach($cities as $city)
                                            <option value="{{ $city->city_id }}">City: {{ $city->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="select-form">
                                    <div class="select-itms">
                                        <select name="category_id" id="select1">
                                            <option value="1">Category: IT</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->cat_id }}">{{ $category->cat_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="search-form">
                                    <button type="submit">Find job</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!-- Our Services Start -->
    <div class="our-services section-pad-t30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>FEATURED TOURS Packages</span>
                        <h2>Browse Top Categories </h2>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-contnet-center">
                @foreach($categories as $category)
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <a href="{{route('frontend.search', ['category_id' => $category->cat_id])}}">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="{{$category->icon}}"></span>
                            </div>
                            <div class="services-cap">
                                <h5><a href="{{route('frontend.search', ['category_id' => $category->cat_id])}}">{{$category->cat_name}}</a></h5>
                                <span>({{$category->total_jobs}})</span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="row d-flex justify-contnet-center">
            @foreach($cities as $city)
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <a href="{{route('frontend.search', ['city_id' => 1])}}">
                    <div class="single-services text-center mb-30">
                        <div class="services-cap">
                            <h5><a href="{{route('frontend.search', ['city_id' => $city->city_id])}}">{{$city->city_name}}</a></h5>
                            <span>({{$city->total_jobs}})</span>

                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            </div>
            <!-- More Btn -->
            <!-- Section Button -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="browse-btn2 text-center mt-50">
                        <a href="{{ route('frontend.search') }}" class="border-btn2">Browse All Sectors</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services End -->
    <!-- Online CV Area Start -->
    <div class="online-cv cv-bg section-overly pt-50 pb-50"  data-background="{{ asset('jobfinderportal-master/assets/img/gallery/cv_bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="cv-caption text-center">
                        <p class="pera1">FEATURED TOURS Packages</p>
                        <p class="pera2"> Make a Difference with Your Online Resume!</p>
                        <a href="#" class="border-btn2 border-btn4">Upload your cv</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Online CV Area End-->
    <!-- Featured_job_start -->
    <section class="featured-job-area feature-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <!-- <span>Recent Job</span> -->
                        <h2>New Jobs</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                @foreach($jobs as $job)
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="{{route('detail', $job->id)}}"><img src="{{ asset('storage/images/' .$job->company->logo) }}" alt="" style="max-width: 84px;"></a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="{{route('detail', $job->id)}}">
                                            <h4>{{ $job->job_title }}</h4>
                                        </a>
                                        <ul>
                                            <li>Skill:
                                                @foreach(explode(',',$job->skill_id) as $skill_id)
                                                    {{ $skills->find($skill_id)->skill }}
                                                    @if($loop->index == 1)
                                                    @break
                                                    @endif
                                                @endforeach
                                            </li>
                                            @if($job->company->city)
                                                <li><i class="fas fa-map-marker-alt"></i>{{  $job->company->city->city_name }}</li>
                                            @endif
                                            @if(session()->has('user'))
                                            <li>${{ number_format($job->min_salary) }} - ${{ number_format($job->max_salary) }}</li>
                                            @else
                                            <li><a href="{{ route('login') }}" style="color: #635c5c">Salary: đăng nhập để xem mức lương</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <div class="apply-btn2">
{{--                                    <a href="{{route('detail', $job->id)}}">Apply</a>--}}
                                    @if(session()->has('user'))
                                        <a href="" data-toggle="modal" data-target="#applyModal">
                                            Apply Now
                                        </a>
                                    @else

                                        <a href="{{route('login')}}">Đăng nhập để Apply</a>
                                    @endif
                                    </div>
                                    @if(session()->has('user'))
                                            @if(session()->get('user')->role == 'customer')
                                                @if(in_array($job->id,explode(',',session()->get('follow'))))
                                                <span class="follow_job active" data-id="{{ $job->id }}"><i class="fas fa-heart"></i></span>
                                                @else
                                                <span class="follow_job" data-id="{{ $job->id }}"><i class="fas fa-heart"></i></span>
                                                @endif
                                            @endif
                                        @else
                                        <a href="{{route('login')}}" class="follow"><i class="fas fa-heart"></i></a>
                                        @endif
                                    <span class = "text-center">{{$job->created_at->diffForHumans($now)}}</span>
                                </div>
                            </div>
                            @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Featured_job_end -->
    <!-- How  Apply Process Start-->
    <div class="apply-process-area apply-bg pt-70 pb-70" data-background="{{ asset('jobfinderportal-master/assets/img/gallery/how-applybg.png') }}">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle white-text text-center">
                        <span>Apply process</span>
                        <h2> How it works</h2>
                    </div>
                </div>
            </div>
            <!-- Apply Process Caption -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-search"></span>
                        </div>
                        <div class="process-cap">
                            <h5>1. Tìm kiếm công việc</h5>
                            <p>Tìm một công việc phù hợp với bạn.</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-curriculum-vitae"></span>
                        </div>
                        <div class="process-cap">
                            <h5>2. Apply công việc</h5>
                            <p>Apply cho công việc mà bạn thấy phù hợp.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-tour"></span>
                        </div>
                        <div class="process-cap">
                            <h5>3. Nhận việc</h5>
                            <p>Nhận việc làm của bạn khi được tuyển.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="our-services section-pad-t30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>FEATURED TOURS Packages</span>
                        <h2>Browse Top Companies </h2>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-contnet-center">
                @foreach($most_hired_companies as $company)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <img src="{{ asset('storage/images/' . $company->logo) }}" style="height: 80px;">
                            </div>
                            <div class="services-cap">
                                <h5><a href="{{ route('frontend.company.show', $company->id) }}">{{ $company->shortname }}</a></h5>
                                <span>({{ $company->total_jobs }})</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- More Btn -->
            <!-- Section Button -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="browse-btn2 text-center mt-50">
                        <a href="{{ route('frontend.company.index') }}" class="border-btn2">Browse All Companies</a>
                    </div>
                </div>

            </div>
            <!-- More Btn -->
            <!-- Section Button -->
        </div>
    </div>

</main>
@endsection
