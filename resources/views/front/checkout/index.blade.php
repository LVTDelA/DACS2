@extends('front.layout.master')

@section('title', 'Check Out')

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


    <!-- shopping cart section  -->
    <div class="checkout-section spad">
        <div class="container">
            <form action="./checkout" method="post" class="checkout-form">
                @csrf
                <div class="row">
                    @if(Cart::count() > 0)
                        <!-- form create address-->
                        <div class="col-lg-6">
                            <div class="checkout-content">
                                <a href="./account/login" class="login-btn-checkout">Bấm vào đây để đăng nhập</a>
                            </div>
                            <!-- Detail bills -->
                            <h4>Chi tiết hóa đơn</h4>
                            <div class="row">

                                <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id ?? ''}}">

                                <div class="col-lg-6">
                                    <label for="fir">Họ <span>*</span></label>
                                    <input type="text" id="fir" name="first_name" value="{{Auth::user()->name ?? ''}}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="last">Tên <span>*</span></label>
                                    <input type="text" id="last" name="last_name">
                                </div>

                                {{--                            <div class="col-lg-12">--}}
                                {{--                                <label for="cun-name">Tên công ty</label>--}}
                                {{--                                <input type="text" id="cun-name" name="company_name">--}}
                                {{--                            </div>--}}

                                <div class="col-lg-12">
                                    <label for="cun">Đất nước <span>*</span></label>
                                    <input type="text" id="cun" name="country" value="{{Auth::user()->country ?? ''}}">
                                </div>

                                <div class="col-lg-12">
                                    <label for="street">Địa chỉ <span>*</span></label>
                                    <input type="text" id="street" class="street-first" name="street_address" value="{{Auth::user()->street_address ?? ''}}">
                                </div>

                                {{--                            <div class="col-lg-12">--}}
                                {{--                                <label for="zip">Mã bưu điện / ZIP (Không bắt buộc)</label>--}}
                                {{--                                <input type="text" id="zip" name="postcode_zip">--}}
                                {{--                            </div>--}}

                                {{--                            <div class="col-lg-12">--}}
                                {{--                                <label for="town">Thành phố (Không bắt buộc)</label>--}}
                                {{--                                <input type="text" id="town" name="town_city">--}}
                                {{--                            </div>--}}

                                <div class="col-lg-6">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" value="{{Auth::user()->email ?? ''}}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="phone">Điện thoại</label>
                                    <input type="text" id="phone" name="phone_number" value="{{Auth::user()->phone ?? ''}}">
                                </div>
                                <!-- create account -->
                                <div class="col-lg-12">
                                    <div class="create-item">
                                        <label for="acc-create">
                                            Tạo tài khoản ?
                                            <input type="checkbox" id="acc-create">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <!-- end create account -->

                            </div>
                            <!-- END Detail Bill -->
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout-content">
                                <input type="text" placeholder="Nhập mã giảm giá">
                            </div>
                            <div class="place-order">
                                <h4>Đơn hàng của bạn</h4>
                                <div class="order-total">
                                    <ul class="order-table">
                                        <li><span>Tổng</span> sản phẩm</li>

                                        @foreach($carts as $cart)
                                            <li class="fw-normal">
                                                {{$cart->name}} x {{$cart->qty}}
                                                <span>{{number_format($cart->price * $cart->qty, 0, '.', ' ')}} 000đ</span></li>
                                        @endforeach
                                        <li class="total-price">Total <span>{{$total}} 000đ</span></li>
                                    </ul>
                                    <div class="payment-check">
                                        <div class="pc-item">
                                            <label for="pc-check">
                                                Thanh toán tiền mặt
                                                <input type="radio" id="pc-check" name="payment_type" value="pay_later"
                                                       checked>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="pc-item">
                                            <label for="pc-paypal">
                                                Thanh toán thẻ
                                                <input type="radio" id="pc-paypal" name="payment_type"
                                                       value="online_payment">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="order-btn">
                                        <button type="submit" class="site-btn place-btn">Đặt hàng</button>
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
            </form>
        </div>
    </div>
    <!-- end shopping cart section  -->

@endsection
