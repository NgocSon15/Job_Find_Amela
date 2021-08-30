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
                        <p contenteditable="true" class="config {{$config->name}}" data-id="{{$config->config_id}}">{{$config->content}}</p>
                        <p class="text-danger"></p>
                    </td>
                </tr>
                @if($loop->index == 1) @break @endif
                @endforeach
                <tr>
                    <td>3</td>
                    <td>{{$configs[2]->name}}</td>
                    <td>
                        <div class="banner" style="margin-top: 10px">
                            <div style="position: relative">
                                <img width="500px" style="max-height:220px" id="img_upload" 
                                src="{{ asset('jobfinderportal-master/assets/img/hero/'.explode('|',$configs[2]->content)[1])}}" alt="">
                                <h1 style="font-size: 29px;position: absolute;top: 10%;left: 28px;font-weight: 700;color: #28395a;padding-right: 62%;">{{ explode('|',$configs[2]->content)[0]}}</h1>
                            </div>
                        </div>
                    </td>
                    <td>
                        <form action="{{route('admin.config.update.banner')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <label>Text:</label>
                                <input class="form-control" name="text" id="bannerText" value="{{ explode('|',$configs[2]->content)[0]}}" />
                            <label >Background:</label>
                            <div>
                                <input style="display: block; margin-bottom: 10px" type="file" name="img" id="background">
                                <p id = "error_validate" class = "text-danger"></p>
                            </div>
                            <button type="submit" id="update-banner" class="btn btn-info btn-sm">Update Banner</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        var content = document.querySelectorAll('.config.footer');
        for (var i = 0; i < content.length; i++) {
            content[i].style = "cursor: pointer";
            content[i].onblur = function() {
                var id = this.getAttribute('data-id');
                var data = this.innerHTML;
                $.ajax({
                    method: 'get',
                    url: "{{route('admin.config.update.footer')}}",
                    data: {
                        'id': id,
                        'content': data
                    }
                }).fail(function(data) {
                    if (content[id - 1].parentElement.querySelector('.text-danger')) {
                        content[id - 1].parentElement.querySelector('.text-danger').remove()
                    }
                    p = document.createElement("p");
                    p.classList.add('text-danger');
                    p.innerHTML = data.responseJSON.errors.content[0];
                    content[id - 1].parentElement.appendChild(p);
                }).done(function() {
                    if (content[id - 1].parentElement.querySelector('.text-danger')) {
                        content[id - 1].parentElement.querySelector('.text-danger').remove()
                    }
                })
            }
        }
        var bannerText = document.querySelector('#bannerText');
        bannerText.onkeyup = function() {
            document.querySelector('.banner h1').innerHTML = this.value;
        }
        var background = document.querySelector('#background');
        var error = document.querySelector('#error_validate');
        background.onchange = function() {
            var img = background.files[0];
            if(img.type.slice(0,5) == 'image'){
                error.innerHTML = '';
                var fileReader = new FileReader();
                fileReader.onload = function() {
                    var url = fileReader.result;
                    document.getElementById('img_upload').src = url;
                }
                fileReader.readAsDataURL(img);
            }else{
                error.innerHTML = 'The file must be an image';
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