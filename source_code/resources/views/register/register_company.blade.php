<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job board HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
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
</head>

<body>
    <!-- Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('jobfinderportal-master/assets/img/logo/logo.png')}}" alt="">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparrent">
            <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('jobfinderportal-master/assets/img/logo/logo.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="job_listing.html">Find a Jobs </a></li>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="#">Page</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-blog.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Elements</a></li>
                                                    <li><a href="job_details.html">job Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                <div class="header-btn d-none f-right d-lg-block">
                                    <a href="#" class="btn head-btn2 medium genric-btn circle">Register</a>
                                    <a href="#" class="btn head-btn2 medium genric-btn circle">Login</a>
                                </div>
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
    <main>
        <div class="register-form" style="margin: 30px 0;">
            <div class="page-wrapper container">
                <div class="wrapper">
                    <div class="card card-5">
                        <div class="card-heading">
                            <h2 class="title">Event Registration Company</h2>
                        </div>
                        <div class="card-body">
                            <form method="POST" class="row" action="{{ route('register-company') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-lg-6">
                                    <div class="form-row" style="display: block;">
                                        <div class="name">Logo <span style="color: #e83e8c">*</span></div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input type="file" name="logo">
                                                @if($errors->has('logo'))
                                                <p class="text-danger">{{ $errors->first('logo') }}</p>
                                                @endif
                                                <img src="{{ asset('jobfinderportal-master/assets/img/camera.png')}}" height="180px" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" style="display: block;">
                                        <div class="name">Email <span style="color: #e83e8c">*</span></div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input class="input--style-5" type="text" name="email" value="{{ old('email')}}">
                                                @if($errors->has('email'))
                                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" style="display: block;">
                                        <div class="name">Company name <span style="color: #e83e8c">*</span></div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input class="input--style-5" type="text" name="fullname" value="{{ old('fullname')}}">
                                                @if($errors->has('company'))
                                                <p class="text-danger">{{ $errors->first('company') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" style="display: block;">
                                        <div class="name">Short name <span style="color: #e83e8c">*</span></div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input class="input--style-5" type="text" name="short_name" value="{{ old('short_name')}}">
                                                @if($errors->has('short_name'))
                                                <p class="text-danger">{{ $errors->first('short_name') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" style="display: block;">
                                        <div class="name">Phone <span style="color: #e83e8c">*</span></div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input class="input--style-5" type="text" name="phone" value="{{ old('phone')}}">
                                                @if($errors->has('phone'))
                                                <p class="text-danger">{{ $errors->first('phone') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" style="display: block;">
                                        <div class="name" style="width: 100%;">Company size</div>
                                        <div class="value">
                                            <div class="input-group">
                                                <div class="rs-select2 js-select-simple select--no-search">
                                                    <select name="size_id">
                                                        <option disabled="disabled" selected="selected">Choose Company size
                                                        </option>
                                                        @foreach($companySizes as $size)
                                                        <option value="{{ $size->size_id }}"> {{ $size->size }} </option>
                                                        @endforeach
                                                    </select>
                                                    <!-- <div class="select-dropdown"></div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" style="display: block;">
                                        <div class="name" style="width: 100%;">Field of operations</div>
                                        <div class="value">
                                            <div class="input-group">
                                                <div class="rs-select2 js-select-simple select--no-search">
                                                    <select name="field">
                                                        <option disabled="disabled" selected="selected">Choose Field of operations
                                                        </option>
                                                        @foreach($fields as $field)
                                                        <option value="{{ $field->field_id }}"> {{ $field->field_name }} </option>
                                                        @endforeach
                                                    </select>
                                                    <!-- <div class="select-dropdown"></div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" style="display: block;">
                                        <div class="name" style="width: 100%;">Address</div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input class="input--style-5" type="text" name="address" value="{{ old('address')}}">
                                                @if($errors->has('address'))
                                                <p class="text-danger">{{ $errors->first('address') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row" style="display: block;">
                                        <div class="name" style="width: 100%;">Link Google Map</div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input class="input--style-5" type="text" name="google_map" value="{{ old('google_map')}}">
                                                @if($errors->has('google_map'))
                                                <p class="text-danger">{{ $errors->first('google_map') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" style="display: block;">
                                        <div class="name" style="width: 100%;">City</div>
                                        <div class="value">
                                            <div class="input-group">
                                                <div class="rs-select2 js-select-simple select--no-search">
                                                    <select name="city_id">
                                                        <option disabled="disabled" selected="selected">Choose city
                                                        </option>
                                                        @foreach($cities as $city)
                                                        <option value="{{ $city->city_id }}"> {{ $city->city_name }} </option>
                                                        @endforeach
                                                    </select>
                                                    <!-- <div class="select-dropdown"></div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" style="display: block;">
                                        <div class="name" style="width: 100%;">Tax code <span style="color: #e83e8c">*</span></div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input class="input--style-5" type="text" name="tax_code" value="{{ old('tax_code')}}">
                                                @if($errors->has('tax_code'))
                                                <p class="text-danger">{{ $errors->first('tax_code') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" style="display: block;">
                                        <div class="name" style="width: 100%;">Website</div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input class="input--style-5" type="text" name="website" value="{{ old('website')}}">
                                                @if($errors->has('website'))
                                                <p class="text-danger">{{ $errors->first('website') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" style="display: block;">
                                        <div class="name" style="width: 100%;">Facebook</div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input class="input--style-5" type="text" name="facebook" value="{{ old('facebook')}}">
                                                @if($errors->has('facebook'))
                                                <p class="text-danger">{{ $errors->first('facebook') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" style="display: block;">
                                        <div class="name" style="width: 100%;">About the company <span style="color: #e83e8c">*</span></div>
                                        <div class="value">
                                            <div class="input-group">
                                                <textarea name="description" style="width: 100%;" class="input--style-5"
                                                    cols="30" rows="5">{{ old('description')}}</textarea>
                                                <!-- <input class="input--style-5" type="text" name="description"> -->
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class = "col-lg-12">
                                    <button class="btn head-btn2 genric-btn circle" type="submit">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
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
                                        <p>Heaven frucvitful doesn't cover lesser dvsays appear creeping seasons so
                                            behold.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Contact Info</h4>
                                <ul>
                                    <li>
                                        <p>Address :Your address goes
                                            here, your demo address.</p>
                                    </li>
                                    <li><a href="#">Phone : +8880 44338899</a></li>
                                    <li><a href="#">Email : info@colorlib.com</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Important Link</h4>
                                <ul>
                                    <li><a href="#"> View Project</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Testimonial</a></li>
                                    <li><a href="#">Proparties</a></li>
                                    <li><a href="#">Support</a></li>
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
                                        <form target="_blank" action=""  method="get" class="subscribe_form relative mail_part">
                                            <input type="email" name="email" id="newsletter-form-email"
                                                placeholder="Email Address" class="placeholder hide-on-focus"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = ' Email Address '">
                                            <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit"
                                                    class="email_icon newsletter-submit button-contactForm"><img
                                                        src="{{ asset('jobfinderportal-master/assets/img/icon/form.png') }}" alt=""></button>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
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
                                    </script> All rights reserved | This template is made with <i class="fa fa-heart"
                                        aria-hidden="true"></i> by <a href="https://colorlib.com"
                                        target="_blank">Colorlib</a>
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


</body>

</html>