@extends('front.layout.master')

@section('title', 'Register')

@section('body')

    <!-- container -->
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <!-- logo -->
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="index.html">
                            <img src="/img/logo.png" height="25" alt="logo">
                        </a>
                    </div>
                </div>
                <!-- search -->
                <div class="col-lg-7 col-md-7">
                    <div class="advanced-search">
                        <button type="button" class="category-btn">Danh mục</button>
                        <div class="input-group">
                            <input type="text" name="" id="" placeholder="Nhập vào đây">
                            <button type="button"><i class="ti-search"> </i></button>
                        </div>
                    </div>
                </div>
                <!-- cart -->
                <div class="col-lg-3 col-md-3 text-right">
                    <ul class="nav-right">
                        <li class="heart-icon">
                            <a href="#">
                                <i class="icon_heart_alt">
                                    <span>1</span>
                                </i>
                            </a>
                        </li>
                        <!-- cart -->
                        <li class="cart-icon">
                            <a href="#">
                                <i class="icon_bag_alt">
                                    <span>3</span>
                                </i>
                            </a>
                            <div class="cart-hover">
                                <!-- item -->
                                <div class="select-items">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td class="si-pic"><img src="/img/select-product-1.jpg" alt=""></td>
                                            <td class="si-text">
                                                <div class="product-selected">
                                                    <p>80,000₫ x 1</p>
                                                    <h6>Cà phê House Blend</h6>
                                                </div>
                                            </td>
                                            <td class="si-close">
                                                <i class="ti-close"></i>
                                            </td>
                                        </tr>
                                        <!-- pd2 -->
                                        <tr>
                                            <td class="si-pic"><img src="/img/select-product-2.png" alt=""></td>
                                            <td class="si-text">
                                                <div class="product-selected">
                                                    <p>72,000₫ x 1</p>
                                                    <h6>Cà phê Sáng tạo 3 Trung Nguyên</h6>
                                                </div>
                                            </td>
                                            <td class="si-close">
                                                <i class="ti-close"></i>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- total -->
                                <div class="select-total">
                                    <span>Tổng: </span>
                                    <h5>152.000₫</h5>
                                </div>
                                <div class="select-button">
                                    <a href="shopping-cart.html" class="primary-btn view-card">Xem giỏ hàng</a>
                                    <a href="check-out.html" class="primary-btn checkout-btn">Thanh toán</a>
                                </div>
                            </div>
                        </li>
                        <li class="cart-price">$150.00</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- nav-item -->
    <div class="nav-item">
        <div class="container">
            <div class="nav-menu mobile-menu">
                <ul>
                    <li class="fix-margin-header active"><a href="index.html"><i class="ti-home"></i> Trang chủ</a></li>
                    <li><a href="shop.html">Cửa hàng</a></li>
                    <li><a href="#"><i class="ti-menu"></i> Loại cà phê</a>
                        <ul class="dropdown">
                            <li><a href="#">Cà phê cao cấp</a></li>
                            <li><a href="#">Cà phê hạt</a></li>
                            <li><a href="#">Cà phê hòa tan</a></li>
                            <li><a href="#">Cà phê rang xay</a></li>
                        </ul>
                    </li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.html">Liên hệ</a></li>
                    <li><a href="#">Xem thêm</a>
                        <ul class="dropdown">
                            <li><a href="shopping-cart.html">Giỏ hàng</a></li>
                            <li><a href="check-out.html">Thanh toán</a></li>
                            <li><a href="faq.html">Câu hỏi thường gặp</a></li>
                            <li><a href="register.html">Đăng kí</a></li>
                            <li><a href="login.html">Đăng nhập</a></li>
                        </ul>

                    </li>
                </ul>
            </div>
            <div class="mobile-menu-wrap"></div>
        </div>
    </div>
    </header>

    <!-- Breadcrumb (định vị vị trí ở web) -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./index.html"><i class="fa fa-home">Trang Chủ</i></a>
                        <span>Đăng kí</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END Breadcrumb (định vị vị trí ở web) -->

    <!-- Đăng kí -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Đăng kí</h2>
                        <form action="" method="POST">
                            @csrf
                            <div class="group-input">
                                <label for="email">Name <span>*</span></label>
                                <input type="text" id="name" name="name">
                            </div>
                            <div class="group-input">
                                <label for="email">Email <span>*</span></label>
                                <input type="text" id="email" name="email">
                            </div>
                            <div class="group-input">
                                <label for="pass">Mật khẩu <span>*</span></label>
                                <input type="text" id="pass" name="password">
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Xác nhận mật khẩu <span>*</span></label>
                                <input type="text" id="con-pass" name="password_confirmation">
                            </div>
                            <button type="submit" class="site-btn register-btn">Đăng kí</button>
                        </form>
                        <!-- Switch login to sign up -->
                        <div class="switch-login">
                            <a href="./account/login" class="or-login">Hoặc Đăng nhập!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END Đăng kí -->

@endsection
