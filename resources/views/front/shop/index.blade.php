@extends('front.layout.master')

@section('title', 'shop')

@section('body')

    <!-- Breadcrumb (định vị vị trí ở web) -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.html"><i class="fa fa-home">Trang Chủ</i></a>
                        <span class="shop">Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END Breadcrumb (định vị vị trí ở web) -->
    <!-- Products Shop -->
    <div class="product-shop spad">
        <div class="container">
            <div class="row">
                <!-- left column -->
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <!-- Col Phân loại bên trái page -->
                    <div class="filter-widget">
                        <h4 class="fw-title">Loại Cà Phê</h4>
                        <ul class="filter-catagories">

                            @foreach($categories as $category)
                            <li><a href="shop/{{$category->name}}">{{$category->name}}</a></li>
                            @endforeach
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
                <!-- products display part -->
                <div class="col-lg-9 order-1 order-lg-2">
                    <!-- top -->
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <form action="">
                                    <div class="select-option">
                                        <select name="sort_by" class="sorting" onchange="this.form.submit()">
                                            <option
                                                {{(request('sort_by') == 'latest') ? 'selected' : ''}} value="latest">
                                                Thời gian: Mới nhất
                                            </option>
                                            <option
                                                {{(request('sort_by') == 'oldest') ? 'selected' : ''}} value="oldest">
                                                Thời gian: Cũ nhất
                                            </option>
                                            <option
                                                {{(request('sort_by') == 'name-ascending') ? 'selected' : ''}} value="name-ascending">
                                                Tên: A-Z
                                            </option>
                                            <option
                                                {{(request('sort_by') == 'name-descending') ? 'selected' : ''}} value="name-descending">
                                                Tên: Z-A
                                            </option>
                                            <option
                                                {{(request('sort_by') == 'price-ascending') ? 'selected' : ''}} value="price-ascending">
                                                Giá: Tăng dần
                                            </option>
                                            <option
                                                {{(request('sort_by') == 'price-descending') ? 'selected' : ''}} value="price-descending">
                                                Giá: Giảm dần
                                            </option>
                                        </select>
                                        <select name="show" class="p-show" onchange="this.form.submit()">
                                            <option {{(request('show') == '3') ? 'selected' : ''}} value="3">Hiển thị:
                                                3
                                            </option>
                                            <option {{(request('show') == '6') ? 'selected' : ''}} value="6">Hiển thị:
                                                6
                                            </option>
                                            <option {{(request('show') == '9') ? 'selected' : ''}} value="9">Hiển thị:
                                                9
                                            </option>
                                            <option {{(request('show') == '12') ? 'selected' : ''}} value="12">Hiển thị:
                                                12
                                            </option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- products part -->
                    <div class="product-list">
                        <div class="row">

                            @foreach($products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img src="/front/img/products/{{$product->CoffeeImages[0]->path}}" alt="">

                                            @if($product->discount != null)
                                                <div class="sale pp-sale">Sale</div>
                                            @endif

                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a>
                                                </li>
                                                <li class="quick-view"><a href="shop/product/{{$product->id}}">+
                                                        Xem </a></li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="pi-text">
                                            <div class="catagory-name">{{$product->CoffeeBrand->name}}</div>
                                            <a href="shop/product/{{$product->id}}">
                                                <h5>{{$product->name}}</h5>
                                            </a>

                                            @if($product->discount != null)
                                                <div class="product-price">
                                                    {{$product->discount}} 000₫
                                                    <span>{{$product->price}} 000₫</span>
                                                </div>
                                            @else
                                                {{$product->price}}
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    {{$products->links()}}
                </div>

            </div>
        </div>
    </div>
    <!-- END Products Shop -->

@endsection
