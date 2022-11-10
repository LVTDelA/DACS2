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

                @if(count($orders) > 0)
                    <div class="col-lg-12">
                        <!-- part 1 -->
                        <div class="cart-table">
                            <table>
                                <!-- thead -->
                                <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>ID</th>
                                    <th class="p-name">Tên sản phẩm</th>
                                    <th>Tổng cộng</th>
                                    <th>Chi tiết</th>
                                </tr>
                                </thead>
                                <!-- tbody -->
                                <tbody>

                                @foreach($orders as $order)
                                    <tr>
                                        <td class="cart-pic first-row">
                                            <img
                                                style="height: 10rem"
                                                src="front/img/products/{{$order->orderDetails[0]->coffeeProduct->coffeeImages[0]->path}}"
                                                alt="">
                                        </td>
                                        <td class="first-row">
                                            <h5>#{{$order->id}}</h5>
                                        </td>
                                        <td class="cart-title first-row">
                                            <h5>
                                                {{$order->orderDetails[0]->coffeeProduct->name}}

                                                @if(count($order->orderDetails) > 1)
                                                    <i>và {{count($order->orderDetails)}} sản phẩm khác</i>
                                                @endif
                                            </h5>
                                        </td>
                                        <td class="total-price first-row">
                                            {{number_format(array_sum(array_column($order->orderDetails->toArray(), 'total')), 0, '.', ' ')}} 000₫
                                        </td>
                                        <td class="first-row">
                                            <a class="btn" href="./account/my-order/{{$order->id}}">Detail</a>
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
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-12">
                        <h4>Ohh! Chưa có gì ở đây cả.</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- END Shopping cart section -->

@endsection
