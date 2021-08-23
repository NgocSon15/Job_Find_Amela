@extends('frontend.layout')
@section('title')
    Apply Now
@endsection

@section('content')
    <main>
        <div class="register-form" style="margin: 30px 0;">
            <div class="page-wrapper container">
                <div class="wrapper">
                    <div class="card card-5">
                        <div class="card-heading">
                            <h2 class="title">Apply Now</h2>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="">
                                @csrf
                                <div class="form-row">
                                    <div class="name">Full name <span style="color: #e83e8c">*</span></div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="text" name="fullname" placeholder="Full name" value="">

                                                <p class="text-danger"></p>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Email <span style="color: #e83e8c">*</span></div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="email" name="email" placeholder="Email" value="{{ old('email') }}">

                                                <p class="text-danger"></p>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Password <span style="color: #e83e8c">*</span></div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="password" name="password" placeholder="Password">

                                                <p class="text-danger"></p>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Confirm password <span style="color: #e83e8c">*</span></div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="password" name="re_password" placeholder="Confirm password">
                                                <p class="text-danger"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row m-b-55">
                                    <div class="name">Phone</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="text" name="phone" placeholder="Phone" value="">

                                                <p class="text-danger"></p>

                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn head-btn2 genric-btn circle" type="submit">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

