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
                                                            @foreach(explode(',',$val->skill_id) as $skill_id)
                                                                {{ $skills->find($skill_id)->skill }}
                                                                @if($loop->index == 1)
                                                                @break
                                                                @endif
                                                            @endforeach
                                                        </li>
                                                        @if($val->company->city)
                                                        <li><i class="fas fa-map-marker-alt"></i>{{ $val->company->city->city_name}}</li>
                                                        @endif
                                                    @if(session()->has('user'))
                                                        <li>${{ number_format($val->min_salary) }} - ${{ number_format($val->max_salary) }}</li>
                                                    @else
                                                        <li><a href="{{ route('login') }}" style="color: #635c5c">Salary: đăng nhập để xem</a></li>
                                                    @endif
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="items-link items-link2 f-right" style="padding: 0">
                                                <a href="{{route('detail', $val->id)}}">Apply</a>
                                                <span>{{$val->created_at->diffForHumans($now)}}</span>
                                            </div>
                                        </div>
                                        <div style="margin-top: 7px;">
                                            <a href="{{ route('frontend.job.edit', $val->id) }}" style="color: #38a4ff;font-weight:600" >Edit</a>
                                            |
                                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa tin này')" href="{{ route('frontend.job.destroy', $val->id) }}" class="text-danger" style="font-weight:600" >Delete</a>
                                            |
                                            <span class="icon__feature-lock job{{$val->id}}">
                                                    @if($val->status == 1)
                                                    <i class="fas fa-unlock" onclick="lockJob({{$val->id}})" data-id="{{$val->id}}" id="open-{{$val->id}}" title="activated" style="cursor: pointer; color: #4eaf56;"></i>
                                                    @elseif($val->status == 2)
                                                    <i class="fas fa-lock" onclick="openJob({{$val->id}})" data-id="{{$val->id}}" id="lock-{{$val->id}}" title="Admin locked" style="cursor: pointer; color: #435052;"></i>
                                                    @else
                                                    <i class="fas fa-lock" onclick="openJob({{$val->id}})" data-id="{{$val->id}}" id="lock-{{$val->id}}" title="locked" style="cursor: pointer; color: #ffc107;"></i>
                                                    @endif
                                                </span>
                                        </div>
                                    </div>
                                @endforeach
                                <script>
                                    function openJob(id) {
                                        $.ajax({
                                            'url': '{{route("admin.company.unlockJob")}}?id='+id,
                                        }).done(function (data){
                                            if(data == 'success'){
                                                document.querySelector('.icon__feature-lock.job' + id).style = 'color: #4eaf56'
                                                document.querySelector('.icon__feature-lock.job' + id).innerHTML = '<i class="fas fa-unlock" onclick ="lockJob(' + id + ')" data-id="' + id + '" id = "open-' + id + '" title="activated" style="cursor: pointer;color: #4eaf56;"></i>'
                                            }else {
                                                alert("admin đã khóa tin này")
                                            }
                                        });
                                    }

                                    function lockJob(id) {
                                        $.ajax({
                                            'url': '{{route("admin.company.lockJob")}}?id='+id,
                                        }).done(function (data){
                                            if(data == 'success'){
                                                document.querySelector('.icon__feature-lock.job' + id).style = 'color: #435052'
                                                document.querySelector('.icon__feature-lock.job' + id).innerHTML = '<i class="fas fa-lock" onclick ="openJob(' + id + ')" data-id="' + id + '" id = "lock-' + id + '" title="locked" style="cursor: pointer; color: #ffc107;"></i>'
                                            }

                                        });
                                    }
                                </script>
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
