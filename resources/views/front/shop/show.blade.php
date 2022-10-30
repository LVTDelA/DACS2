@extends('front.layout.master')

@section('title', 'Product')

@section('body')
    <!-- Breadcrumb (định vị vị trí ở web) -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.html"><i class="fa fa-home">Trang Chủ</i></a>
                        <a href="shop.html">Cửa hàng</a>
                        <span class="shop">Sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END Breadcrumb (định vị vị trí ở web) -->

    <!-- Products shop section -->
    <div class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="filter-widget">
                        <h4 class="fw-title">Loại Cà Phê</h4>
                        <ul class="filter-catagories">
                            <li><a href="#">Cao cấp</a></li>
                            <li><a href="#">Rang xay/ Hạt</a></li>
                            <li><a href="#">Hòa Tan</a></li>
                        </ul>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Hãng Cà Phê</h4>
                        <div class="fw-brand-check">
                            <div class="bc-item">
                                <label for="bc-calvin">
                                    Trung Nguyên
                                    <input type="checkbox" id="bc-calvin">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-NESCAFE">
                                    NESCAFE
                                    <input type="checkbox" id="bc-NESCAFE">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-G8">
                                    Cafe G8
                                    <input type="checkbox" id="bc-G8">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-Vinacafe">
                                    Vinacafe
                                    <input type="checkbox" id="bc-Vinacafe">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Giá cả</h4>
                        <!-- find price in shop page  -->
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" name="" id="minamount">
                                    <input type="text" name="" id="maxamount">
                                </div>
                            </div>
                            <div
                                class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="33" data-max="98">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                        <a href="#" class="filter-btn">Tìm</a>
                    </div>
                    <!-- tags -->
                    <div class="filter-widget">
                        <h4 class="fw-title">Tags</h4>
                        <div class="fw-tags">
                            <a href="#">Trung Nguyên</a>
                            <a href="#">Nescafe</a>
                            <a href="#">Cafe Arabica</a>
                            <a href="#">Cafe Chồn</a>
                            <a href="#">Cafe Cherry</a>
                            <a href="#">Cafe ROBUSTA </a>
                        </div>
                    </div>

                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- image big -->
                            <div class="product-pic-zoom">
                                <img class="product-big-img"
                                     src="front/img/product-single/{{$product->CoffeeImages[0]->path}}"
                                     alt="product-1">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <!-- image small -->
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">

                                    @foreach($product->CoffeeImages as $productImage)
                                        <div class="pt active"
                                             data-imgbigurl="front/img/product-single/{{$productImage->path}}">
                                            <img src="front/img/product-single/{{$productImage->path}}" alt="">
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <!-- title -->
                                <div class="pd-title">
                                    <span>{{$product->CoffeeCategory->name}}</span>
                                    <h3>{{$product->name}}</h3>
                                    <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                </div>
                                <!-- star -->
                                {{--                                <div class="pd-rating">--}}
                                {{--                                    <i class="fa fa-star"></i>--}}
                                {{--                                    <i class="fa fa-star"></i>--}}
                                {{--                                    <i class="fa fa-star"></i>--}}
                                {{--                                    <i class="fa fa-star"></i>--}}
                                {{--                                    <i class="fa fa-star-o"></i>--}}
                                {{--                                    <span>(5)</span>--}}
                                {{--                                </div>--}}
                                <!-- moo ta -->
                                <div class="pd-desc">
                                    <p>
                                        {{$product->description}}
                                    </p>

                                    @if($product->discount != null)
                                        <h4>{{$product->discount}} 000₫<span>{{$product->price}} 000₫</span></h4>
                                    @else
                                        <h4>{{$product->price}} 000₫ </h4>
                                    @endif
                                </div>
                                <!-- button buy -->
                                <div class="quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="1">
                                        </div>
                                        <a href="#" class="primary-btn pd-cart">Thêm giỏ hàng</a>
                                    </div>
                                </div>
                                <!-- pd-tags -->
                                {{--                                <ul class="pd-tags">--}}
                                {{--                                    <li><span>TAGS</span> : Coffee, Rang xay thường, Trung Nguyên</li>--}}
                                {{--                                </ul>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--ENd Products shop section -->

    <!-- Related Products -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Các sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($relatedProducts as $relatedProduct)

                    <div class="col-lg-3 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="/front/img/products/{{$relatedProduct->CoffeeImages[0]->path}}"
                                     alt="products1">

                                @if($relatedProduct->discount != null)
                                    <div class="sale pp-sale">Sale</div>
                                @endif
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="shop/product/{{$relatedProduct->id}}">+ Xem </a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>

                            <div class="pi-text">
                                <div class="catagory-name">{{$relatedProduct->CoffeeBrand->name}}</div>
                                <a href="shop/product/{{$relatedProduct->id}}">
                                    <h5>{{$relatedProduct->name}}</h5>
                                </a>

                                @if($relatedProduct->discount != null)
                                    <div class="product-price">
                                        {{$relatedProduct->discount}} 000₫
                                        <span>{{$product->price}} 000₫</span>
                                    </div>
                                @else
                                    {{$relatedProduct->price}} 000₫
                                @endif
                            </div>

                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
    <!-- END Related Products -->
@endsection
