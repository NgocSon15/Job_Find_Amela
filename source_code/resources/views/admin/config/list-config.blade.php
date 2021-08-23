@extends('admin.layout')
@section('title')
    Thông tin website
@endsection
@section('active3', 'active')
@section('content-name', 'Cấu hình trang web')
@section('content')
<div class="col-12">
    @if (Session::has('success'))
    <p class="text-success">
        <i class="fa fa-check" aria-hidden="true"></i>
        {{ Session::get('success') }}
    </p>
    @endif
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="width: 10px">ID</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Nội dung</th>
                </tr>
            </thead>
            <tbody>
                @foreach($configs as $key => $config)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$config->name}}</td>
                    <td>{{$config->description}}</td>
                    <td>
                        <p contenteditable="true" class="config" data-id = "{{$config->config_id}}">{{$config->content}}</p>
                        <p class="text-danger"></p>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        var content = document.querySelectorAll('.config');
        for(var i = 0; i < content.length; i++){
            content[i].style = "cursor: pointer"
            content[i].onblur = function (){
                var id = this.getAttribute('data-id');
                var data = this.innerHTML;
                $.ajax({
                    method: 'get',
                    url: "{{route('admin.config.update')}}",
                    data:{
                        'id': id,
                        'content': data
                    }
                }).fail(function(data){
                    if(content[id-1].parentElement.querySelector('.text-danger')){
                        content[id-1].parentElement.querySelector('.text-danger').remove()
                    }
                    p = document.createElement("p");
                    p.classList.add('text-danger');
                    p.innerHTML = data.responseJSON.errors.content[0];
                    content[id-1].parentElement.appendChild(p);
                })
            }
        }
    </script>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
        </ul>
    </div>
</div>

@endsection