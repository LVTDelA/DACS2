<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{asset('/')}}">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title") | VKU coffee</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" href="front/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="front/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/style.css" type="text/css">
{{--    ADMIN CSS    --}}
    <link href="./admin/main.css" rel="stylesheet">
    <link href="./admin/my_style.css" rel="stylesheet">

    <!-- Toastr -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

</head>

<body>
<div id="preloder">
    <div class="loader">
    </div>
</div>
<!-- Header -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class="fa fa-envelope"></i>
                    Cafe_vku@gamil.com
                </div>
                <div class="phone-service">
                    <i class="fa fa-phone"></i>
                    +84 123.456.789
                </div>
            </div>
            <div class="ht-right">

                @if(Auth::check())
                    <div class="dropdown-ava" style="float:right;">
                        <img width="38" height="20" class="dropbtn rounded-circle" src="admin/assets/images/avatars/{{Auth::user()->avatar ?? ''}}"
                             alt="">
                        <div class="dropdown-content">
                            <a href="#">Thông tin: <b>{{Auth::user()->name ?? ''}}</b>
                                    <a href="./front/user/{{Auth::user()->id}}/edit">Chỉnh sửa </a>
                                <a href="./account/logout" class="text-center">
                                    Đăng xuất
                                </a>
                        </div>
                    </div>


                @else
                    <a href="./account/login" class="login-panel">
                        <i class="fa fa-user"> Đăng Nhập</i>
                    </a>
                @endif

            </div>
        </div>
    </div>
    <!-- container -->
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <!-- logo -->
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="./">
                            <img src="/front/img/logo.png" height="25" alt="logo">
                        </a>
                    </div>
                </div>
                <!-- search -->
                <div class="col-lg-7 col-md-7">
                    <form action="shop">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">Danh mục</button>
                            <div class="input-group">
                                <input type="text" name="search" id="" value="{{request('search')}}" placeholder="Nhập vào đây">
                                <button type="submit"><i class="ti-search"> </i></button>
                            </div>
                        </div>
                    </form>
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
                            <a href="./cart">
                                <i class="icon_bag_alt">
                                    <span class="cart-count">{{Cart::count()}}</span>
                                </i>
                            </a>
                            <div class="cart-hover">
                                <!-- item -->
                                <div class="select-items">
                                    <table>
                                        <tbody>

                                        @foreach(Cart::content() as $cart)
                                            <tr data-rowId="{{$cart->rowId}}">
                                                <td class="si-pic"><img src="/front/img/products/{{$cart->options->images[0]->path}}" alt=""></td>
                                                <td class="si-text">
                                                    <div class="product-selected">
                                                        <p>{{$cart->price}} 000₫ x {{$cart->qty}}</p>
                                                        <h6>{{$cart->name}}</h6>
                                                    </div>
                                                </td>
                                                <td class="si-close">
                                                    <i class="ti-close" onclick="deleteCart('{{$cart->rowId}}')"></i>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- total -->
                                <div class="select-total">
                                    <span>Tổng: </span>
                                    <h5>{{ Cart::total(0, null, ' ')}} 000₫</h5>
                                </div>
                                <div class="select-button">
                                    <a href="./cart" class="primary-btn view-card">Xem giỏ hàng</a>
                                    <a href="./checkout" class="primary-btn checkout-btn">Thanh toán</a>
                                </div>
                            </div>
                        </li>
                        <li class="cart-price">{{Cart::total(0, null, ' ')}} 000₫</li>
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
                    <li class="fix-margin-header {{(request()->segment(1) == '') ? 'active' : ''}}">
                        <a href="./"><i class="ti-home"></i> Trang chủ</a>
                    </li>
                    <li class="{{(request()->segment(1) == 'shop') ? 'active' : ''}}"><a href="./shop">Cửa hàng</a></li>
                    <li>
                        <a href="./shop"><i class="ti-menu"></i> Loại cà phê</a>
                        <ul class="dropdown">

                            @foreach(\App\Models\CoffeeCategory::all() as $category)
                                <li><a href="shop/{{$category->name}}">{{$category->name}}</a></li>
                            @endforeach

                        </ul>
                    </li>
                    <li class="{{(request()->segment(1) == 'blog') ? 'active' : ''}}"><a href="./blog">Blog</a></li>
                    <li class="{{(request()->segment(1) == 'contact') ? 'active' : ''}}"><a href="./contact">Liên hệ</a>
                    </li>
                    <li><a href="#">Xem thêm</a>
                        <ul class="dropdown">
                            <li><a href="./account/my-order">Đơn hàng của tôi</a></li>
                            <li><a href="./cart">Giỏ hàng</a></li>
                            <li><a href="./checkout">Thanh toán</a></li>
                            <li><a href="./account/register">Đăng kí</a></li>
                            <li><a href="./account/login">Đăng nhập</a></li>
                        </ul>

                    </li>
                </ul>
            </div>
            <div class="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
<!-- Header end -->

<!-- Main -->
                <div class="app-main__inner">

                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>
                                    Người dùng
                                    <div class="page-title-subheading">
                                        Xem, tạo, sửa , xóa và quản lý người dùng trang web
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <form method="post" action="/admin/user/{{$user -> id}}" enctype="multipart/form-data">
                                        @csrf

@method('PUT')
@include('admin.components.notification')
                                        <div class="position-relative row form-group">
                                            <label for="image"
                                                class="col-md-3 text-md-right col-form-label">Avatar</label>
                                            <div class="col-md-9 col-xl-8">
                                                <img style="height: 200px; cursor: pointer;"
                                                    class="thumbnail rounded-circle" data-toggle="tooltip"
                                                    title="Click to change the image" data-placement="bottom"
                                                    src="admin/assets/images/avatars/{{$user->avatar}}" alt="Avatar">
                                                <input name="image" type="file" onchange="changeImg(this)"
                                                    class="image form-control-file" style="display: none;" value="">
                                                <input type="hidden" name="image_old" value="{{$user -> avatar}}">
                                                <small class="form-text text-muted">
                                                    Nhấn vào để thay đổi ảnh đại diện
                                                </small>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Họ tên</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="name" id="name" placeholder="Name" type="text"
                                                    class="form-control" value="{{$user -> name}}">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="email"
                                                class="col-md-3 text-md-right col-form-label">Email</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="email" id="email" placeholder="Email" type="email"
                                                    class="form-control" value="{{$user -> email}}">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="password"
                                                class="col-md-3 text-md-right col-form-label">Mật khẩu</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="password" id="password" placeholder="Password" type="password"
                                                    class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="password_confirmation"
                                                class="col-md-3 text-md-right col-form-label">Xác nhận mật khẩu</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" type="password"
                                                    class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="country"
                                                class="col-md-3 text-md-right col-form-label">Đất nước</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="country" id="country" placeholder="Country"
                                                    type="text" class="form-control" value="{{$user -> country}}">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="street_address" class="col-md-3 text-md-right col-form-label">
                                                Địa chỉ
                                            </label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="street_address" id="street_address"
                                                    placeholder="Street Address" type="text" class="form-control"
                                                    value="{{$user -> street_address}}">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="phone"
                                                class="col-md-3 text-md-right col-form-label">Điện thoại</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="phone" id="phone" placeholder="Phone" type="tel"
                                                    class="form-control" value="{{$user -> phone}}">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="level"
                                                class="col-md-3 text-md-right col-form-label">Cấp bậc</label>
                                            <div class="col-md-9 col-xl-8">
                                                <select required name="level" id="level" class="form-control">
                                                    <option value="">-- Phân quyền --</option>

                                                @foreach (\App\Utilities\Constant::$user_level as $key => $value)

                                                <option value={{ $key }} {{$user->level == $key ? 'selected' : ''}}>
                                                    {{$value}}
                                                </option>

                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="description"
                                                   class="col-md-3 text-md-right col-form-label">Description</label>
                                            <div class="col-md-9 col-xl-8">
                                                <textarea name="description" id="description" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group mb-1">
                                            <div class="col-md-9 col-xl-8 offset-md-2">
                                                <a href="./admin/user" class="border-0 btn btn-outline-danger mr-1">
                                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                                        <i class="fa fa-times fa-w-20"></i>
                                                    </span>
                                                    <span>Quay lại</span>
                                                </a>

                                                <button type="submit"
                                                    class="btn-shadow btn-hover-shine btn btn-primary">
                                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                                        <i class="fa fa-download fa-w-20"></i>
                                                    </span>
                                                    <span>Lưu</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main -->
@endsection
<!-- footer begin -->
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-left">
                    <div class="footer-logo">
                        <a href="">
                            <img src="/front/img/logo.png" height="25" alt="logo">
                        </a>
                    </div>
                    <ul>
                        <li>470 Trần Đại Nghĩa, Ngũ Hành Sơn, Đà Nẵng</li>
                        <li>Phone: +84 123.456.789</li>
                        <li>Email: Vku_cafe@gmail.com</li>
                    </ul>
                    <div class="footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 off-set-lg-1">
                <div class="footer-widget">
                    <h5>Thông tin</h5>
                    <ul>
                        <li><a href="#">Về chúng tôi</a></li>
                        <li><a href="#">Thanh toán</a></li>
                        <li><a href="#">Liên hệ</a></li>
                        <li><a href="#">Câu hỏi</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 off-set-lg-1">
                <div class="footer-widget">
                    <h5>Tài khoản</h5>
                    <ul>
                        <li><a href="#">Tài khoản của tôi</a></li>
                        <li><a href="#">Giỏ hàng</a></li>
                        <li><a href="#">Cửa hàng</a></li>
                        <li><a href="#">Cà phê</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="newslatter-item">
                    <h5>Hãy liên hệ cho chúng tôi</h5>
                    <p>Chúng tôi thường trả lời sau 1 hoặc 2 ngày</p>
                    <form action="#" class="subscribe-form">
                        <input type="text" placeholder="Enter your Question ?">
                        <button type="button">Gửi ngay</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</footer>
<!-- footer end -->

<!-- tailwind CSS -->
<script src="./admin/assets/scripts/jquery-3.2.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript" src="./admin//assets/scripts/main.js"></script>
<script type="text/javascript" src="./admin//assets/scripts/my_script.js"></script>

<!-- Js Plugins -->
<script src="front/js/jquery-3.3.1.min.js"></script>
<script src="front/js/bootstrap.min.js"></script>
<script src="front/js/jquery-ui.min.js"></script>
<script src="front/js/jquery.countdown.min.js"></script>
<script src="front/js/jquery.nice-select.min.js"></script>
<script src="front/js/jquery.zoom.min.js"></script>
<script src="front/js/jquery.dd.min.js"></script>
<script src="front/js/jquery.slicknav.js"></script>
<script src="front/js/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script src="front/js/main.js"></script>
</body>

</html>
