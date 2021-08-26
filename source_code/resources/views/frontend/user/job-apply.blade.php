@extends('frontend.layout')
@section('title')
    Job application list
@endsection
@section('content')
    <section class="featured-job-area feature-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <h2>Job application list</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <!-- single-job-content -->
                    @foreach($job as $key=>$val)
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="{{route('detail', $val->id)}}"><img src="{{ asset('storage/images/' .$val->company->logo) }}" alt="" style="max-width: 84px;"></a>
                            </div>
                            <div class="job-tittle">
                                <a href="{{route('detail', $val->id)}}"><h4>{{$val->job_title}}</h4></a>
                                <ul>
{{--                                    <li>Creative Agency</li>--}}
                                    <li>Skill:
                                        @foreach(explode(',',$val->skill_id) as $skill_id)
                                            {{ $skills->find($skill_id)->skill }}
                                            @if($loop->index == 1)
                                                @break
                                            @endif
                                        @endforeach
                                    </li>
{{--                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>--}}
{{--                                    <li>$3500 - $4000</li>--}}
                                    @if($val->company->city)
                                        <li><i class="fas fa-map-marker-alt"></i>{{  $val->company->city->city_name }}</li>
                                    @endif
                                    @if(session()->has('user'))
                                        <li>${{ number_format($val->min_salary) }} - ${{ number_format($val->max_salary) }}</li>
                                    @else
                                        <li><a href="{{ route('login') }}" style="color: #635c5c">Salary: đăng nhập để xem mức lương</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="items-link f-right">
                            @if($val->job_type == 1)
                                <a href="">Full Time</a>
                            @else
                                <a href="">Part Time</a>
                            @endif
                            @if(ceil((time() - strtotime($val->created_at))/3600) < 24)
                                <span>{{ ceil((time() - strtotime($val->created_at))/3600)}} hour ago</span>
                            @else
                                <span>{{ ceil((time() - strtotime($val->created_at))/86400)}} day ago</span>
                            @endif
                        </div>
                    </div>
                @endforeach
                    <!-- single-job-content -->

                </div>
            </div>
        </div>
    </section>
@endsection
