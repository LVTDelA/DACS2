@extends('front.layout.master')

@section('title', 'Chi tiết đơn hàng')

@section('body')

    <!-- Breadcrumb (định vị vị trí ở web) -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home">Trang Chủ</i></a>
                        <a href="./shop">Cửa hàng</a>
                        <span>Thanh toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END Breadcrumb (định vị vị trí ở web) -->


    <!-- my order section  -->
    <div class="checkout-section spad">
        <div class="container">
            <form action="#" method="post" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="col-lg-6">
                            <div class="checkout-content">
                                <a class="content-btn">
                                    ID đơn hàng:
                                    <b>#{{$order->id}}</b>
                                </a>
                            </div>

                        </div>
                        <!-- Detail bills -->
                        <h4>Chi tiết hóa đơn</h4>
                        <div class="row">

                            <div class="col-lg-6">
                                <label for="fir">Họ </label>
                                <input disabled type="text" id="fir" name="first_name" value="{{$order->first_name}}">
                            </div>

                            <div class="col-lg-6">
                                <label for="last">Tên </label>
                                <input disabled type="text" id="last" name="last_name" value="{{$order->last_name}}">
                            </div>

                            <div class="col-lg-12">
                                <label for="cun">Đất nước </label>
                                <input disabled type="text" id="cun" name="country" value="{{$order->country}}">
                            </div>

                            <div class="col-lg-12">
                                <label for="street">Địa chỉ </label>
                                <input disabled type="text" id="street" class="street-first" name="street_address"
                                       value="{{$order->street_address}}">
                            </div>

                            <div class="col-lg-6">
                                <label for="email">Email</label>
                                <input disabled type="text" id="email" name="email" value="{{$order->email}}">
                            </div>

                            <div class="col-lg-6">
                                <label for="phone">Điện thoại</label>
                                <input disabled type="text" id="phone" name="phone_number"
                                       value="{{$order->phone_number}}">
                            </div>

                        </div>
                        <!-- END Detail Bill -->
                    </div>

                    <div class="col-lg-6">
                        <div class="place-order">
                            <div class="col-lg-6">
                                <div class="checkout-content">
                                    <a class="content-btn">
                                        Trạng thái:
                                        <b>{{\App\Utilities\Constant::$order_status[$order->status]}}</b>
                                    </a>
                                </div>

                            </div>
                            <h4>Đơn hàng của bạn</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li><span>Tổng</span> sản phẩm</li>

                                    @foreach($order->orderDetails as $orderDetail)
                                        <li class="fw-normal">
                                            {{$orderDetail->coffeeProduct->name}} x {{$orderDetail->qty}}
                                            <span>{{number_format($orderDetail->amount * $orderDetail->qty, 0, '.', ' ')}} 000đ</span>
                                        </li>
                                    @endforeach
                                    <li class="total-price">
                                        Total
                                        <span>{{number_format(array_sum(array_column($order->orderDetails->toArray(), 'total')), 0, '.', ' ')}} 000đ</span>
                                    </li>
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Thanh toán tiền mặt
                                            <input disabled type="radio" id="pc-check" name="payment_type"
                                                   value="pay_later"
                                                {{$order->payment_type == 'pay_later' ? 'checked' : ''}}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Thanh toán thẻ
                                            <input disabled type="radio" id="pc-paypal" name="payment_type"
                                                   value="online_payment"
                                                {{$order->payment_type == 'online_payment' ? 'checked' : ''}}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <!-- end my order section  -->

@endsection
