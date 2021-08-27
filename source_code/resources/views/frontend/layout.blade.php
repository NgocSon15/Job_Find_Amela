<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="manifest.json">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('jobfinderportal-master/assets/img/favicon.ico') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('jobfinderportal-master/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('jobfinderportal-master/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('jobfinderportal-master/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('jobfinderportal-master/assets/css/price_rangs.css') }}">
    <link rel="stylesheet" href="{{ asset('jobfinderportal-master/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('jobfinderportal-master/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('jobfinderportal-master/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('jobfinderportal-master/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('jobfinderportal-master/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('jobfinderportal-master/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('jobfinderportal-master/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('jobfinderportal-master/assets/css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('jobfinderportal-master/assets/css/style.css') }}">
    @yield('link')
    <style>
        #display_none {
            display: none;
        }

    </style>
</head>

<body>
    @section('preloader')
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('jobfinderportal-master/assets/img/logo/logo.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    @show
    @section('header')
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparrent">
            <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="{{ route('frontend.home') }}"><img src="{{ asset('jobfinderportal-master/assets/img/logo/logo.png') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="{{ route('frontend.home') }}">Home</a></li>
                                            <li><a href="{{ route('job_list') }}">Find a Jobs </a></li>
                                            @if(session()->has('user'))
                                                @if(session()->get('user')->role != 'customer')
                                                    <li><a href="{{ route('frontend.job.create') }}">Add New Job</a></li>
                                                    <li><a href="{{ route('list.candidates') }}">Candidates</a></li>
                                                @endif
                                                @if(session()->get('user')->role == 'admin')
                                                    <li><a href="{{route('admin.home')}}">Admin</a></li>
                                                @endif
                                            @else
                                                <li><a href="{{ route('login') }}">Add New Job</a></li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                @if(session()->has('user'))
                                <div class="header-btn d-none f-right d-lg-block">
                                    <ul class="user-menu">
                                        <li class="dropdown pull-right">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #635c5c">
                                                <i class="far fa-user"></i>
                                                {{session()->get('user')->fullname}} <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="{{route('frontend.user-profile')}}">
                                                        <i class="far fa-user"></i>
                                                        User profile</a></li>
                                                @if(session()->get('user')->role == 'customer')
                                                <li><a href="{{route('frontend.listJobApply')}}">
                                                        <i class="fas fa-list-ul"></i>
                                                        Job application</a></li>
                                                <li><a href="{{route('customer.list.followed')}}">
                                                        <i class="far fa-list-alt"></i>
                                                        Jobs Followed</a></li>
                                                <li><a href="{{route('customer.list.block')}}">
                                                        <i class="far fa-list-alt"></i>
                                                        Blocks List</a></li>
                                                @endif
                                                <li><a href="{{route('logout')}}">
                                                        <i class="fas fa-sign-out-alt"></i>
                                                        Đăng xuất</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                @else
                                <div class="header-btn d-none f-right d-lg-block">
                                    <a href="{{route('register-customer')}}" class="btn head-btn2 medium genric-btn circle">Register</a>
                                    <a href="{{route('register-company')}}" class="btn head-btn2 medium genric-btn circle">Company</a>
                                    <a href="{{route('login')}}" class="btn head-btn2 medium genric-btn circle">Login</a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    @show
    @yield('content')
    @section('footer')
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-bg footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <div class="footer-tittle">
                                    <h4>About Us</h4>
                                    <div class="footer-pera">
                                        <p>Heaven frucvitful doesn't cover lesser dvsays appear creeping seasons so behold.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Hot categories</h4>
                                <ul>
                                    @foreach($hotCategories as $category)
                                    <li><a href="{{route('frontend.search', ['category_id' => $category->cat_id])}}">{{$category->cat_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Hot Fields</h4>
                                <ul>
                                    @foreach($hotFields as $field)
                                    <li>{{$field->field_name}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Newsletter</h4>
                                <div class="footer-pera footer-pera2">
                                    <p>Heaven fruitful doesn't over lesser in days. Appear creeping.</p>
                                </div>
                                <!-- Form -->
                                <div class="footer-form">
                                    <div id="mc_embed_signup">
                                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part">
                                            <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address" class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = ' Email Address '">
                                            <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm"><img src="{{ asset('jobfinderportal-master/assets/img/icon/form.png') }}" alt=""></button>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                    <div id="mc_embed_signup">
                                        <h3 style="color: #fff; font-size: 20px; text-transform: uppercase">App mobile</h3>
                                        <div class="app-img">
                                            <div class="playstore">
                                                <a href="{{$appAndroid}}" data-target="#playstore" data-toggle="modal">
                                                    <img src="{{ asset('jobfinderportal-master/assets/img/playstore.png')}}" width="50%" alt="">
                                                </a>
                                                <div class="modal fade" tabindex="-1" id = "playstore">
                                                    <div class="modal-dialog " style="margin: 250px auto;">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <p>Chức năng đang hoàn thiện</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="appstore">
                                                <a href="{{$appIos}}" data-target="#appstore" data-toggle="modal">
                                                    <img src="{{ asset('jobfinderportal-master/assets/img/appstore.png')}}" width="50%" alt="">
                                                </a>
                                                <div class="modal fade" tabindex="-1" id = "appstore">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="margin: 250px auto;">
                                                            <div class="modal-body">
                                                                <p>Chức năng đang hoàn thiện</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="row footer-wejed justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <!-- logo -->
                        <div class="footer-logo mb-20">
                            <a href="index.html"><img src="{{ asset('jobfinderportal-master/assets/img/logo/logo2_footer.png') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-tittle-bottom">
                            <span>5000+</span>
                            <p>Talented Hunter</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-tittle-bottom">
                            <span>451</span>
                            <p>Talented Hunter</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <!-- Footer Bottom Tittle -->
                        <div class="footer-tittle-bottom">
                            <span>568</span>
                            <p>Talented Hunter</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-10 col-lg-10 ">
                            <div class="footer-copy-right">
                                <p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2">
                            <div class="footer-social f-right">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    @show
    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ asset('jobfinderportal-master/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('jobfinderportal-master/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('jobfinderportal-master/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('jobfinderportal-master/assets/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('jobfinderportal-master/assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('jobfinderportal-master/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('jobfinderportal-master/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('jobfinderportal-master/assets/js/price_rangs.js') }}"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('jobfinderportal-master/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('jobfinderportal-master/assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('jobfinderportal-master/assets/js/jquery.magnific-popup.js') }}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('jobfinderportal-master/assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('jobfinderportal-master/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('jobfinderportal-master/assets/js/jquery.sticky.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('jobfinderportal-master/assets/js/contact.js') }}"></script>
    <script src="{{ asset('jobfinderportal-master/assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('jobfinderportal-master/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('jobfinderportal-master/assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('jobfinderportal-master/assets/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('jobfinderportal-master/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('jobfinderportal-master/assets/js/main.js') }}"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

    <script>
        var follow = document.querySelectorAll('.follow_job');
        if(follow){
            for(var i = 0; i < follow.length; i++){
                follow[i].onclick = function () {
                  var active =  this.classList.toggle('active');
                  var job_id = this.getAttribute('data-id');
                  if(active){
                      $.ajax({
                          url: "{{ route('customer.follow.job') }}?id="+job_id,
                      })
                  }else{
                      $.ajax({
                          url: "{{ route('customer.unFollow.job') }}?id="+job_id,
                      })
                      }
                }
            }
        }
    </script>
    @yield('script')

</body>

</html>
