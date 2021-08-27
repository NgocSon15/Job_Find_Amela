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
                            <h2>Candidates</h2>
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
                            <h2 style="margin-left: 145px;">Candidates List</h2>
                            <!-- single-job-content -->
                            @foreach($candidates as $candidate)
                            <div class="single-job-items mb-30" style="width: 850px; margin: 10px auto">
                                <div class="d-flex" style="width: 100%">
                                    <div class="job-items" style="width: 100%">
                                        <div class="company-img" style = "font-size: 40px;margin-right: 20px;background: #e4e1e1;padding: 7px 17px;border-radius: 50%;">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="job-tittle job-tittle2">
                                            <a href="">
                                                <h4>{{$candidate->fullname}}</h4>
                                            </a>
                                            <ul>
                                                <li><i class="fas fa-envelope"></i>{{ $candidate->email }}</li>
                                                <li><i class="fas fa-map-marker-alt"></i>{{ $candidate->address }}</li>
                                            </ul>
                                        </div>
                                        <div class="items-link items-link2 f-right" style="padding: 0">
                                            <a href="">Detail</a>
                                        </div>
                                    </div>
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
                                {{ $candidates->appends(request()->query()) }}
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