@extends('frontend.layout')
@section('title')
    Trang danh sách tin tuyển dụng
@endsection
@section('content')
    <section class="featured-job-area feature-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <!-- <span>Recent Job</span> -->
                        <h2>List Job</h2>
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
                                <a href="{{route('detail', $job->id)}}">Apply</a>
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
                                <span style="text-align: center;">{{$job->created_at->diffForHumans($now)}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
