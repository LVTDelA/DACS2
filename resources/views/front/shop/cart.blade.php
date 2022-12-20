@extends('front.layout.master')

@section('title', 'Shopping Cart')

@section('body')

    <!-- Breadcrumb (định vị vị trí ở web) -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./index.html"><i class="fa fa-home">Trang Chủ</i></a>
                        <a href="./shop.html">Cửa hàng</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END Breadcrumb (định vị vị trí ở web) -->

    <!-- Shopping cart section -->
    <div class="shopping-cart spad">
        <div class="container">
            <div class="row">

                @if(Cart::count() > 0)
                <div class="col-lg-12">
                    <!-- part 1 -->
                    <div class="cart-table">
                        <table>
                            <!-- thead -->
                            <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th class="p-name">Tên sản phẩm</th>
                                <th>Mức giá</th>
                                <th>Số lượng</th>
                                <th>Tổng cộng</th>
                                <th>
                                    <i class="ti-close"
                                       onclick="confirm('Bạn muốn xóa giỏ hàng chứ?') == true ? window.location='./cart/destroy' : ''"
                                    style="cursor: pointer"></i>
                                </th>
                            </tr>
                            </thead>
                            <!-- tbody -->
                            <tbody>

                            @foreach($carts as $cart)
                                <tr data-rowId="{{$cart->rowId}}">
                                    <td class="cart-pic first-row">
                                        <img style="height: 10rem" src="front/img/products/{{$cart->options->images[0]->path}}" alt="">
                                    </td>
                                    <td class="cart-title first-row">
                                        <h5>{{$cart->name}}</h5>
                                    </td>
                                    <td class="p-price first-row">{{$cart->price}} 000₫</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{$cart->qty}}" data-rowId="{{$cart->rowId}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">{{number_format($cart->price * $cart->qty, 0, '.', ' ')}} 000₫</td>
                                    <td class="close-td first-row">
                                        <i class="ti-close" onclick="deleteCart('{{$cart->rowId}}')"></i>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- part 2 -->
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="./shop" class="primary-btn continue-shop">Tiếp tục mua</a>
{{--                                <a href="#" class="primary-btn up-cart">Cập nhật giỏ hàng</a>--}}
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="cart-total">Tổng tiền <span>{{$total}} 000₫</span></li>
                                </ul>
                                <a href="./checkout" class="proceed-btn">Tiến hành thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <div class="col-lg-12">
                        <h4 class="text-center">Hiện tại giỏ hàng chưa có gì cả, xin quý khách vui lòng <a href="./shop" style="color:orange">mua hàng tại cửa hàng</a>.</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- END Shopping cart section -->

@endsection
