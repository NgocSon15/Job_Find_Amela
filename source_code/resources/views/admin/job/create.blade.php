@extends('admin.layout')

@section('title', 'Add new job')
@section('content-name', 'Thêm mới tin tuyển dụng')
@section('content')
    <form method="post" action="{{ route('admin.job.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="company_id">Mã công ty:</label>
            <input type="text" class="form-control" id="company_id" name="company_id" placeholder="Nhập mã công ty">
            @if($errors->has('company_id'))
                @foreach($errors->get('company_id') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="job_title">Tiêu đề tin:</label>
            <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Nhập tiêu đề tin">
            @if($errors->has('job_title'))
                @foreach($errors->get('job_title') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="job_description">Mô tả:</label>
            <textarea class="form-control" id="job_description" name="job_description"></textarea>
            @if($errors->has('job_description'))
                @foreach($errors->get('job_description') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="skill_id">Mã skill:</label>
            <input type="text" class="form-control" id="skill_id" name="skill_id" placeholder="Nhập mã skill">
            @if($errors->has('skill_id'))
                @foreach($errors->get('skill_id') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="job_code">Mã công việc:</label>
            <input type="text" class="form-control" id="job_code" name="job_code" placeholder="Nhập mã công việc">
            @if($errors->has('job_code'))
                @foreach($errors->get('job_code') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="category_id">Mã category:</label>
            <input type="text" class="form-control" id="category_id" name="category_id" placeholder="Nhập mã category">
            @if($errors->has('category_id'))
                @foreach($errors->get('category_id') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="min_salary">Lương nhỏ nhất:</label>
            <input type="text" class="form-control" id="min_salary" name="min_salary" placeholder="Nhập lương nhỏ nhất">
            @if($errors->has('min_salary'))
                @foreach($errors->get('min_salary') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="max_salary">Lương lớn nhất:</label>
            <input type="text" class="form-control" id="max_salary" name="max_salary" placeholder="Nhập lương lớn nhất">
            @if($errors->has('max_salary'))
                @foreach($errors->get('max_salary') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="work_location">Địa điểm làm việc:</label>
            <input type="text" class="form-control" id="work_location" name="work_location" placeholder="Nhập địa điểm làm việc">
            @if($errors->has('work_location'))
                @foreach($errors->get('work_location') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="job_type">Kỹ năng:</label>
            <input type="text" class="form-control" id="job_type" name="job_type" placeholder="Nhập kỹ năng">
            @if($errors->has('job_type'))
                @foreach($errors->get('job_type') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="experiences">Kinh nghiệm:</label>
            <input type="text" class="form-control" id="experiences" name="experiences" placeholder="Nhập kinh nghiệm">
            @if($errors->has('experiences'))
                @foreach($errors->get('experiences') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="expiration">Ngày hết hạn:</label>
            <input type="date" class="form-control" id="expiration" name="expiration" placeholder="Nhập ngày hết hạn">
            @if($errors->has('expiration'))
                @foreach($errors->get('expiration') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="position_id">Mã vị trí:</label>
            <input type="text" class="form-control" id="position_id" name="position_id" placeholder="Nhập mã vị trí">
            @if($errors->has('position_id'))
                @foreach($errors->get('position_id') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="gender">Giới tính:</label>
            <input type="text" class="form-control" id="gender" name="gender" placeholder="Nhập giới tính">
            @if($errors->has('gender'))
                @foreach($errors->get('gender') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="quantity">Số lượng:</label>
            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Nhập số lượng">
            @if($errors->has('quantity'))
                @foreach($errors->get('quantity') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="status">Trạng thái:</label>
            <input type="text" class="form-control" id="status" name="status" placeholder="Nhập trạng thái">
            @if($errors->has('status'))
                @foreach($errors->get('status') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="is_hot">Tin tức hot:</label>
            <input type="text" class="form-control" id="is_hot" name="is_hot" placeholder="Nhập tin tức hot">
            @if($errors->has('is_hot'))
                @foreach($errors->get('is_hot') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="is_suggest">Được đề xuất:</label>
            <input type="text" class="form-control" id="is_suggest" name="is_suggest" placeholder="Nhập đề xuất">
            @if($errors->has('is_suggest'))
                @foreach($errors->get('is_suggest') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="view">View:</label>
            <input type="text" class="form-control" id="view" name="view" placeholder="Nhập view">
            @if($errors->has('view'))
                @foreach($errors->get('view') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="reference_ids">Reference Ids:</label>
            <input type="text" class="form-control" id="reference_ids" name="reference_ids" placeholder="Nhập reference ids">
            @if($errors->has('reference_ids'))
                @foreach($errors->get('reference_ids') as $message)
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @endforeach
            @endif
        </div>
        <div class="d-flex">
            <input type="submit" class="btn btn-success" value="Thêm mới">
            <a href="{{ route('admin.job.index') }}" class="btn btn-default ml-2">Huỷ</a>
        </div>
    </form>
@endsection
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
<!-- Page specific script -->
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>