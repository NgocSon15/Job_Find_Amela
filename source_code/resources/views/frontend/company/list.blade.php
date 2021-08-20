@extends('frontend.layout')
@section('title')
    Danh sách công ty
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
                                <h2>Company List</h2>
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
                        <form method="post" action="{{ route('frontend.company.filter') }}">
                            @csrf
                            <div class="job-category-listing mb-50">
                                <!-- single one -->
                                <div class="single-listing">
                                    <div class="small-section-tittle2">
                                        <h4>Company Field</h4>
                                    </div>
                                    <!-- Select job items start -->
                                    <div class="select-job-items2">
                                        <select name="field_id">
                                            <option value="">All Field</option>
                                            @foreach($fields as $field)
                                                <option value="{{ $field->field_id }}">{{ $field->field_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="select-Categories pt-80">
                                        <div class="small-section-tittle2">
                                            <h4>City</h4>
                                        </div>
                                        <div class="select-job-items2">
                                            <select name="city_id">
                                                <option value="">All City</option>
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->city_id }}">{{ $city->city_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!--  Select job items End-->
                                </div>
                                <!-- single two -->
                                <div class="single-listing">
                                    <!-- select-Categories start -->
                                    <div class="select-Categories">
                                        <div class="small-section-tittle2 pt-80">
                                            <h4>Company Size</h4>
                                        </div>
                                        <div class="select-job-items2">
                                            <select name="size_id">
                                                <option value="">All Size</option>
                                                @foreach($sizes as $size)
                                                    <option value="{{ $size->size_id }}">{{ $size->size }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- select-Categories End -->
                                </div>
                                <div class="apply-btn2 pt-80">
                                    <button type="submit" class="btn">Find</button>
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
                                            <span>{{ $total_companies }} Company Found</span>
                                            <!-- Select job items start -->
                                            <div class="select-job-items">
                                                <span>Sort by</span>
                                                <select name="select">
                                                    <option value="">None</option>
                                                    <option value="">Most Jobs</option>
                                                    <option value="">Most Hiring</option>
                                                    <option value="">Suggest</option>
                                                </select>
                                            </div>
                                            <!--  Select job items End-->
                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
                            @foreach($companies as $company)
                                <!-- single-job-content -->
                                    <div class="single-job-items mb-30">
                                        <div class="job-items d-flex">
                                            <div class="company-img">
                                                <a href="{{ route('frontend.company.show', $company->id) }}"><img src="{{ asset('storage/images/' . $company->logo) }}" alt="" style="max-height: 85px; max-width: 85px;"></a>
                                            </div>
                                            <div class="job-tittle job-tittle2">
                                                <a href="{{ route('frontend.company.show', $company->id) }}">
                                                    <h4>{{ $company->fullname }}</h4>
                                                </a>
                                                <ul class="d-flex">
                                                    @if( isset($company->field) )
                                                        <li>{{ $company->field->field_name }}</li>
                                                    @endif
                                                    @if( isset($company->city))
                                                        <li><i class="fas fa-map-marker-alt"></i>{{ $company->city->city_name }}</li>
                                                    @endif
                                                    <li>{{ $company->total_jobs }} jobs</li>
                                                </ul>
                                                @if($company->is_suggest)
                                                    <p class="text-danger">Khuyến khích làm việc ở đây</p>
                                                @endif
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
                                    {{ $companies->appends(request()->query()) }}
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



