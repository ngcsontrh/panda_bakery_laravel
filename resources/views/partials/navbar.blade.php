<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Panda Bakery</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/products">Danh sách bánh</a>
          </li>
          @if(Auth::check() &&  Auth::user()->role === 'Customer')
          <li class="nav-item">
            <a class="nav-link" href="#">Giỏ hàng</a>
          </li>
          @endif
        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Đăng nhập</a>
                </li>
            @else
                <li class="nav-item">
                  @if (Auth::user()->role === 'Customer')
                    <a href="/customer/account" class="nav-link">Tài khoản</a>  
                  @elseif (Auth::user()->role === 'Employee')
                    <a href="/employee/account" class="nav-link">Tài khoản</a>
                  @elseif (Auth::user()->role === 'Manager')
                    <div class="dropdown">
                      <button class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Quản lý
                      </button>
                      <ul class="dropdown-menu">
                        <li><a href="{{route('viewManagerAccount')}}" class="dropdown-item">Tài khoản</a></li>
                        <li><a href="{{route('viewAddProduct')}}" class="dropdown-item">Sản phẩm</a></li>
                        <li><a class="dropdown-item" href="{{route('viewManageEmployees')}}">Nhân viên</a></li>
                      </ul>
                    </div>
                  
                  @endif
                </li>
                <li class="nav-item">
                  <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="nav-link">Đăng xuất</button>
                  </form>
                </li>
            @endguest
        </ul>
      </div>
    </div>
  </nav>