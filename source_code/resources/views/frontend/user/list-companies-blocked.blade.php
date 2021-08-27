@extends('frontend.layout')
@section('title')
List Companies Blocked
@endsection
@section('content')
<section class="featured-job-area feature-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <!-- <span>Recent Job</span> -->
                    <h2>Blocked</h2>
                </div>
            </div>
        </div>
        <!-- single-job-content -->
        <div  style="width: 900px; margin: 0 auto; position: relative">
            <div id = "form_search" style="width: 50%; margin-bottom: 15px">
                <div class="d-flex" >
                   <input type="text" name="keyword" class="form-control" autocomplete="off" placeholder="Search Company">
                    <button type="submit" class="btn head-btn2 medium genric-btn">Block</button>
                </div>
                <div id="results" style="display:none">
                    <ul>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th style = "width: 300px">Company</th>
                                <th style = "width: 250px">Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($companies->count() !== 0)
                            @foreach($companies as $key => $company)
                            <tr class="company_{{$company->id}}">
                                <td><img src="{{ asset('storage/images/' . $company->logo) }}" style="max-width: 40px; max-height: 40px;"></td>
                                <td>{{ $company->fullname }}</td>
                                <td>{{ $company->email }}</td>
                                <td>
                                    <div data-id = "{{$company->id}}" onclick = "unblock({{$company->id}})">
                                        <span class="genric-btn info medium circle">Unblock</span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr id="empty" class="text-center"><td colspan = 4>Empty</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                
            </div>
        </div>
    </div>
</section>
<script>
    function block(id){
        results.style = 'display:none';
        var table = document.querySelector('table.table tbody');
        $.ajax({
            url: "{{route('customer.block.company')}}?id="+id
        }).done(function (company){
            if(company != 'blocked'){
                var empty = document.querySelector('#empty');
                if(empty){
                    empty.style = 'display: none';
                }
                var item = `<tr class = "company_${company.id}">
                                <td><img src="{{ asset('storage/images/${company.logo}') }}" style="max-width: 40px; max-height: 40px;"></td>
                                <td style="width: 300px">${company.fullname }</td>
                                <td>${company.email }</td>
                                <td>
                                    <div data-id = "${company.id}" onclick = "unblock(${company.id})">
                                    <span class="genric-btn info medium circle">Unblock</span>
                                    </div>
                                </td>
                            </tr>`;
                table.innerHTML += item;
            }
        });
    }
    
    function unblock(id){
        var item = document.querySelector('.company_'+id)
        $.ajax({
            url: "{{ route('customer.unblock.company') }}?id="+id,
            type: "GET"
        }).done(function (){
            item.remove();
            document.querySelector('#empty').style = 'display: table-row';
        })
    }

    window.onload = function (){
        var formSearch = document.querySelector('#form_search')
        var searchInput = document.querySelector('input[name=keyword');
        var results = document.querySelector('#results');
        searchInput.onkeyup = function (event){
            if(this.value){
                results.style = 'display:block';
                var keyword = this.value;
                $.ajax({
                    url: "{{ route('customer.search.company') }}?keyword="+keyword,
                    type: "GET"
                }).done(function (companies){
                    var resultsList = document.querySelector('#results ul');
                    var list = '';
                    console.log(companies)
                    for(var i = 0; i < companies.length; i++){
                        var item = `<li onclick = "block(${companies[i].id})">
                                        <div class="logo">
                                            <img src="{{asset('storage/images/${companies[i].logo}')}}">
                                        </div>
                                        <p>${companies[i].fullname}</p>
                                    </li>`
                        list += item;
                    }
                    resultsList.innerHTML = list;
                });
            }
        }
        
        // searchInput.onblur = function(event){
        //     results.style = 'display:none';
        //     }
    }
    </script>
@endsection