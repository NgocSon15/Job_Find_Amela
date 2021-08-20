 @extends('admin.layout')

@section('title', 'Company List')
@section('active2', 'active')
@section('content-name', 'Danh sách doanh nghiệp')
@section('content')
    <div class="col-12">
        @if (Session::has('success'))
            <div class="alert alert-success">
                <i class="fa fa-check" aria-hidden="true"></i>
                {{ Session::get('success') }}
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Logo</th>
                    <th>Mã doanh nghiệp</th>
                    <th>Tên doanh nghiệp</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Thành phố</th>
                    <th>Đề xuất</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $key => $company)
                    <tr>
                        <td><img src="{{ asset('storage/images/' . $company->logo) }}" style="max-width: 40px; max-height: 40px;"></td>
                        <td>{{ $company->company_code }}</td>
                        <td>{{ $company->fullname }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->phone }}</td>
                        <td>{{ $company->city ? $company->city->city_name : null}}</td>
                        <td>
                            <div class="icheck-success d-inline">
                                <input type="checkbox" id="suggest_{{$company->id}}" name="suggest_{{$company->id}}" class="check" value="{{$company->id}}"
                                       @if($company->is_suggest == 1)
                                       checked
                                    @endif
                                >
                                <label for="suggest_{{$company->id}}">
                                </label>
                            </div>
                        </td>
                        <td>@if($company->status == 2) Đã bị khóa @elseif($company->status == 0) Đang đợi duyệt @else Đang hoạt động @endif</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.company.show', $company->id) }}" class="btn-sm btn-success mr-1"><i class="fas fa-book"></i></a>
                            <a href="{{ route('admin.company.edit', $company->id) }}" class="btn-sm btn-secondary mr-1"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('admin.company.destroy', $company->id) }}" class="btn-sm btn-danger mr-1" onclick="return confirm('Bạn chắc chắn muốn xóa công ty {{ $company->fullname }}')"><i class="fas fa-trash"></i></a>
                            @if($company->status == 0)
                                <a href="{{ route('admin.company.verify', $company->id) }}" class="btn-sm btn-success mr-1" onclick="return confirm('Bạn chắc chắn muốn duyệt công ty {{ $company->fullname }}')"><i class="fas fa-check"></i></a>
                            @elseif($company->status == 1)
                                <a href="{{ route('admin.company.lock', $company->id) }}" class="btn-sm btn-danger" onclick="return confirm('Bạn chắc chắn muốn khóa công ty {{ $company->fullname }}')"><i class="fas fa-lock"></i></a>
                            @else
                                <a href="{{ route('admin.company.unlock', $company->id) }}" class="btn-sm btn-success" onclick="return confirm('Bạn chắc chắn muốn mở khóa công ty {{ $company->fullname }}')"><i class="fas fa-lock-open"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
         <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                {{ $companies->appends(request()->query()) }}
            </ul>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.check').on('change', function() {
                if(this.checked)
                {
                    var id = $(this).val();
                    console.log(id);
                    var isSuggest = 1;
                    suggestCompany(id, isSuggest);
                } else {
                    var id = $(this).val();
                    console.log(id);
                    var isSuggest = 0;
                    suggestCompany(id, isSuggest);
                }
            })

            function suggestCompany(id, isSuggest) {
                $.ajax({
                    type: 'post',
                    url: '{{ route('admin.company.suggest') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        isSuggest: isSuggest,
                    },
                    success: function (res) {

                    }
                })
            }
        })
    </script>
@endsection
