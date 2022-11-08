@extends('front.layout.layout')
@section('title','Cart')
@section('content')
<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8  mb-5">
            <div class="cart-table">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Số tiền</th>
                    <th><i onclick="confirm('Bạn có chắc chắn muốn xóa hết!')===true?destroyCart() : ''"
                        style="cursor: pointer">Xóa</i></th>
                </tr>
                </thead>
                <tbody class="align-middle">
                @if(Cart::count()>0)
                @foreach($carts as $cart)
                <tr data-rowid="{{$cart->rowId}}">
                    <td class="align-middle"><img src="{{asset('public/front/img/'.$cart->options->images[0]->path)}}" alt="ảnh sản phẩm" style="width: 80px;"></td>
                    <td class="align-middle">{{$cart->name}}</td>
                    <td class="align-middle">{{number_format($cart->price).' '. ' VND'}}</td>
                    <td class="align-middle">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" value="{{$cart->qty}}" data-rowid="{{$cart->rowId}}">
                            </div>
                        </div>
                    </td>
                    <td class="align-middle total-price">{{number_format($cart->price * $cart->qty).' '.'VND'}}</td>
                    <td class="align-middle">
                        <i onclick="removeCart('{{ $cart->rowId }}')" style="cursor: pointer" class="fa fa-times"></i>
                    </td>
                </tr>
                @endforeach
                @else
                    <td colspan="6" style="text-align: left">
                        <h4>Giỏ Hàng của bạn đang trống!</h4>
                    </td>
                @endif
                </tbody>
            </table>
            </div>
        </div>
        <div class="col-lg-4">
            <form class="mb-30" action="">
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="Mã Giảm Giá">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tổng giỏ hàng</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Tổng tiền giỏ hàng</h6>
                        <h6>{{$total.' '.'VND'}}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Ship</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Tổng tiền</h5>
                        <h5>{{$subtotal.' '.'VND'}}</h5>
                    </div>
                    <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
@endsection
