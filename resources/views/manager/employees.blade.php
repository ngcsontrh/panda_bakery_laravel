@extends('./partials/layout')

@section('content')
<section class="container-fluid">
    <div class="row justify-content-between">
        <div class="col-lg-7 mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Mã nhân viên</th>
                        <th scope="col">Tên nhân viên</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Giới tính</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                    <tr>
                        <th scope="row">{{$employee->id}}</th>
                        <td>{{$employee->fullname}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>{{$employee->address}}</td>
                        <td>{{$employee->birthday}}</td>
                        <td>{{$employee->gender === 'Male' ? 'Nam' : 'Nữ'}}</td>
                        <td class="d-inline">
                            <button class="btn btn-warning">Sửa</button>
                            <button class="btn btn-danger">Xoá</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-lg-4 mt-4 me-4" style="border: 1px solid #ccc; border-radius: 5px">
            <h4 class="mt-3">Thêm nhân viên</h4>
            <form method="POST" action="{{route('addNewEmployee')}}">
                @csrf
                <div class="mb-2">
                    <label class="form-label">Tài khoản</label>
                    <input name="username" required type="text" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Mật khẩu</label>
                    <input name="password" required type="text" class="form-control">
                </div>
                <input type="hidden" name="role" value="Employee">
                <div class="mb-2">
                    <label class="form-label">Tên nhân viên</label>
                    <input name="fullname" required type="text" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Số điện thoại</label>
                    <input name="phone" required type="text" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Địa chỉ</label>
                    <textarea name="address" required cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="mb-2">
                    <label class="form-label">Ngày sinh</label>
                    <input name="birthday" required type="date" class="form-control">
                </div>

                <div class="mb-3">
                <label class="form-label">Giới tính</label>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Male">
                    <label class="form-check-label" for="gender">
                        Nam
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Female">
                    <label class="form-check-label" for="gender">
                        Nữ
                    </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Thêm</button>
            </form>
        </div>
    </div>
</section>
@endsection
