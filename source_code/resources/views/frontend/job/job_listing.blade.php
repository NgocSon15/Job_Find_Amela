@extends('frontend.layout')
@section('title')
    Trang danh sách tin tuyển dụng
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
                                <h2>Get your job</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- Job List Area Start -->
        <div class="job-listing-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <!-- Left content -->
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="small-section-tittle2 mb-45">
                                    <div class="ion"> <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="20px" height="12px">
                                            <path fill-rule="evenodd"  fill="rgb(27, 207, 107)"
                                                  d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                                        </svg>
                                    </div>
                                    <h4>Filter Jobs</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Job Category Listing start -->
                        <form action="{{route('filter')}}" method="get">
                            @csrf
                            <div class="job-category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
                                <div class="small-section-tittle2">
                                    <h4>Job Skill</h4>
                                </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <select name="skill">
                                        <option value="">All Skill</option>
                                        @foreach($skills as $key => $val)
                                        <option value="{{$val->skill_id}}">{{$val->skill}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--  Select job items End-->
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-80 pb-40">
                                    <div class="small-section-tittle2">
                                        <h4>Time</h4>
                                    </div>
                                    <div class="select-job-items2">
                                        <select name="time">
                                            <option value="">All time</option>
                                            <option value="1">Full time</option>
                                            <option value="0">Part time</option>
                                        </select>
                                    </div>

                                </div>
                                <!-- select-Categories End -->

                                <div class="select-Categories pt-80 pb-40">
                                    <div class="small-section-tittle2">
                                        <h4>Job Location</h4>
                                    </div>
                                    <div class="select-job-items2">
                                        <select name="location">
                                            <option value="">Anywhere</option>
                                            @foreach($city as $key => $val)
                                                <option value="{{$val->city_id}}">{{$val->city_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="select-Categories pt-80 pb-40">
                                    <div class="small-section-tittle2">
                                        <h4>Salary range</h4>
                                    </div>
                                    <div class="select-job-items2">
                                        <select name="salary">
                                            <option value="">All salary</option>
                                            <option value="0"><1000$</option>
                                            <option value="1000">1000$-2000$</option>
                                            <option value="2000">2000$-3000$</option>
                                            <option value="3000">3000$ +</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <!-- single two -->
                            <div class="single-listing">

                                <!--  Select job items End-->
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-80 pb-40" >
                                    <div class="small-section-tittle2">
                                        <h4>EXP</h4>
                                    </div>
                                    <div class="select-job-items2">
                                        <select name="exp">
                                            <option value="">All exp</option>
                                            <option value="1">1 Y</option>
                                            <option value="2">2 Y</option>
                                            <option value="3">3 Y +</option>
                                        </select>
                                    </div>

                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <!-- single three -->

                                <div class="select-Categories pt-40 pb-40" >
                                    <button type="submit"  class="btn head-btn1" >Chọn</button>

                                </div>
                        </div>

                        </form>
                        <!-- Job Category Listing End -->
                    </div>
                    <!-- Right content -->
                    <div class="col-xl-9 col-lg-9 col-md-8">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                                <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35">
                                            <span>{{ $jobs->total()}} Jobs found</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
                                <!-- single-job-content -->
                                @foreach($jobs as $key => $val)
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="{{route('detail', $val->id)}}"><img src="{{asset('storage/images/'.$val->company->logo)}}" alt="" style="max-width: 85px;"></a>

                                        </div>
                                        <div class="job-tittle job-tittle2">
                                            <a href="{{route('detail', $val->id)}}">
                                                <h4>{{$val->job_title}}</h4>
                                            </a>
                                            <ul>
                                                <li>Skill: 
                                                    {{$skills->find(explode(',',$val->skill_id)[0])->skill}},
                                                    {{$skills->find(explode(',',$val->skill_id)[1])->skill}}
                                                </li>
                                                <li><i class="fas fa-map-marker-alt"></i>{{$val->work_location}}</li>
                                                @if(session()->has('user'))
                                                    <li>${{ number_format($val->min_salary) }} - ${{ number_format($val->max_salary) }}</li>
                                                @else
                                                    <li><a href="{{ route('login') }}" style="color: #635c5c">Salary: đăng nhập để xem</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="items-link items-link2 f-right">
                                        <a href="{{route('detail', $val->id)}}">Apply</a>
                                        <span>{{$val->created_at->diffForHumans($now)}}</span>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </section>
                        <!-- Featured_job_end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Job List Area End -->
        <!--Pagination Start  -->
        <div class="pagination-area pb-115 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    {{ $jobs->appends(request()->query()) }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Pagination End  -->

    </main>
@endsection
