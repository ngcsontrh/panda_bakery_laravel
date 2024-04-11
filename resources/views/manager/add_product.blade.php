@extends('../partials/layout')

@section('content')

<div class="container mt-5">
    <p class="text-center fs-3 text-success">{{session('success' ?? '')}}</p>
    <h3 class="fw-semibold mb-3">Thêm sản phẩm</h3>
    <form action="{{route('addNewProduct')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text">Tên sản phẩm</span>
            <input required type="text" class="form-control" name="name">
        </div>
        @error('name')
            <p class="text-danger text-center">{{$message}}</p>
        @enderror
          
        <div class="input-group mb-3">
            <span class="input-group-text">Giá bán</span>
            <input required type="text" class="form-control" name="price">
            <span class="input-group-text">đồng</span>
        </div>
        @error('price')
            <p class="text-danger">{{$message}}</p>
        @enderror
          
        <div class="input-group mb-3">
            <span class="input-group-text">Số lượng</span>
            <input required type="number" class="form-control" min="0" name="inventory">
        </div>
        @error('inventory')
            <p class="text-danger">{{$message}}</p>
        @enderror
    
        <div class="input-group mb-3">
            <span class="input-group-text">Mô tả</span>
            <textarea required class="form-control" name="description"></textarea>
        </div>
        @error('description')
            <p class="text-danger">{{$message}}</p>
        @enderror

        <div class="input-group mb-3">
            <input required type="file" class="form-control" name="image">
        </div>
        @error('image')
            <p class="text-danger">{{$message}}</p>
        @enderror
          
        <button type="submit" class="btn btn-primary">Đăng sản phẩm</button>
    
    </form>
</div>

@endsection