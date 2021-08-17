@extends('frontend.layout')
@section('title')
    Thông tin công ty
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
                                <h2>{{ $company->shortname }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- job post company Start -->
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->
                        <div class="single-job-items mb-50">
                            <div class="job-items">
                                <div class="company-img company-img-details">
                                    <a href="#"><img src="{{ asset('storage/' . $company->logo) }}" alt="" style="max-height: 85px; max-width: 85px;"></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="#">
                                        <h4>{{ $company->fullname }}</h4>
                                    </a>
                                    <ul>
                                        @if( isset($company->field) )
                                            <li>{{ $company->field->field_name }}</li>
                                        @endif
                                        @if( isset($company->city))
                                            <li><i class="fas fa-map-marker-alt"></i>{{ $company->city->city_name }}</li>
                                        @endif
                                        <li>{{ $company->total_jobs }} jobs</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- job single End -->

                        <div class="job-post-details">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Company Description</h4>
                                </div>
                                <p>{{ $company->description }}</p>
                            </div>
                            <div class="post-details4  mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Company Information</h4>
                                </div>
                                <ul>
                                    <li>Name: <span>{{ $company->shortname }}</span></li>
                                    <li>Tax Code: <span>{{ $company->tax_code }}</span></li>
                                    <li>Address : <span>{{ $company->address }}</span></li>
                                    <li>Email: <span>{{ $company->email }}</span></li>
                                    <li>Phone Number: <span>{{ $company->phone }}</span></li>
                                    <li>Website: <span>{{ $company->website }}</span></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Company Overview</h4>
                            </div>
                            <ul>
                                <li>Field : <span>{{ $company->field ? $company->field->field_name : null }}</span></li>
                                <li>City : <span>{{ $company->city ? $company->city->city_name : null }}</span></li>
                                <li>Company Size : <span>{{ $company->companySize ? $company->companySize->size_name :null }}</span></li>
                                <li>Total Jobs : <span>{{ $company->total_jobs }}</span></li>
                                <li>Total Employee Hiring :  <span>{{ $company->total_employees }}</span></li>
                            </ul>
                            <div class="apply-btn2">
                                <a href="#" class="btn">All jobs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- job post company End -->

    </main>
@endsection
