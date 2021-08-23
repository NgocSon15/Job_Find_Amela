@extends('frontend.layout')
@section('title')
    Trang chi tiết tin tuyển dụng
@endsection
@section('content')
    <main>

        {{--layout apply--}}
        @if(session()->has('user'))
        <div  id="applyModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content filter-->
                <form action="{{route('frontend.apply')}}" method="post">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="select-by-program">
                                <h3 class="text-center mb-50" >Bạn đang ứng tuyển cho vị trí {{$job->job_title}}  </h3>
                                <h3 class="text-center mb-50" >{{session()->get('user')->fullname}} </h3>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="{{session()->get('user')->email}}">
                                    <div></div>
                                    @if($errors->has('email'))
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="phone number">
                                    <div></div>
                                    @if($errors->has('phone'))
                                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                                    @endif
                                </div>

                                <input type="hidden" name="job_id"  value="{{$job->id}}">
                                <input type="hidden" name="user_id"  value="{{session()->get('user')->user_id}}">


                                <!-- </form> -->
                            </div>
                            <!--End-->

                        </div>
                        <div class="modal-footer">
                            <button id="submitAjax"   type="submit" class="btn" >Apply</button>

                            <button type="button" class="btn" data-dismiss="modal">Hủy</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script>
            window.onload = function(){
            var submit = document.querySelector('#submitAjax');
            submit.onclick = function (event){
                event.preventDefault();
                var email = document.querySelector('input[name=email]');
                var phone = document.querySelector('input[name=phone]');
                var job_id = document.querySelector('input[name=job_id]').value;
                var user_id = document.querySelector('input[name=user_id]').value;
                var token = document.querySelector('input[name=_token]').value;
                $.ajax({
                    url: "{{route('frontend.apply')}}",
                    type: 'POST',
                    data: {
                        'email': email.value,
                        'phone': phone.value,
                        'job_id': job_id,
                        'user_id': user_id,
                        '_token': token
                    }
                }).done(function (){
                        document.querySelector('.modal-backdrop.fade.show')
                        document.querySelector('#applyModal').style = 'display: none';
                        document.querySelector('#success').innerHTML = '<p class="text-success"><i class="fa fa-check" aria-hidden="true"></i>Apply thành công</p>'
                }).fail(function (data){
                    var errors = data.responseJSON.errors;
                    if(errors.email !== undefined){
                        var emailError = errors.email[0];
                        email.nextElementSibling.innerHTML = '<p class="text-danger">'+emailError+'</p>';
                    }
                    if(errors.phone !== undefined){
                        var phoneError = errors.phone[0];
                        phone.nextElementSibling.innerHTML = '<p class="text-danger">'+phoneError+'</p>';
                    }
                })
                
            }
            console.log(submit);
            }
        </script>
        @endif
    {{--hết layout apply--}}

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
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div id="success"></div>
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        {{ Session::get('success') }}
                    </p>
                @endif
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
                                        <li>Creative Agency</li>
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
                                <p>{{$job->job_description}}</p>
                            </div>
                            <div class="post-details2  mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Required Knowledge, Skills, and Abilities</h4>
                                </div>
                                <ul>
                                    <li>System Software Development</li>
                                    <li>{{$job->skill->skill}}</li>
                                    <li>Research and code , libraries, APIs and frameworks</li>
                                    <li>Strong knowledge on software development life cycle</li>
                                    <li>Strong problem solving and debugging skills</li>
                                </ul>
                            </div>
                            <div class="post-details2  mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Education + Experience</h4>
                                </div>
                                <ul>
                                    <li>{{$job->experiences}} or more years of professional design experience</li>
                                    <li>Direct response email experience</li>
                                    <li>Ecommerce website design experience</li>
                                    <li>Familiarity with mobile and web apps preferred</li>
                                    <li>Experience using Invision a plus</li>
                                </ul>
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
                                @if(session()->has('user'))
                                    <a class="btn " href="" data-toggle="modal" data-target="#applyModal">
                                        Apply Now
                                    </a>
                                @else

                                    <a href="{{route('login')}}" class="btn">Đăng nhập để Apply</a>
                                @endif
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
                                                <li>Creative Agency</li>
                                                <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                                <li>${{$job->min_salary}} - ${{$job->max_salary}}</li>
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

        </div>

    </main>

@endsection
