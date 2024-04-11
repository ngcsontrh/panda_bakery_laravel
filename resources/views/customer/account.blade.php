@extends('../partials/layout')

@section('content')
<div class="container rounded mt-5" 
    style="background-image:url({{asset('images/background1.jpg')}}); background-size: cover; background-position: center;">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img width="90" height="90" class="mt-5" src="{{$user->avatar}}" alt="avatar">
                {{-- <img class="rounded-circle mt-5" src="" width="90"> --}}
                <span class="font-weight-bold">{{$user->customer->fullname}}</span>
                <span class="text-black-50">{{$user->customer->phone}}</span>
                <span>{{$user->customer->address}}</span>
            </div>
        </div>
        <div class="col-md-8">
            <div class="p-3 py-5">
                <form method="POST" action="{{route('updateCustomerAccount')}}" class="mt-2">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="customerId" value="{{$user->customer->id}}">
                    <div class="form-group">
                        <label class="mb-1" for="username">Tên tài khoản</label>
                        <input type="text" id="username" class="form-control" value="{{$user->username}}" disabled>
                    </div>
                    <div class="form-group mt-2">
                        <label class="mb-1" for="role">Vai trò</label>
                        <input type="text" id="role" class="form-control" value="{{$user->role}}" disabled>
                    </div>
                    <div class="form-group mt-2">
                        <label class="mb-1" for="fullname">Họ tên</label>
                        <input type="text" id="fullname" name="fullname" class="form-control" value="{{$user->customer->fullname}}" >
                    </div>
                    <div class="form-group mt-2">
                        <label class="mb-1" for="address">Địa chỉ</label>
                        <input type="text" id="address" name="address" class="form-control" value="{{$user->customer->address}}" >
                    </div>
                    <div class="form-group mt-2">
                        <label class="mb-1" for="phone">Số điện thoai</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{$user->customer->phone}}" >
                    </div>
                    <div class="mt-5 text-right">
                        <button class="btn btn-primary profile-button" type="submit">Lưu thông tin</button>
                    </div>
                </form>
        
            </div>
        </div>
    </div>
</div>
@endsection