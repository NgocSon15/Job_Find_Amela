@extends('admin.layout')

@section('title', 'Job List')
@section('active1', 'active')
@section('content-name', 'Danh sách tin tuyển dụng')
@section('content')
<div class="col-12">
    @if (Session::has('success'))
    <p class="text-success">
        <i class="fa fa-check" aria-hidden="true"></i>
        {{ Session::get('success') }}
    </p>
    @endif
</div>
<div class="" style="width: 50%">
    <form class="navbar-form navbar-left" action="{{ route('admin.job.search') }}">
        <div class="d-flex">
                <input type="text" class="form-control" placeholder="Search tiêu đề hoặc keyword" name="keyWord">
                <select name="city_id" id="" class="form-control" style="width: 40%">
                    <option value="">City: all</option>
                    @foreach($cities as $city)
                    <option value="{{ $city->city_id}}">{{ $city->city_name}}</option>
                    @endforeach
                </select>
            <button  type="submit" class="btn btn-primary mb-3 ml-1">Search</button>
        </div>
    </form>
</div>
<div class="card">
    <div class="card-body p-0">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Tiêu đề</th>
                    <th>Số lượng</th>
                    <th>Vị trí</th>
                    <th>Kinh nghiệm</th>
                    <th>Hết hạn</th>
                    <th>Tài trợ</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $key => $job)
                <tr>
                    <td>{{ $job->id }}</td>
                    <td>{{ $job->job_title }}</td>
                    <td>{{ $job->quantity}} </td>
                    <td>{{ $job->position->position_name }}</td>
                    @if($job->experiences > 0)
                    <td>{{ $job->experiences }} năm</td>
                    @else
                    <td>Không yêu cầu</td>
                    @endif
                    <td>{{ $job->expiration}} </td>
                    <td class="text-success">Tài trợ</td>
                    <td class="d-flex">
                        <div class="icon__feature">
                            <span class="icon__feature-lock job{{$job->id}}" style="color: #435052;">
                                @if($job->status == 0)
                                <i class="fas fa-lock" onclick="openJob({{$job->id}})" data-id="{{$job->id}}" id="lock-{{$job->id}}" title="locked" style="cursor: pointer; color: #435052;"></i>
                                @else
                                <i class="fas fa-unlock" onclick="lockJob({{$job->id}})" data-id="{{$job->id}}" id="open-{{$job->id}}" title="activated" style="cursor: pointer; color: #4eaf56;"></i>
                                @endif
                            </span>

                            <span class="icon__feature-suggest job{{$job->id}}">
                                @if($job->is_suggest == 0)
                                <i class="fas fa-check-circle" onclick="suggestJob({{$job->id}})" id="suggest-{{$job->id}}" data-id="{{$job->id}}" title="Not suggest" style="cursor: pointer;"></i>
                                @else
                                <i class="fas fa-check-circle" onclick="notSuggestJob({{$job->id}})" id="notSuggest-{{$job->id}}" data-id="{{$job->id}}" title="Suggested" style="cursor: pointer; color: #28a745"></i>
                                @endif
                            </span>

                            <span class="icon__feature-edit">
                                <a href="{{route('admin.job.edit', $job->id)}}">
                                    <i class="far fa-edit" data-id="{{$job->id}}" title="detail" style="cursor: pointer"></i>
                                </a>
                            </span>
                        </div>
                        <!-- <a href="{{ route('admin.job.edit', $job->id) }}" class="btn-sm btn-secondary mr-1">khóa</a>
                        <a href="{{ route('admin.job.delete', $job->id) }}" class="btn-sm btn-s mr-1">đề xuất</a>
                        <a href="{{ route('admin.job.edit', $job->id) }}" class="btn-sm btn-warning">Sửa</a> -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            {{ $jobs->links() }}
        </ul>
    </div>
</div>
<script>
    function openJob(id) {
        $.ajax({
            'url': '{{route("admin.job.active")}}?id='+id,
        }).done(function (){
            document.querySelector('.icon__feature-lock.job' + id).style = 'color: #4eaf56'
            document.querySelector('.icon__feature-lock.job' + id).innerHTML = '<i class="fas fa-unlock" onclick ="lockJob(' + id + ')" data-id="' + id + '" id = "open-' + id + '" title="activated" style="cursor: pointer;color: #4eaf56;"></i>'
        });
    }

    function lockJob(id) {
        $.ajax({
            'url': '{{route("admin.job.lock")}}?id='+id,
        }).done(function (){
            document.querySelector('.icon__feature-lock.job' + id).style = 'color: #435052'
            document.querySelector('.icon__feature-lock.job' + id).innerHTML = '<i class="fas fa-lock" onclick ="openJob(' + id + ')" data-id="' + id + '" id = "lock-' + id + '" title="locked" style="cursor: pointer; color: #435052;"></i>'

        });
    }

    function notSuggestJob(id){
        $.ajax({
            'url': '{{route("admin.job.not_suggest")}}?id='+id,
        }).done(function (){
            document.querySelector('.icon__feature-suggest.job' + id).innerHTML = '<i class="fas fa-check-circle" onclick="suggestJob('+id+')" id="suggest-'+id+'" data-id="'+id+'" title="Not suggest" style="cursor: pointer;"></i>'

        });
    }
    function suggestJob(id){
        $.ajax({
            'url': '{{route("admin.job.suggest")}}?id='+id,
        }).done(function (){
            document.querySelector('.icon__feature-suggest.job' + id).innerHTML = '<i class="fas fa-check-circle" onclick="notSuggestJob('+id+')" id="suggest-'+id+'" data-id="'+id+'" title="Not suggest" style="cursor: pointer;color: #28a745"></i>'

        });
    }
</script>
@endsection