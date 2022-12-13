@extends('front.layout.master')

@section('title', 'Check Out')

@section('body')

    <!-- Breadcrumb (định vị vị trí ở web) -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./index"><i class="fa fa-home">Trang Chủ</i></a>
                        <a href="./checkout">Cửa hàng</a>
                        <span>Thanh toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END Breadcrumb (định vị vị trí ở web) -->


    <!-- shopping cart section  -->
    <div class="checkout-section spad">
        <div class="container">
            <div class="col-lg-12">
                <h4>{{$notification}}</h4>
                <a href="./" class="primary-btn mt-5">Tiếp tục mua sắm</a>
            </div>
        </div>
    </div>
    <!-- end shopping cart section  -->

@endsection
