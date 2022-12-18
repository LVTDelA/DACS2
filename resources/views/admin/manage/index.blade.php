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

                                <select name="statisticsBy" class="form-control">
                                    <option value="day">Thống kê theo: Ngày</option>
                                    <option value="month">Thống kê theo: Tháng</option>
                                    <option value="year">Thống kê theo: Năm</option>
                                </select>

                                <label class="css-date-chart" for="startDate">Ngày bắt đầu</label>
                                <input type="date" name="startDate" class="form-control" id="startDate">
                                <label class="css-date-chart" for="endtDate">Ngày kết thúc</label>
                                <input type="date" name="endDate" class="form-control" id="endDate">

                                <a  onclick="drawLineCharts()" class="btn btn-success css-btn-chart">
                                    Thống kê
                                </a>
                            </div>
                        </form>

                    </div>
                    {{--Chart--}}
                    <div class="shadow p-3 mb-5 bg-white rounded">
                    <h2 class="text-center css-date-chart" >Biểu đồ đường thống kê doanh thu</h2>
                    <div id="area-chart" style="height: 250px; width: 970px"></div>
                    </div>
                    <br>
                    <div class="shadow p-3 mb-5 bg-white rounded">
                    <h2 class="text-center css-date-chart" >Biểu đồ tròn thống kê sản phẩm bán được</h2>
                    <div id="donut-chart" style="height: 400px; width: 1100px"></div>
                    </div>
                    <div class="d-block card-footer">

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
