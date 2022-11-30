@extends('admin.layout.master')

@section('title','Manage')

@section('body')

    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-graph3 icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Quản lý/ Thống Kê Doanh Thu
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

                    <div class="card-header">

                        <form id="line-charts">
                            <div class="input-group center">
                                {{--                                            <input type="search" name="search" id="search"--}}
                                {{--                                                placeholder="Tìm kiếm" class="form-control">--}}
                                {{--                                            <span class="input-group-append">--}}
                                {{--                                                <button type="submit" class="btn btn-primary">--}}
                                {{--                                                    <i class="fa fa-search"></i>&nbsp;--}}
                                {{--                                                   Tìm kiếm--}}
                                {{--                                                </button>--}}
                                {{--                                            </span>--}}

                                <select name="statisticsBy" class="form-control">
                                    <option value="day">Thống kê theo: Ngày</option>
                                    <option value="month">Thống kê theo: Tháng</option>
                                    <option value="year">Thống kê theo: Năm</option>
                                </select>

                                <label for="startDate">Ngày bắt đầu</label>
                                <input type="date" name="startDate" class="form-control" id="startDate">
                                <label for="endtDate">Ngày kết thúc</label>
                                <input type="date" name="endDate" class="form-control" id="endDate">

                                <a onclick="drawLineCharts()" class="btn btn-primary">
                                    Thống kê
                                </a>
                            </div>
                        </form>

                    </div>
                    {{--Chart--}}
                    <div id="chart" style="height: 250px; width: 1100px"></div>
                    <br>
                    <div id="chartbar" style="height: 250px; width: 1100px"></div>
                    {{--                                <div class="table-responsive">--}}
                    {{--                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">--}}
                    {{--                                        <thead>--}}
                    {{--                                            <tr>--}}
                    {{--                                                <th class="text-center">ID</th>--}}
                    {{--                                                <th>Name / Brand</th>--}}
                    {{--                                                <th class="text-center">Price</th>--}}
                    {{--                                                <th class="text-center">Qty</th>--}}
                    {{--                                                <th class="text-center">Featured</th>--}}
                    {{--                                                <th class="text-center">Actions</th>--}}
                    {{--                                            </tr>--}}
                    {{--                                        </thead>--}}

                    {{--                                        <tbody>--}}

                    {{--                                            <tr>--}}
                    {{--                                                <td class="text-center text-muted">#01</td>--}}
                    {{--                                                <td>--}}
                    {{--                                                    <div class="widget-content p-0">--}}
                    {{--                                                        <div class="widget-content-wrapper">--}}
                    {{--                                                            <div class="widget-content-left mr-3">--}}
                    {{--                                                                <div class="widget-content-left">--}}
                    {{--                                                                    <img style="height: 60px;"--}}
                    {{--                                                                        data-toggle="tooltip" title="Image"--}}
                    {{--                                                                        data-placement="bottom"--}}
                    {{--                                                                        src="assets/images/_default-product.jpg" alt="">--}}
                    {{--                                                                </div>--}}
                    {{--                                                            </div>--}}
                    {{--                                                            <div class="widget-content-left flex2">--}}
                    {{--                                                                <div class="widget-heading">Pure Pineapple</div>--}}
                    {{--                                                                <div class="widget-subheading opacity-7">--}}
                    {{--                                                                    Calvin Klein--}}
                    {{--                                                                </div>--}}
                    {{--                                                            </div>--}}
                    {{--                                                        </div>--}}
                    {{--                                                    </div>--}}
                    {{--                                                </td>--}}
                    {{--                                                <td class="text-center">$599.00</td>--}}
                    {{--                                                <td class="text-center">25</td>--}}
                    {{--                                                <td class="text-center">--}}
                    {{--                                                    <div class="badge badge-success mt-2">--}}
                    {{--                                                        True--}}
                    {{--                                                    </div>--}}
                    {{--                                                </td>--}}
                    {{--                                                <td class="text-center">--}}
                    {{--                                                    <a href="./product-show.html"--}}
                    {{--                                                        class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">--}}
                    {{--                                                        Details--}}
                    {{--                                                    </a>--}}
                    {{--                                                    <a href="./product-edit.html" data-toggle="tooltip" title="Edit"--}}
                    {{--                                                        data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">--}}
                    {{--                                                        <span class="btn-icon-wrapper opacity-8">--}}
                    {{--                                                            <i class="fa fa-edit fa-w-20"></i>--}}
                    {{--                                                        </span>--}}
                    {{--                                                    </a>--}}
                    {{--                                                    <form class="d-inline" action="" method="post">--}}
                    {{--                                                        <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"--}}
                    {{--                                                            type="submit" data-toggle="tooltip" title="Delete"--}}
                    {{--                                                            data-placement="bottom"--}}
                    {{--                                                            onclick="return confirm('Do you really want to delete this item?')">--}}
                    {{--                                                            <span class="btn-icon-wrapper opacity-8">--}}
                    {{--                                                                <i class="fa fa-trash fa-w-20"></i>--}}
                    {{--                                                            </span>--}}
                    {{--                                                        </button>--}}
                    {{--                                                    </form>--}}
                    {{--                                                </td>--}}
                    {{--                                            </tr>--}}


                    {{--                                        </tbody>--}}
                    {{--                                    </table>--}}
                    {{--                                </div>--}}

                    <div class="d-block card-footer">

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
