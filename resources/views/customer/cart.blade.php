@extends('./partials/layout')

@section('content')
<section class="container-fluid">
    <div class="row justify-content-between">
        <div class="col-lg-7 mt-4">
            <h4>Giỏ hàng</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Tổng</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Bánh sinh nhật</th>
                        <td>2</td>
                        <td>100000</td>
                        <td>200000</td>
                            <td class="d-inline">
                                <button type="submit" class="btn btn-danger">Xoá</button>
                            </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-lg-4 mt-4 me-4" style="border: 1px solid #ccc; border-radius: 5px">
            <h4 class="mt-3 fw-semibold">Tổng cộng</h4>
            <h6>Tổng số lượng: 2</h6>
            <h6>Tổng tiền: $200000</h6>
            <button class="btn btn-primary mb-3">Thanh toán</button>
        </div>
    </div>
</section>
@endsection
