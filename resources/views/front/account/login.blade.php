@extends('front.layout.master')

@section('title', 'Login')

@section('body')


<!-- Breadcrumb (định vị vị trí ở web) -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="./index.html"><i class="fa fa-home">Trang Chủ</i></a>
                    <span>Đăng nhập</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END Breadcrumb (định vị vị trí ở web) -->

<!-- Đăng nhập -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>Đăng nhập</h2>

                    @if(session('notification'))
                        <div class="alert alert-warning" role="alert">
                            {{session('notification')}}
                        </div>
                    @endif

                    <form action="" method="POST">
                        @csrf
                        <div class="group-input">
                            <label for="username">Tên đăng nhập hoặc Email <span>*</span></label>
                            <input type="text" id="username" name="email">
                        </div>
                        <div class="group-input">
                            <label for="pass">Mật khẩu <span>*</span></label>
                            <input type="password" id="pass" name="password">
                        </div>
                        <div class="group-input gi-check">
                            <div class="gi-more">
                                <label for="save-pass">
                                    Lưu mật khẩu
                                    <input type="checkbox" id="save-pass" name="remember">
                                    <span class="checkmark"></span>
                                </label>
                                <a href="#" class="forget-pass">Quên mật khẩu</a>
                            </div>
                        </div>
                        <button type="submit" class="site-btn login-btn">Đăng nhập</button>
                    </form>
                    <!-- Switch login to sign up -->
                    <div class="switch-login">
                        <a href="./account/register" class="or-login">Hoặc tạo tài khoản mới !</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Đăng nhập -->

@endsection
