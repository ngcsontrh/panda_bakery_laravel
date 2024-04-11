@extends('../partials/layout')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h3 class="card-title text-center mb-5 fw-light">Đăng ký</h3>
            <form method="POST" action="{{ route('registerNewUser') }}">
              @csrf
              <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="Tên tài khoản">
                  <label for="username">Tên tài khoản</label>
                  @error('username')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>
              <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu">
                  <label for="password">Mật khẩu</label>
                  @error('password')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>
              <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu">
                  <label for="password_confirmation">Xác nhận mật khẩu</label>
                  @error('password_confirmation')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>
              <div class="form-check mb-3">
                  <input type="checkbox" id="showPassword" onclick="showOrHideRegisterPassword()">
                  <label for="showPassword">Hiện mật khẩu</label>
              </div>
              <div class="d-grid">
                  <button class="btn btn-primary btn-login text-uppercase" type="submit">Đăng ký</button>
              </div>
          </form>
          
            <div class="mt-3 d-flex justify-content-around">
              <span class="fw-light">Đã có tài khoản?</span>
              <a href="{{route('login')}}" class="btn btn-secondary">Đăng nhập</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection