@extends("front.layout.master")

@section("title", "Home")

@section("body")
<!-- body -->
<section class="hero-section">
    <div class="hero-items owl-carousel">
        <div class="single-hero-items set-bg " data-setbg="front/img/hero-1.jpeg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Cà phê </span>
                        <h1 class="h1hero1">VKU Cafe</h1>
                        <p>Tự hào là đơn vị hàng đầu cung cấp cho các siêu thị và cửa hàng trên toàn quốc</p>
                        <a href="#" class="primary-btn">Mua ngay</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-hero-items set-bg" data-setbg="front/img/hero-2.png">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Siêu giảm giá</span>
                        <h1>Black Friday</h1>
                        <p>Sự tin tưởng tiêu dùng của các bạn là sự tự hào của chúng tôi </p>
                        <a href="#" class="primary-btn">Mua ngay</a>
                    </div>
                </div>

                <div class="off-card">
                    <h2>Sale <span>50%</span></h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- banner section -->
<div class="banner-section spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="front/img/banner-1.jpg" alt="Banner 1 jpg">
                    <div class="inner-text">
                        <h4>Cà phê rang xay</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="front/img/banner-2.jpg" alt="Banner 1 jpg">
                    <div class="inner-text">
                        <h4>Cà phê hạt</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="front/img/banner-3.png" alt="Banner 1 jpg">
                    <div class="inner-text">
                        <h4>Cà phê cao cấp</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end banner section -->

<!-- products -->

<!-- Cà phê rang xay -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2>Cà phê rang xay</h2>
            </div>
        </div>
    </div>
</div>
<section class="rangxay-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="filter-control">
                    <ul>
                        <li>Trong nước</li>
                        <li>Ngoài nước</li>
                        <li>Xuất khẩu</li>
                    </ul>
                </div>
                <div class="product-slider owl-carousel">
                    @foreach($product3s as $product3)
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="/front/img/products/{{$product3->CoffeeImages[0]->path}}" alt="">

                            @if($product3->discount != null)
                            <div class="sale">Sale</div>
                            @endif

                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>

                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="products.html">+ Xem </a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{$product3->CoffeeBrand->name}}</div>
                            <a href="#">
                                <h5>{{$product3->name}}</h5>
                            </a>
                            <div class="product-price">
                                @if($product3->discount != null)
                                {{$product3->price}} 000₫
                                <span>{{$product3->discount}} 000₫</span>
                                @else
                                {{$product3->price}} 000₫
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="product-large set-bg" data-setbg="front/img/products/rangxay-large.jpg">
                    <h2>Cafe Rang Xay</h2>
                    <a href="#">Xem thêm</a>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Cà phê hạt -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2>Cà phê hạt</h2>
            </div>
        </div>
    </div>
</div>
<section class="cafehat-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="product-large set-bg" data-setbg="front/img/products/cafe-large.jpg">
                    <h2>Cafe Hạt</h2>
                    <a href="#">Xem thêm</a>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-1">
                <div class="filter-control">
                    <ul>
                        <li>Trong nước</li>
                        <li>Ngoài nước</li>
                        <li>Xuất khẩu</li>
                    </ul>
                </div>
                <div class="product-slider owl-carousel">

                    @foreach($product2s as $product2)
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="/front/img/products/{{$product2->CoffeeImages[0]->path}}" alt="">

                            @if($product2->discount != null)
                            <div class="sale">Sale</div>
                            @endif

                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>

                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="products.html">+ Xem </a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{$product2->CoffeeBrand->name}}</div>
                            <a href="#">
                                <h5>{{$product2->name}}</h5>
                            </a>
                            <div class="product-price">
                                @if($product2->discount != null)
                                {{$product2->price}} 000₫
                                <span>{{$product2->discount}} 000₫</span>
                                @else
                                {{$product2->price}} 000₫
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cà phê cao cấp -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2>Cà phê cao cấp</h2>
            </div>
        </div>
    </div>
</div>
<section class="rangxay-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="filter-control">
                    <ul>
                        <li>Trong nước</li>
                        <li>Ngoài nước</li>
                        <li>Xuất khẩu</li>
                    </ul>
                </div>
                <div class="product-slider owl-carousel">
                    @foreach($product1s as $product1)
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="/front/img/products/{{$product1->CoffeeImages[0]->path}}" alt="">

                            @if($product1->discount != null)
                            <div class="sale">Sale</div>
                            @endif

                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>

                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="products.html">+ Xem </a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{$product1->CoffeeBrand->name}}</div>
                            <a href="#">
                                <h5>{{$product1->name}}</h5>
                            </a>
                            <div class="product-price">
                                @if($product1->discount != null)
                                {{$product1->price}} 000₫
                                <span>{{$product1->discount}} 000₫</span>
                                @else
                                {{$product1->price}} 000₫
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="product-large set-bg" data-setbg="front/img/products/rangxay-large.jpg">
                    <h2>Cafe Rang Xay</h2>
                    <a href="#">Xem thêm</a>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- end products -->
<!-- instagram section -->
<div class="instagram-photo">
    <div class="insta-item set-bg" data-setbg="front/img/insta-1.jpg">
        <div class="inside-text">
            <div class="ti-instagram">
                <h5><a href="#">TranQuang</a></h5>
            </div>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="front/img/insta-2.jpg">
        <div class="inside-text">
            <div class="ti-instagram">
                <h5><a href="#">TranQuang</a></h5>
            </div>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="front/img/insta-3.jpg">
        <div class="inside-text">
            <div class="ti-instagram">
                <h5><a href="#">TranQuang</a></h5>
            </div>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="front/img/insta-4.jpg">
        <div class="inside-text">
            <div class="ti-instagram">
                <h5><a href="#">TranQuang</a></h5>
            </div>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="front/img/insta-5.jpg">
        <div class="inside-text">
            <div class="ti-instagram">
                <h5><a href="#">TranQuang</a></h5>
            </div>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="front/img/insta-6.jpg">
        <div class="inside-text">
            <div class="ti-instagram">
                <h5><a href="#">TranQuang</a></h5>
            </div>
        </div>
    </div>
</div>
<!--end instagram section -->

<!-- blog secion -->
<div class="latest-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>BLOG</h2>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                    <img src="front/img//blog/{{$blog->image}}" alt="blog 1">
                    <div class="latest-text">
                        <div class="tag-list">
                            <div class="tag-item">
                                <i class="fa fa-calendar-o"></i> 
                                {{date('M d, Y', strtotime($blog->created_at))}}
                            </div>
                            <!-- <div class="tag-item">
                                <i class="fa fa-comment-o"></i> 12(cần bỏ)
                            </div> -->
                        </div>
                        <a href="#">
                            <h4>{{$blog->title}}</h4>
                        </a>
                        <p>{{$blog->subtitle}}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <!-- ship part -->
        <div class="benefit-items">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="front/img/icon-1.png" alt="icon truck">
                        </div>
                        <div class="sb-text">
                            <h6>Free Shipping</h6>
                            <p>Cho các đơn trên 500.000đ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="front/img/icon-2.png" alt="icon clock">
                        </div>
                        <div class="sb-text">
                            <h6>DELIVER ON TIME</h6>
                            <p>Nếu có vấn đề được đổi trả</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="front/img/icon-3.png" alt="icon card">
                        </div>
                        <div class="sb-text">
                            <h6>SECURE PAYMENT</h6>
                            <p>Mọi hóa đơn của bạn điều được bảo mật</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end blog secion -->

<!-- end body page -->
@endsection