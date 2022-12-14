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
    <div class="register-login-section spad ">
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
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="username">Tên đăng nhập hoặc Email <span>*</span></label>
                                        <input name="email" id="exampleEmail" placeholder="Email"
                                               type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="pass">Mật khẩu <span>*</span></label>
                                        <input name="password" id="examplePassword"
                                               placeholder="Mật khẩu" type="password"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative form-check">
                                <input name="remember" id="exampleCheck" type="checkbox"
                                       class="form-check-input">
                                <label for="exampleCheck" class="form-check-label">Nhớ tài khoản</label>
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
