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
                    @include('front.shop.components.products-sidebar-filter')
                </div>
                <!-- products display part -->
                <div class="col-lg-9 order-1 order-lg-2">
                    <!-- top -->
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <form action="">
                                    @foreach(array_keys(request()->brand ?? []) as $brand_id)
                                        <input type="hidden" name="brand[{{$brand_id}}]" value="on">
                                    @endforeach

                                        <input type="hidden" name="price_min" value="{{request()->price_min}}">
                                        <input type="hidden" name="price_max" value="{{request()->price_max}}">

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
                                    @include('front.components.product-item')
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
