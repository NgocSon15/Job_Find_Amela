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
                                @if(session()->get('user')->user_id != null)
                                <input type="hidden" name="user_id"  value="{{session()->get('user')->user_id}}">
                            @endif


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
                        $('#applyModal').modal('hide');
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
        <div class="job-post-company pt-70">
            <div class="container">
                <div id="success"></div>
                @if (Session::has('success_apply'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        {{ Session::get('success_apply') }}
                    </p>
                @endif
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-8 col-lg-8">
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
                                        <li>Skill:
                                            @foreach(explode(',',$job->skill_id) as $skill_id)
                                                {{ $skills->find($skill_id)->skill }}
                                                @if($loop->index == 1)
                                                @break
                                                @endif
                                            @endforeach
                                        </li>
                                        <li><i class="fas fa-map-marker-alt"></i>{{ $job->work_location}}</li>
                                        @if(session()->has('user'))
                                        <li>${{number_format($job->min_salary)}} - ${{number_format($job->max_salary)}}</li>
                                        @else
                                        <li><a href="{{ route('login') }}" style="color: #635c5c">Salary: đăng nhập để xem</a></li>
                                        @endif
                                    </ul>
                                    @if(strtotime($job->expiration) < time())
                                        <p class="text-warning">Tin tuyển dụng hết hạn</p>
                                    @endif
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
                                <?php echo $job->job_description;?>
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
                                <li>Posted date : <span>{{ date('Y-m-d',strtotime($job->created_at))}}</span></li>
                                <li>Location: <span style="margin-left: 5px">{{$job->work_location}}</span></li>
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
                                <li>Application date : <span class="text-danger">{{$job->expiration}}</span></li>
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
{{--                <section class="featured-job-area feature-padding">--}}
{{--                    <div class="container">--}}
{{--                        <!-- Section Tittle -->--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-12">--}}
{{--                                <div class="section-tittle text-center">--}}
{{--                                    <h2>Đề Xuất Cho Bạn</h2>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row justify-content-center">--}}
{{--                            <div class="col-xl-10">--}}
{{--                                <!-- single-job-content -->--}}
{{--                                @foreach($job_recommend as $key=>$job)--}}
{{--                                <div class="single-job-items mb-30">--}}
{{--                                    <div class="job-items">--}}
{{--                                        <div class="company-img">--}}
{{--                                            <a href="{{route('detail', $job->id)}}"><img src="{{asset('storage/images/'.$job->company->logo)}}" alt="" style="max-width: 85px;"></a>--}}
{{--                                        </div>--}}
{{--                                        <div class="job-tittle job-tittle2">--}}
{{--                                            <a href="{{route('detail', $job->id)}}"><h4>{{$job->job_title}}</h4></a>--}}
{{--                                            <ul>--}}
{{--                                                <li>Skill:--}}
{{--                                                    @foreach(explode(',',$job->skill_id) as $skill_id)--}}
{{--                                                        {{ $skills->find($skill_id)->skill }}--}}
{{--                                                        @if($loop->index == 1)--}}
{{--                                                        @break--}}
{{--                                                        @endif--}}
{{--                                                    @endforeach--}}
{{--                                                </li>--}}
{{--                                                @if($job->company->city)--}}
{{--                                                    <li><i class="fas fa-map-marker-alt"></i>{{ $job->company->city->city_name}}</li>--}}
{{--                                                @endif--}}
{{--                                                @if(session()->has('user'))--}}
{{--                                                    <li>${{ number_format($job->min_salary) }} - ${{ number_format($job->max_salary) }}</li>--}}
{{--                                                @else--}}
{{--                                                    <li><a href="{{ route('login') }}" style="color: #635c5c">Salary: đăng nhập để xem</a></li>--}}
{{--                                                @endif--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="items-link f-right">--}}
{{--                                            <a href="{{route('detail', $job->id)}}">Apply</a>--}}
{{--                                            @if(ceil((time() - strtotime($job->created_at))/3600) < 24)--}}
{{--                                                <span>{{ ceil((time() - strtotime($job->created_at))/3600)}} hour ago</span>--}}
{{--                                            @else--}}
{{--                                                <span>{{ ceil((time() - strtotime($job->created_at))/86400)}} day ago</span>--}}
{{--                                            @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </section>--}}
{{--            </div>--}}

                <div class="testimonial-area testimonial-padding">
                    <div class="container">
                        <!-- Testimonial contents -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-tittle text-center">
                                    <h2>Đề Xuất Cho Bạn</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="h1-testimonial-active dot-style">
                                    <!-- Single Testimonial -->
                                    @foreach($job_recommend as $key=>$job)
                                        <div class="single-testimonial text-center">
                                        <!-- Testimonial Content -->
                                        <div class="testimonial-caption ">
                                            <!-- founder -->
                                            <div class="testimonial-founder  ">
                                                <div class="founder-img mb-30">
                                                    <img src="{{asset('storage/images/'.$job->company->logo)}}" alt="" style="border-radius: 50%" width="150px" height="150px">
                                                    <span>{{$job->job_title}}</span>
                                                    <p>${{ number_format($job->min_salary) }} - ${{ number_format($job->max_salary) }}</p>
                                                </div>
                                            </div>
                                            <div class="testimonial-top-cap">
{{--                                                <p>{{$job->job_description}}</p>--}}
                                                <p style="font-size: medium">
                                                    Word location:{{$job->work_location}} <br>
                                                    Skill :@foreach(explode(',',$job->skill_id) as $skill_id)
                                                        {{ $skills->find($skill_id)->skill }}
                                                        @if($loop->index == 1)
                                                            @break
                                                        @endif
                                                    @endforeach <br>
                                                    It is a long established fact that a reader will beff distracted by vbthe creadable content of a page when looking at its layout. The pointf of using Lorem Ipsum is that it has ahf mcore or-lgess normal distribution of letters, as opposed to using, Content here content here making it look like readable.
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- Single Testimonial -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>




        </div>

        </div>
        <div class="online-cv cv-bg section-overly pt-90 pb-120"  data-background="assets/img/gallery/cv_bg.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="cv-caption text-center">
                            <p class="pera1">FEATURED TOURS Packages</p>
                            <p class="pera2"> Make a Difference with Your Online Resume!</p>
{{--                            <a href="#" class="border-btn2 border-btn4">Upload your cv</a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="featured-job-area feature-padding">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <h2>Featured Jobs</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-10" >
                        <!-- single-job-content -->
                        @foreach($job_same as $key=>$val)
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="{{route('detail', $val->id)}}"><img src="{{asset('storage/images/'.$val->company->logo)}}" alt="" style="max-width: 85px;"></a>
                                    </div>
                                    <div class="job-tittle">
                                        <a href="{{route('detail', $val->id)}}"><h4>{{$val->job_title}}</h4></a>
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
                                        @if(strtotime($val->expiration) < time())
                                            <p class="text-warning">Tin tuyển dụng hết hạn</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="items-link f-right">
                                    @if($val->job_type)
                                        <a href="{{route('detail', $val->id)}}">Full Time</a>
                                    @else
                                        <a href="{{route('detail', $val->id)}}">Part Time</a>
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
                        <div style="padding-left: 45%">
                        <a href="{{route('frontend.getSameJob', $job->category_id)}}" class="genric-btn primary-border" style="margin: 0 auto;">Xem thêm</a>
                        </div>

                    </div>
                </div>
            </div>
        </section>

{{--        {!! $job_same->links() !!}--}}



    </main>

 

@endsection


