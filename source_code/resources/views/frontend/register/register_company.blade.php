@extends('frontend.layout')
@section('title')
Register Company
@endsection

@section('content')
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
                                                <select name="field_id">
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
                                            <textarea name="description" style="width: 100%;" class="input--style-5" cols="30" rows="5">{{ old('description')}}</textarea>
                                            <!-- <input class="input--style-5" type="text" name="description"> -->
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-lg-12">
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