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
                    <th>Mã doanh nghiệp</th>
                    <th>Tên doanh nghiệp</th>
                    <th>Logo</th>
                    <th>Mã số thuế</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Thành phố</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $key => $company)
                    <tr>
                        <td>{{ $company->company_code }}</td>
                        <td>{{ $company->fullname }}</td>
                        <td><img src="{{ asset('storage/images/' . $company->logo) }}" style="max-width: 85px; max-height: 85px;"></td>
                        <td>{{ $company->tax_code }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->phone }}</td>
                        <td>{{ $company->city ? $company->city->city_name : null}}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.company.show', $company->id) }}" class="btn-sm btn-success mr-1">Xem</a>
                            <a href="{{ route('admin.company.edit', $company->id) }}" class="btn-sm btn-secondary mr-1">Sửa</a>
                            <a href="{{ route('admin.company.delete', $company->id) }}" class="btn-sm btn-danger">Xóa</a>
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
