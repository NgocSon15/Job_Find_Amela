@extends('frontend.layout')
@section('title')
    Danh sách apply
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
                                <h2>{{ $job->job_title }}</h2>
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
                                <div class="d-flex" style="margin-bottom: 40px;">
                                    <h2 style="margin-left: 145px;">Danh sách Apply</h2>
                                    @if($applies->total() > 0)
                                        <a class="btn" style="position: absolute; right: 350px;" href="{{ route('frontend.job.cv.download.all', $job->id) }}">Download All CV</a>
                                    @endif
                                </div>
                                @if($applies->total() == 0)
                                    <p style="margin-left: 145px;">Hiện tại chưa có ứng viên apply tin này</p>
                                @else
                                    <!-- single-job-content -->
                                    @foreach($applies as $key => $val)
                                        <div class="single-job-items mb-30" style = "width: 850px; margin: 10px auto">
                                            <div class="d-flex" style="width: 100%">
                                                <div class="job-items" style="width: 100%">
                                                    <div class="company-img">
                                                        <a href="{{ route('frontend.apply.show', $val->id) }}"><img src="{{asset('storage/images/default-avt.png')}}" alt="" style="max-width: 85px;"></a>

                                                    </div>
                                                    <div class="job-tittle job-tittle2">
                                                        <a href="{{ route('frontend.apply.show', $val->id) }}">
                                                            <h4>{{$val->user->customer->fullname}}</h4>
                                                        </a>
                                                        <ul>
                                                            <li><i class="fas fa-mobile"></i>{{ $val->user->customer->phone }}</li>
                                                            <li><i class="fas fa-envelope"></i>{{ $val->user->customer->email }}</li>
                                                            <li><i class="fas fa-map-marker-alt"></i>{{ $val->user->customer->address }}</li>
                                                        </ul>
                                                    </div>
                                                    <div class="items-link items-link2 f-right" style="padding: 0">
                                                        <a href="{{ route('frontend.apply.show', $val->id) }}">Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
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
                                    {{ $applies->appends(request()->query()) }}
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
