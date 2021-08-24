@extends('admin.layout')

@section('title', 'Add new company')
@section('active2', 'active')
@section('content-name', 'Thêm doanh nghiệp')
@section('content')
    <form method="post" action="{{ route('admin.company.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="fullname">Tên doanh nghiệp:</label>
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nhập tên doanh nghiệp">
            @if($errors->has('fullname'))
                @foreach($errors->get('fullname') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="tax_code">Mã số thuế:</label>
            <input type="text" class="form-control" id="tax_code" name="tax_code" placeholder="Nhập mã só thuế">
            @if($errors->has('tax_code'))
                @foreach($errors->get('tax_code') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="company_code">Mã doanh nghiệp:</label>
            <input type="text" class="form-control" id="company_code" name="company_code" placeholder="Nhập mã doanh nghiệp">
            @if($errors->has('company_code'))
                @foreach($errors->get('company_code') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email">
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
            <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ">
            @if($errors->has('address'))
                @foreach($errors->get('address') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>

        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea id="summernote" class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            @if($errors->has('description'))
                @foreach($errors->get('description') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại">
            @if($errors->has('phone'))
                @foreach($errors->get('phone') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="d-flex">
            <input type="submit" class="btn btn-success" value="Thêm mới">
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
