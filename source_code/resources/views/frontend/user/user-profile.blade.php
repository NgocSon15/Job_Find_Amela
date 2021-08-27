@extends('frontend.layout')
@section('title')
    User profile
@endsection
@section('link')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
@endsection

@section('content')

<div class="container">

<div class="row">


        <div class="col-md-12 ">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-center">Your Profiles</h2>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @if (Session::has('success_profile'))
                                <p class="text-success">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    {{ Session::get('success_profile') }}
                                </p>
                            @endif


                                <form class="row g-3 needs-validation" novalidate action="{{route('frontend.user-profile.update')}}" method="post" enctype="multipart/form-data">
                                    @csrf


                                    <div class="col-md-6 position-relative">
                                        <label for="validationTooltip01" class="form-label">Họ Và Tên</label>
                                        <input type="text" class="form-control" name="name" id="validationTooltip01" value="{{session()->get('user')->fullname}}" disabled>
                                    </div>
                                    <div class="col-md-6 position-relative">
                                        <label for="validationTooltip02" class="form-label">Ngày Tháng Năm Sinh</label>
                                        <input type="date" class="form-control" name="birth" id="validationTooltip02" value="{{$customer->birth}}" required>
                                        @if($errors->has('birth'))
                                            <p class="text-danger">{{ $errors->first('birth') }}</p>
                                        @endif
                                    </div>

                                    <div class="col-md-6 position-relative">
                                        <label for="validationTooltipUsername" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                            <input type="text" class="form-control" name="email" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" value="{{session()->get('user')->email}}">
                                            @if($errors->has('email'))
                                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 position-relative">
                                        <label for="validationTooltip03" class="form-label">Số điện thoại</label>
                                        <input type="text" class="form-control" name="phone" id="validationTooltip03" value="{{$customer->phone}}">
                                        @if($errors->has('phone'))
                                            <p class="text-danger">{{ $errors->first('phone') }}</p>
                                        @endif
                                    </div>

                                    <div class="col-md-6 position-relative">
                                        <label for="validationTooltip03" class="form-label">Địa Chỉ</label>
                                        <input type="text" class="form-control" name="add" id="validationTooltip03" value="{{$customer->address}}">

                                    </div>
                                    <div class="col-md-3 position-relative">
                                        <label for="validationTooltip04" class="form-label">Giới Tính</label>
                                        <select class="form-select" id="validationTooltip04" name="sex">
                                            <option value="1" @if($customer->sex == 1)
                                                {{"selected"}}
                                                @endif
                                                >Nam</option>
                                            <option value="0" @if($customer->sex == 0)
                                                {{"selected"}}
                                                @endif>Nữ</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 position-relative">
                                        <label for="validationTooltip04" class="form-label">Tình trạng hôn nhân</label>
                                        <select class="form-select" id="validationTooltip04" name="marry">
                                            <option value="0" @if($customer->marry == 0)
                                                {{"selected"}}
                                                @endif>Chưa kết hôn</option>
                                            <option value="1" @if($customer->marry == 1)
                                                {{"selected"}}
                                                @endif>Đã kết hôn</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <label for="input-file-now">Upload Your CV</label>
                                        @if($errors->has('cv'))
                                            <p class="text-danger">{{ $errors->first('cv') }}</p>
                                        @endif
                                        <input type="file" id="input-file-now" class="dropify" data-default-file="" name="cv"/>
                                        @if($customer->cv != null)
                                            <embed src="{{asset('jobfinderportal-master/assets/cv/'.$customer->cv)}}" width="50%" height="300px" />
{{--                                            <iframe src="{{asset('jobfinderportal-master/assets/cv/'.$customer->cv)}}" style="width: 100%;height: 100%;border: none;"></iframe>--}}
                                        @endif
                                    </div>
                                    <div class="col-12 pt-50">
                                        <button class="btn" type="submit">Update</button>
                                    </div>

                                </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-center">Your Experience</h2>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @if (Session::has('success'))
                                <p class="text-success">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    {{ Session::get('success') }}
                                </p>
                            @endif
                            @if(count($exp) == 0)
                                <p class="text-center">Bạn Chưa cập nhật kinh nghiệm của mình</p>
                            @else
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Từ</th>
                                    <th scope="col">Đến</th>
                                    <th scope="col">Công Ty</th>
                                    <th scope="col">Chức Vụ</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($exp as $key=>$val)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <td>{{$val->since}}</td>
                                        <td>{{$val->to_date}}</td>
                                        <td>{{$val->company}}</td>
                                        <td>{{$val->position}}</td>
                                        <td>
                                            <a href="{{route('frontend.getExp', $val->exp_id)}}" class="genric-btn primary-border small" >Chi tiết</a>
                                            <a href="{{route('frontend.deleteExp', $val->exp_id)}}" class="genric-btn primary-border small" onclick="return confirm('Bạn chắc chắn muốn xóa kinh nghiệm')">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @endif


                        </div>
                    </div>
                    <div class="col-12 pt-50">
                        <button class="btn" onclick="myFunction()" >Thêm Kinh nghiệm</button>
                    </div>
                </div>
            </div>
            <div class="card" id="display_none">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-center">Add your Experience</h2>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">


                            <form class="row g-3 needs-validation" novalidate action="{{route('frontend.exp')}}" method="post">
                                @csrf
                                <div class="col-md-6 position-relative">
                                    <label for="validationTooltip01" class="form-label">Chức Danh *</label>
                                    <input type="text" class="form-control" id="validationTooltip01" value="" name="title">
                                    @if($errors->has('title'))
                                        <p class="text-danger">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-6 position-relative">
                                    <label for="validationTooltip02" class="form-label">Công Ty *</label>
                                    <input type="text" class="form-control" id="validationTooltip02" value="" name="company">
                                    @if($errors->has('company'))
                                        <p class="text-danger">{{ $errors->first('company') }}</p>
                                    @endif

                                </div>
                                <div class="col-md-6 position-relative">
                                    <label for="validationTooltip03" class="form-label">Từ</label>
                                    <input type="date" class="form-control" id="validationTooltip03" name="from">
                                </div>
                                <div class="col-md-6 position-relative">
                                    <label for="validationTooltip03" class="form-label">Đến</label>
                                    <input type="date" class="form-control" id="validationTooltip03" name="to">
                                </div>
                                <div class="col-12">
                                    <label for="exampleFormControlTextarea1" class="form-label">Mô tả </label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content_a"></textarea>
                                </div>
                                <div class="col-12 pt-50">
                                    <button class="btn" type="submit">Add</button>
                                </div>

                            </form>


                        </div>
                    </div>

                </div>
            </div>

        </div>


</div>
</div>





@endsection
<script>
    function myFunction() {
        document.getElementById("display_none").style.display = "block";
    }
</script>
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $(document).ready(function (){
            $(".dropify").dropify();
        })
    </script>
@endsection
