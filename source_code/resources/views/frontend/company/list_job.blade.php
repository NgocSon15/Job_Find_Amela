@extends('frontend.layout')
@section('title')
    Danh sách tin tuyển dụng
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
                                <h2>{{ $company->fullname }}</h2>
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
                <div>
                    <!-- Right content -->
                    <div>
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                                <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35">
                                            {{ $jobs->total() }} jobs found
                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
                                <!-- single-job-content -->
                                @foreach($jobs as $key => $val)
                                    <div class="single-job-items mb-30">
                                        <div class="d-flex" style="width: 100%">
                                            <div class="job-items" style="width: 100%">
                                                <div class="company-img">
                                                    <a href="{{route('detail', $val->id)}}"><img src="{{asset('storage/images/'.$val->company->logo)}}" alt="" style="max-width: 85px;"></a>

                                                </div>
                                                <div class="job-tittle job-tittle2">
                                                    <a href="{{route('detail', $val->id)}}">
                                                        <h4>{{$val->job_title}}</h4>
                                                    </a>
                                                    <ul>
                                                        <li>Skill: 
                                                            @foreach(explode(',',substr($val->skill_id, 0,3)) as $skill_id)
                                                                {{ $skills->find($skill_id)->skill }}
                                                            @endforeach
                                                        </li>
                                                        <li><i class="fas fa-map-marker-alt"></i>{{$val->work_location}}</li>
                                                        <li>${{$val->min_salary}} - ${{$val->max_salary}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="items-link items-link2 f-right" style="padding: 0">
                                                <a href="{{route('detail', $val->id)}}">Apply</a>
                                                <span>{{$val->created_at->diffForHumans($now)}}</span>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="{{ route('frontend.job.edit', $val->id) }}" class="btn head-btn2 medium genric-btn circle">Edit</a>
                                            <a href="{{ route('frontend.job.destroy', $val->id) }}" class="btn head-btn2 medium genric-btn circle">Delete</a>
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
