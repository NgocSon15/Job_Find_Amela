@extends('admin.layout')

@section('title', 'Add new job')
@section('content-name', 'Thêm mới tin tuyển dụng')
@section('content')
    <form method="post" action="{{ route('admin.job.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="d-flex">
            <div class="col-lg-6" style="padding-right: 40px;">
                <div class="form-group">
                    <label for="job_title">Tiêu đề:</label>
                    <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Nhập tiêu đề công việc" value="{{ old('job_title') }}">
                    @if($errors->has('job_title'))
                        @foreach($errors->get('job_title') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="company_id">Công ty:</label>
                    <select class="form-control" name="company_id" id="company_id">
                        <option value="" selected disabled hidden>-- Chọn công ty --</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}"
                            @if(old('company_id') == $company->id)
                                {{ 'selected' }}
                                @endif
                            >
                                {{ $company->fullname }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('company_id'))
                        @foreach($errors->get('company_id') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="category_id">Chuyên ngành:</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="" selected disabled hidden>-- Chọn chuyên ngành --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->cat_id }}"
                            @if(old('category_id') == $category->cat_id)
                                {{ 'selected' }}
                                @endif
                            >
                                {{ $category->cat_name }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('category_id'))
                        @foreach($errors->get('category_id') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="min_salary">Lương tối thiểu:</label>
                    <input type="number" class="form-control" id="min_salary" name="min_salary" value="{{ old('min_salary') }}">
                    @if($errors->has('min_salary'))
                        @foreach($errors->get('min_salary') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="max_salary">Lương tối đa:</label>
                    <input type="number" class="form-control" id="max_salary" name="max_salary" value="{{ old('max_salary') }}">
                    @if($errors->has('max_salary'))
                        @foreach($errors->get('max_salary') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="work_location">Nơi làm việc:</label>
                    <input type="text" class="form-control" id="work_location" name="work_location" value="{{ old('work_location') }}">
                    @if($errors->has('work_location'))
                        @foreach($errors->get('work_location') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="job_description">Mô tả:</label>
                    <br>
                    <textarea class="form-control" name="job_description">{{ old('job_description') }}</textarea>
                    @if($errors->has('job_description'))
                        @foreach($errors->get('job_description') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="position_id">Vị trí công việc:</label>
                    <select class="form-control" name="position_id" id="position_id">
                        <option value="" selected disabled hidden>-- Chọn vị trí --</option>
                        @foreach($positions as $position)
                            <option value="{{ $position->position_id }}"
                            @if(old('position_id') == $position->position_id)
                                {{ 'selected' }}
                                @endif
                            >
                                {{ $position->position_name }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('position_id'))
                        @foreach($errors->get('position_id') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="skill_id">Kỹ năng:</label>
                    <select class="form-control" name="skill_id" id="skill_id">
                        <option value="" selected disabled hidden>-- Chọn vị trí --</option>
                        @foreach($skills as $skill)
                            <option value="{{ $skill->skill_id }}"
                            @if(old('skill_id') == $skill->skill_id)
                                {{ 'selected' }}
                                @endif
                            >
                                {{ $skill->skill }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('skill_id'))
                        @foreach($errors->get('skill_id') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="experiences">Số năm kinh nghiệm:</label>
                    <input type="number" class="form-control" id="experiences" name="experiences" value="{{ old('experiences') }}">
                    @if($errors->has('experiences'))
                        @foreach($errors->get('experiences') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="job_type">Thời gian làm việc:</label>
                    <select class="form-control" name="job_type" id="job_type">
                        <option value="" selected disabled hidden>-- Chọn vị trí --</option>
                        <option value="0"
                        @if(old('job_type') == 0)
                            {{ 'selected' }}
                            @endif
                        >
                            Parttime
                        </option>
                        <option value="1"
                        @if(old('job_type') == 1)
                            {{ 'selected' }}
                            @endif
                        >
                            Fulltime
                        </option>
                    </select>
                    @if($errors->has('job_type'))
                        @foreach($errors->get('job_type') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="expiration">Ngày hết hạn:</label>
                    <input type="date" class="form-control" id="expiration" name="expiration" value="{{ old('expiration') }}">
                    @if($errors->has('expiration'))
                        @foreach($errors->get('expiration') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="quantity">Số lượng:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}">
                    @if($errors->has('quantity'))
                        @foreach($errors->get('quantity') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="gender">Giới tính:</label>
                    <select class="form-control" name="gender" id="gender">
                        <option value="" selected disabled hidden>-- Chọn giới tính --</option>
                        <option value="0"
                        @if(old('gender') == 0)
                            {{ 'selected' }}
                            @endif
                        >
                            Nam
                        </option>
                        <option value="1"
                        @if(old('gender') == 1)
                            {{ 'selected' }}
                            @endif
                        >
                            Nữ
                        </option>
                        <option value="2"
                        @if(old('gender') == 2)
                            {{ 'selected' }}
                            @endif
                        >
                            Khác
                        </option>
                    </select>
                    @if($errors->has('gender'))
                        @foreach($errors->get('gender') as $message)
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="d-flex col-lg-12">
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
