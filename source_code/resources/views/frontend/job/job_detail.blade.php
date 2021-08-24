@extends('frontend.layout')
@section('title')
    Trang chi tiết tin tuyển dụng
@endsection
@section('content')
    <main>

        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ asset('jobfinderportal-master/assets/img/hero/about.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>UI/UX Designer</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- job post company Start -->
        <div class="job-post-company pt-70">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->
                        <div class="single-job-items mb-50">
                            <div class="job-items">
                                <div class="company-img company-img-details">
                                    <a href="#"><img src="{{asset('storage/images/'.$job->company->logo)}}" alt="" style="max-width: 85px;"></a>

                                </div>
                                <div class="job-tittle">
                                    <a href="#">
                                        <h4>{{$job->job_title}}</h4>
                                    </a>
                                    <ul>
                                        <li>Skill: 
                                                @foreach(explode(',',substr($job->skill_id, 0,3)) as $skill_id)
                                                    {{ $skills->find($skill_id)->skill }}
                                                @endforeach
                                        </li>
                                        <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                        @if(session()->has('user'))
                                        <li>${{number_format($job->min_salary)}} - ${{number_format($job->max_salary)}}</li>
                                        @else
                                        <li><a href="{{ route('login') }}" style="color: #635c5c">Salary: đăng nhập để xem</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- job single End -->

                        <div class="job-post-details">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Job Description</h4>
                                </div>
                                <?php echo $job->job_description;?>
                            </div>
                        </div>

                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Job Overview</h4>
                            </div>
                            <ul>
                                <li>Posted date : <span>12 Aug 2019</span></li>
                                <li>Location : <span>{{$job->work_location}}</span></li>
                                <li>Vacancy : <span>{{$job->quantity}}</span></li>
                                @if($job->job_type == 1)
                                    <li>Job nature : <span>Full time</span></li>
                                @elseif($job->job_type == 0)
                                    <li>Job nature : <span>Part time</span></li>
                                @endif

                                <li>Salary :  
                                    @if(session()->has('user'))
                                    <span> ${{number_format($job->min_salary)}} - ${{number_format($job->max_salary)}}</span>
                                    @else
                                    <span> <a href="{{ route('login') }}" style="color: #635c5c"> Đăng nhập để xem </a></span>
                                    @endif
                                </li>
                                <li>Application date : <span>{{$job->expiration}}</span></li>
                            </ul>
                            <div class="apply-btn2">
                                <a href="#" class="btn">Apply Now</a>
                            </div>
                        </div>
                        <div class="post-details4  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Company Information</h4>
                            </div>
                            <span>{{$job->company->fullname}}</span>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            <ul>
                                <li>Web : <span> {{$job->company->website}}</span></li>
                                <li>Email: <span>{{$job->company->email}}</span></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <section class="featured-job-area feature-padding">
{{--                    <div class="container">--}}
                        <!-- Section Tittle -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-tittle text-center">
                                    <h2>Đề Xuất Cho Bạn</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-xl-10">
                                <!-- single-job-content -->
                                @foreach($job_recommend as $key=>$job)
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="{{route('detail', $job->id)}}"><img src="{{asset('storage/images/'.$job->company->logo)}}" alt="" style="max-width: 85px;"></a>
                                        </div>
                                        <div class="job-tittle">
                                            <a href="{{route('detail', $job->id)}}"><h4>{{$job->job_title}}</h4></a>
                                            <ul>
                                                <li>Skill: 
                                                    @foreach(explode(',',$job->skill_id) as $skill_id)
                                                        {{ $skills->find($skill_id)->skill }}
                                                        @if($loop->index == 1)
                                                        @break
                                                        @endif
                                                    @endforeach
                                                </li>
                                                <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                                @if(session()->has('user'))
                                                    <li>${{ number_format($job->min_salary) }} - ${{ number_format($job->max_salary) }}</li>
                                                @else
                                                    <li><a href="{{ route('login') }}" style="color: #635c5c">Salary: đăng nhập để xem</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="items-link f-right">
                                            <a href="{{route('detail', $job->id)}}">Apply</a>
                                            @if(ceil((time() - strtotime($job->created_at))/3600) < 24)
                                                <span>{{ ceil((time() - strtotime($job->created_at))/3600)}} hour ago</span>
                                            @else
                                                <span>{{ ceil((time() - strtotime($job->created_at))/86400)}} day ago</span>
                                            @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
{{--                    </div>--}}
                </section>
{{--            </div>--}}

        </div>
        <!-- job post company End -->


    </main>

@endsection
