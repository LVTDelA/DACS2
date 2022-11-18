@extends('admin.layout.master')

@section('title','Product Create')

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
                                <div class="card-body">
                                    <form method="post" action="admin/product" enctype="multipart/form-data">
                                        @csrf
                                        <div class="position-relative row form-group">
                                            <label for="brand_id"
                                                class="col-md-3 text-md-right col-form-label">Nhãn hàng</label>
                                            <div class="col-md-9 col-xl-8">
                                                <select required name="id_coffee_brand" id="id_coffee_brand" class="form-control">
                                                    <option value="">-- Nhãn hàng --</option>
                                                    @foreach($brands as $brand)
                                                    <option value={{$brand -> id}}>
                                                        {{$brand -> name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="product_category_id"
                                                class="col-md-3 text-md-right col-form-label">Loại</label>
                                            <div class="col-md-9 col-xl-8">
                                                <select required name="id_coffee_category" id="id_coffee_category" class="form-control">
                                                    <option value="">-- Loại cà phê --</option>
                                                    @foreach($productCategories as $productCategory)
                                                        <option value={{$productCategory -> id}}>
                                                            {{$productCategory -> name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Tên</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="name" id="name" placeholder="Tên" type="text"
                                                    class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="price"
                                                class="col-md-3 text-md-right col-form-label">Giá cả</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="price" id="price"
                                                    placeholder="Giá cả" type="text" class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="discount"
                                                class="col-md-3 text-md-right col-form-label">Giá ban đầu</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="discount" id="discount"
                                                    placeholder="Giá ban đầu" type="text" class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="weight"
                                                class="col-md-3 text-md-right col-form-label">Số sản phẩm</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="weight" id="weight"
                                                    placeholder="Sản phầm tồn hàng" type="text" class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="description"
                                                class="col-md-3 text-md-right col-form-label">Mô tả</label>
                                            <div class="col-md-9 col-xl-8">
                                                <textarea class="form-control" name="description" id="description" placeholder="Nhập thông tin sản phẩm"></textarea>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group mb-1">
                                            <div class="col-md-9 col-xl-8 offset-md-2">
                                                <a href="./admin/product" class="border-0 btn btn-outline-danger mr-1">
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
{{--CK Edit for description--}}
                <script src="http://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

                <script>
                    CKEDITOR.replace('description');
                </script>
@endsection
