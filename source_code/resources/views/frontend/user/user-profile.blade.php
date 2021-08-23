@extends('frontend.layout')
@section('title')
    User profile
@endsection
@section('content')

{{--        <div class="col-md-3 ">--}}
{{--            <div class="list-group ">--}}
{{--                <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>--}}
{{--                <a href="#" class="list-group-item list-group-item-action">User Management</a>--}}
{{--                <a href="#" class="list-group-item list-group-item-action">Used</a>--}}
{{--                <a href="#" class="list-group-item list-group-item-action">Enquiry</a>--}}
{{--                <a href="#" class="list-group-item list-group-item-action">Dealer</a>--}}
{{--                <a href="#" class="list-group-item list-group-item-action">Media</a>--}}
{{--                <a href="#" class="list-group-item list-group-item-action">Post</a>--}}
{{--                <a href="#" class="list-group-item list-group-item-action">Category</a>--}}
{{--                <a href="#" class="list-group-item list-group-item-action">New</a>--}}
{{--                <a href="#" class="list-group-item list-group-item-action">Comments</a>--}}
{{--                <a href="#" class="list-group-item list-group-item-action">Appearance</a>--}}
{{--                <a href="#" class="list-group-item list-group-item-action">Reports</a>--}}
{{--                <a href="#" class="list-group-item list-group-item-action">Settings</a>--}}


{{--            </div>--}}
{{--        </div>--}}
<div class="container">
<div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Your Experience</h4>
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
                            <form action="{{route('frontend.user-profile.update')}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="username" class="col-4 col-form-label">Email*</label>
                                    <div class="col-8">
                                        <input id="username" name="email" placeholder="Username" class="form-control here"  type="text" value="{{session()->get('user')->email}}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="username" class="col-4 col-form-label">User Name*</label>
                                    <div class="col-8">
                                        <input id="username" name="name" placeholder="Username" class="form-control here"  type="text" value="{{session()->get('user')->fullname}}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="username" class="col-4 col-form-label">Phone number*</label>
                                    <div class="col-8">
                                        <input id="username" name="phone" placeholder="Username" class="form-control here"  type="text" value="{{session()->get('user')->customer->phone}}" disabled>
                                    </div>
                                </div>



{{--                                <div class="form-group row">--}}
{{--                                    <label for="select" class="col-4 col-form-label">Experience year</label>--}}
{{--                                    <div class="col-8">--}}
{{--                                        <select id="select" name="exp" class="form-select" aria-label="Default select example">--}}
{{--                                            <option value="0" @if($exp->exp_year == 0)--}}
{{--                                                {{"selected"}}--}}
{{--                                                @endif>No experience</option>--}}
{{--                                            <option value="1" @if($exp->exp_year == 1)--}}
{{--                                                {{"selected"}}--}}
{{--                                                @endif>1 year</option>--}}
{{--                                            <option value="2" @if($exp->exp_year == 2)--}}
{{--                                                {{"selected"}}--}}
{{--                                                @endif>2 year</option>--}}
{{--                                            <option value="3" @if($exp->exp_year >= 3)--}}
{{--                                                {{"selected"}}--}}
{{--                                                @endif>3 year or more</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="form-group row">
                                    <label for="publicinfo" class="col-4 col-form-label">Working Process</label>
                                    <div class="col-8">
                                        <input id="username" name="process" placeholder="Username" class="form-control here"  type="text" value="{{$exp->content}}">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="process">{{$exp->content}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn ">Update My Experience</button>
                                    </div>
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
