@extends('../partials/layout')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h3 class="card-title text-center mb-3 fw-light">Đăng nhập</h3>
            <form method="POST" action="{{route('loginUser')}}">
              @csrf
              
              <p class="text-danger text-center">{{ session('error') ?? '' }}</p>
              
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}" placeholder="Tên tài khoản">
                <label for="username">Tên tài khoản</label>
                @error('username')
                 <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu">
                <label for="password">Mật khẩu</label>
              </div>
              <div class="d-flex justify-content-between">
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" id="showPassword" onclick="showOrHideLoginPassword()">
                  <label class="form-check-label" for="showPassword">Hiện mật khẩu</label>
                </div>
                <a href="#" class="link-offset-2 link-underline link-underline-opacity-0">Quên mật khẩu</a>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase" type="submit">Đăng nhập</button>
              </div>

            </form>
            <div class="mt-3 d-flex justify-content-around">
              <span class="fw-light">Chưa có tài khoản?</span>
              <a href="{{route('register')}}" class="btn btn-secondary">Đăng ký</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection