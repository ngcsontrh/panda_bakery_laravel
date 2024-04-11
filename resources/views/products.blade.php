@extends('./partials/layout')

@section('content')
<section>
    <div class="container py-5">
        <div class="row">
        @foreach($products as $product)
            <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                data-mdb-ripple-color="light">
                    <img src="{{$product->image}}" class="img-thumbnail" />
                </div>
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title mb-3">
                            <span class="fw-semibold">Sản phẩm:</span> {{$product->name}}</h5>
                        <p class="mb-3"><span class="fw-semibold">Số lượng:</span> {{$product->inventory}}</p>
                        <h6 class="mb-3"><span class="fw-semibold">Giá:</span> {{$product->price}}</h6>
                        <div>
                            <span class="fw-semibold">Mô tả: </span>
                            <p>{{$product->description}}</p>
                        </div>
                    </div>
                    @if(Auth::check() && Auth::user()->role === 'Customer')
                    <div class="d-flex flex-column">
                        <button class="btn btn-primary mb-1">Đặt hàng</button>
                        <button class="btn btn-secondary">Thêm vào giỏ hàng</button>
                    </div>
                    @endif
                </div>
            </div>
            </div>
        @endforeach
        </div>
        {{ $products->onEachSide(6)->links() }}
    </div>

</section>
@endsection