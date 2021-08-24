@extends('frontend.layout')
@section('title')
    Detail Exp
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">


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


                                <form class="row g-3 needs-validation" novalidate action="{{route('frontend.updateExp', $exp->exp_id)}}" method="post">
                                    @csrf
                                    <div class="col-md-6 position-relative">
                                        <label for="validationTooltip01" class="form-label">Chức Danh *</label>
                                        <input type="text" class="form-control" id="validationTooltip01" value="{{$exp->position}}" name="title">
                                        @if($errors->has('title'))
                                            <p class="text-danger">{{ $errors->first('title') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-md-6 position-relative">
                                        <label for="validationTooltip02" class="form-label">Công Ty *</label>
                                        <input type="text" class="form-control" id="validationTooltip02" value="{{$exp->company}}" name="company">
                                        @if($errors->has('company'))
                                            <p class="text-danger">{{ $errors->first('company') }}</p>
                                        @endif

                                    </div>
                                    <div class="col-md-6 position-relative">
                                        <label for="validationTooltip03" class="form-label">Từ</label>
                                        <input type="date" class="form-control" id="validationTooltip03" name="from" value="{{$exp->since}}">
                                    </div>
                                    <div class="col-md-6 position-relative">
                                        <label for="validationTooltip03" class="form-label">Đến</label>
                                        <input type="date" class="form-control" id="validationTooltip03" name="to" value="{{$exp->to_date}}">
                                    </div>
                                    <div class="col-12">
                                        <label for="exampleFormControlTextarea1" class="form-label">Mô tả </label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content_a">{{$exp->content}}</textarea>
                                    </div>
                                    <div class="col-12 pt-50">
                                        <button class="btn" type="submit" style="float: right">Update</button>
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
