@extends('home')
@section('title', 'Danh sách khách hàng')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>Danh Sách Khách Hàng</h1>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <a class="btn btn-outline-primary mb-2" href="" data-toggle="modal" data-target="#cityModal">
                            Lọc
                        </a>
                    </div>
                    <div class="col-6">
                        <form class="navbar-form navbar-left" action="{{route('customer.search')}}" method="get">
                            @csrf
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search" name="keyword">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-default">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Email</th>
                    <th scope="col">Thành Phố</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($customers) == 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($customers as $key => $customer)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->dob }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                @if ($customer->city)
                                    {{ $customer->city->name }}
                                @endif
                            </td>
                            <td><a href="{{route('customer.edit', $customer->id)}}">sửa</a></td>
                            <td><a href="{{route('customer.destroy', $customer->id)}}" class="text-danger"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div class="col-12">
                <div class="row">
                    <div class="col-10">
                        <a class="btn btn-primary" href="{{route('customer.create')}}">Thêm mới</a>
                    </div>
                    <div class="col-2">
                        {{ $customers->appends(request()->query()) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cityModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <form action="{{ route('customer.filterByCity') }}" method="get">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="select-by-program">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label border-right">Lọc khách hàng theo tỉnh
                                    thành</label>
                                <div class="col-sm-7">
                                    <select class="custom-select w-100" name="city_id">
                                        <option value="">Chọn tỉnh thành</option>
                                        @foreach($citys as $city)
                                            @if(isset($cityFilter))
                                                @if($city->id == $cityFilter->id)
                                                    <option value="{{$city->id}}" selected>{{ $city->name }}</option>
                                                @else
                                                    <option value="{{$city->id}}">{{ $city->name }}</option>
                                                @endif
                                            @else
                                                <option value="{{$city->id}}">{{ $city->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="submitAjax" class="btn btn-primary">Chọn</button>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
