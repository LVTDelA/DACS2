@extends('admin.layout.master')

@section('title','Show Coffee Product')

@section('body')

    <!-- Main -->
                <div class="app-main__inner">

                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>
                                    Sản phẩm
                                    <div class="page-title-subheading">
                                        Xem, tạo, sửa , xóa và quản lý
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body display_data">

                                    <div class="position-relative row form-group">
                                        <label for="" class="col-md-3 text-md-right col-form-label">Ảnh</label>
                                        <div class="col-md-9 col-xl-8">
                                            <ul class="text-nowrap overflow-auto" id="images">
                                                @foreach($product->CoffeeImages as $coffeeImages)
                                                <li class="d-inline-block mr-1" style="position: relative;">
                                                    <img style="height: 150px;" src="./front/img/products/{{$coffeeImages->path}}"
                                                        alt="Image">
                                                </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="brand_id"
                                            class="col-md-3 text-md-right col-form-label">Hình ảnh sản phẩm</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p><a href="./admin/product/{{$product->id}}/image">Quản lý hình ảnh</a></p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="brand_id"
                                            class="col-md-3 text-md-right col-form-label">Thông tin sản phẩm</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p><a href="./admin/product/{{$product->id}}/edit">Quản lý thông tin</a></p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="brand_id"
                                            class="col-md-3 text-md-right col-form-label">Nhãn hiệu</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$product->CoffeeBrand->name}}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="product_category_id"
                                            class="col-md-3 text-md-right col-form-label">Thể loại</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$product->CoffeeCategory->name}}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="name" class="col-md-3 text-md-right col-form-label">Tên</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$product->name}}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="price"
                                            class="col-md-3 text-md-right col-form-label">Giá cả</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$product->price}}.000 vnđ</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="discount"
                                            class="col-md-3 text-md-right col-form-label">Giảm giá</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$product->discount}}.000 vnđ</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="weight"
                                            class="col-md-3 text-md-right col-form-label">Số lượng</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$product->weight}}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="description"
                                            class="col-md-3 text-md-right col-form-label">Mô tả</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{!!$product->description!!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main -->
@endsection
