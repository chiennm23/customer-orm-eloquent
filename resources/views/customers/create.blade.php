@extends('home')
@section('title', 'Thêm mới khách hàng')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới khách hàng</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('customer.store') }}">
                    @csrf
                    @if ($errors->all())
                        <div class="alert alert-danger" role="alert">
                            Bạn cần nhập đúng yêu cầu thêm mới!
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="{{$errors->first('name') ? 'text-danger' : ''}}">
                            <strong>Tên khách hàng</strong>
                        </label>
                        <input type="text" class="form-control {{$errors->first('name') ? 'is-invalid' : ''}}" value="{{old('name')}}" name="name"
                               placeholder="Enter name">
                        @if ($errors->first('name'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="{{$errors->first('email') ? 'text-danger' : ''}}">
                            <strong>Email</strong>
                        </label>
                        <input type="text" class="form-control {{$errors->first('email') ? 'is-invalid' : ''}}" value="{{old('email')}}" name="email"
                               placeholder="Enter email">
                        @if ($errors->first('email'))
                            <p class="text-danger">{{$errors->first('email')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="{{$errors->first('dob') ? 'text-danger' : ''}}">
                            <strong>Ngày sinh</strong>
                        </label>
                        <input type="date" class="form-control {{$errors->first('dob') ? 'is-invalid' : ''}}" value="{{old('dob')}}" name="dob">
                        @if ($errors->first('dob'))
                            <p class="text-danger">{{$errors->first('dob')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Tỉnh thành</label>
                        <select class="form-control" name="city_id" required>
                            @foreach($citys as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <a class="btn btn-secondary" href="{{route('customer.create')}}">Hủy</a>
                </form>
            </div>
        </div>
    </div>
@endsection
