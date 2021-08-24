@extends('admin.layout')

@section('title', 'Edit company')
@section('content-name', 'Sửa tin thông tin doanh nghiệp')
@section('content')
    <form method="post" action="{{ route('admin.company.update', $company->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="d-flex">
            <div class="col-lg-6" style="padding-right: 40px;">
                <div class="form-group">
                    <label for="fullname">Tên doanh nghiệp:</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nhập tên doanh nghiệp" value="{{ old('fullname') ?? $company->fullname}}">
                    @if($errors->has('fullname'))
                        @foreach($errors->get('fullname') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="shortname">Tên rút gọn:</label>
                    <input type="text" class="form-control" id="shortname" name="shortname" placeholder="Nhập tên rút gọn" value="{{ old('shortname') ?? $company->shortname}}">
                    @if($errors->has('shortname'))
                        @foreach($errors->get('shortname') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="tax_code">Mã số thuế:</label>
                    <input type="text" class="form-control" id="tax_code" name="tax_code" placeholder="Nhập mã số thuế" value="{{ old('tax_code') ?? $company->tax_code}}">
                    @if($errors->has('tax_code'))
                        @foreach($errors->get('tax_code') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" value="{{ old('email') ?? $company->email}}">
                    @if($errors->has('email'))
                        @foreach($errors->get('email') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="address" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ" value="{{ old('address') ?? $company->address}}">
                    @if($errors->has('address'))
                        @foreach($errors->get('address') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="map">Link map:</label>
                    <input type="map" class="form-control" id="map" name="map" placeholder="Nhập link google map" value="{{ old('map') ?? $company->map}}">
                    @if($errors->has('map'))
                        @foreach($errors->get('map') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="logo">Ảnh:</label>
                    <br>
                    <img src="{{ asset('storage/images/' . $company->logo) }}" id="img_upload" style="max-height: 80px; max-width: 80px; margin-bottom: 10px;">
                    <br>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="logo" name="logo">
                            <label class="custom-file-label" for="logo">{{ $company->logo }}</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                    @if($errors->has('logo'))
                        @foreach($errors->get('logo') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                    <script>
                        var fileSelected = document.getElementById('logo');
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
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="field_id">Chuyên môn:</label>
                    <select class="form-control" name="field_id" id="field_id">
                        <option value="" selected disabled hidden>-- Chọn chuyên môn --</option>
                        @foreach($fields as $field)
                            <option value="{{ $field->field_id }}"
                            @if($company->field_id == $field->field_id)
                                {{ 'selected' }}
                                @endif
                            >
                                {{ $field->field_name }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('field_id'))
                        @foreach($errors->get('field_id') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="city_id">Thành phố:</label>
                    <select class="form-control" name="city_id" id="city_id">
                        <option value="" selected disabled hidden>-- Chọn thành phố --</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->city_id }}"
                            @if($company->city_id == $city->city_id)
                                {{ 'selected' }}
                                @endif
                            >
                                {{ $city->city_name }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('city_id'))
                        @foreach($errors->get('city_id') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="size_id">Quy mô công ty:</label>
                    <select class="form-control" name="size_id" id="size_id">
                        <option value="" selected disabled hidden>-- Chọn quy mô --</option>
                        @foreach($sizes as $size)
                            <option value="{{ $size->size_id }}"
                            @if($company->size_id == $size->size_id)
                                {{ 'selected' }}
                                @endif
                            >
                                {{ $size->size }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('size_id'))
                        @foreach($errors->get('size_id') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="website">Website:</label>
                    <input type="text" class="form-control" id="website" name="website" value="{{ old('website') ?? $company->website }}">
                    @if($errors->has('website'))
                        @foreach($errors->get('website') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="phone">Phone number:</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') ?? $company->phone }}">
                    @if($errors->has('phone'))
                        @foreach($errors->get('phone') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Mô tả:</label>
                    <br>
                    <textarea name="description" id="summernote" class="form-control">{{ old('description') ?? $company->description }}</textarea>

                    @if($errors->has('description'))
                        @foreach($errors->get('description') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="d-flex col-lg-12">
            <input type="submit" class="btn btn-success" value="Cập nhật">
            <a href="{{ route('admin.company.index') }}" class="btn btn-default ml-2">Huỷ</a>
        </div>
    </form>
@endsection
@section('script')
    <!-- bs-custom-file-input -->
    <script src="{{ asset('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection

