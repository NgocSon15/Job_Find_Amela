@extends('frontend.layout')
@section('title')
    Thông tin công ty
@endsection
@section('content')
    <main>
        <div class="register-form" style="margin: 30px 0;">
            <div class="page-wrapper container">
                <div class="wrapper">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card card-5">
                        <div class="card-heading">
                            <h2 class="title">Cập nhật thông tin công ty</h2>
                        </div>
                        <div class="card-body">
                            <form method="POST" class="row" action="{{ route('frontend.company.update', $company->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $company->id }}" disabled hidden>
                                    <div class="form-row" style="display: block;">
                                        <div class="name">Logo <span style="color: #e83e8c">*</span></div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input type="file" name="logo" id = "upload">
                                                @if($errors->has('logo'))
                                                    <p class="text-danger">{{ $errors->first('logo') }}</p>
                                                @endif
                                                <img src="{{ asset('storage/images/' . $company->logo)}}" id="img_upload" style="max-width: 100%; max-height: 180px">
                                                <script>
                                                    var fileSelected = document.getElementById('upload');
                                                    if(fileSelected){
                                                        fileSelected.onchange = function() {
                                                            var file = fileSelected.files[0];
                                                            var fileReader = new FileReader();
                                                            fileReader.onload = function() {
                                                                var url = fileReader.result;
                                                                document.getElementById('img_upload').src = url;
                                                            }
                                                            fileReader.readAsDataURL(file);
                                                        }
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" style="display: block;">
                                        <div class="name">Email <span style="color: #e83e8c">*</span></div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input class="input--style-5" type="text" name="email" value="{{ $company->email }}">
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
                                                <input class="input--style-5" type="text" name="fullname" value="{{ $company->fullname }}">
                                                @if($errors->has('fullname'))
                                                    <p class="text-danger">{{ $errors->first('fullname') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" style="display: block;">
                                        <div class="name">Short name <span style="color: #e83e8c">*</span></div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input class="input--style-5" type="text" name="shortname" value="{{ $company->shortname }}">
                                                @if($errors->has('shortname'))
                                                    <p class="text-danger">{{ $errors->first('shortname') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" style="display: block;">
                                        <div class="name">Phone <span style="color: #e83e8c">*</span></div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input class="input--style-5" type="text" name="phone" value="{{ $company->phone }}">
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
                                                            <option value="{{ $size->size_id }}"
                                                                @if($company->size)
                                                                    @if($company->size->size_id == $size->size_id)
                                                                        selected
                                                                    @endif
                                                                @endif
                                                            > {{ $size->size }} </option>
                                                        @endforeach
                                                    </select>
                                                    <!-- <div class="select-dropdown"></div> -->
                                                </div>
                                                @if($errors->has('size_id'))
                                                    <p class="text-danger">{{ $errors->first('size_id') }}</p>
                                                @endif
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
                                                            <option value="{{ $field->field_id }}"
                                                                @if($company->field)
                                                                    @if($company->field->field_id == $field->field_id)
                                                                        selected
                                                                    @endif
                                                                @endif
                                                            > {{ $field->field_name }} </option>
                                                        @endforeach
                                                    </select>
                                                    <!-- <div class="select-dropdown"></div> -->
                                                </div>
                                                @if($errors->has('field_id'))
                                                    <p class="text-danger">{{ $errors->first('field_id') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" style="display: block;">
                                        <div class="name" style="width: 100%;">Address</div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input class="input--style-5" type="text" name="address" value="{{ $company->address }}">
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
                                                <input class="input--style-5" type="text" name="map" value="{{ $company->map }}">
                                                @if($errors->has('map'))
                                                    <p class="text-danger">{{ $errors->first('map') }}</p>
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
                                                            <option value="{{ $city->city_id }}"
                                                                @if($company->city)
                                                                    @if($company->city->city_id == $city->city_id)
                                                                        selected
                                                                    @endif
                                                                @endif
                                                            > {{ $city->city_name }} </option>
                                                        @endforeach
                                                    </select>
                                                    <!-- <div class="select-dropdown"></div> -->
                                                </div>
                                                @if($errors->has('city_id'))
                                                    <p class="text-danger">{{ $errors->first('city_id') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" style="display: block;">
                                        <div class="name" style="width: 100%;">Tax code <span style="color: #e83e8c">*</span></div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input class="input--style-5" type="text" name="tax_code" value="{{ $company->tax_code }}">
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
                                                <input class="input--style-5" type="text" name="website" value="{{ $company->website }}">
                                                @if($errors->has('website'))
                                                    <p class="text-danger">{{ $errors->first('website') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" style="display: block;">
                                        <div class="name" style="width: 100%;">About the company <span style="color: #e83e8c">*</span></div>
                                        <div class="value">
                                            <div class="input-group">
                                                <textarea name="description" style="width: 100%;" class="input--style-5" cols="30" rows="5">{{ $company->description }}</textarea>
                                                @if($errors->has('description'))
                                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-lg-12">
                                    <button class="btn head-btn2 genric-btn circle" type="submit">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
