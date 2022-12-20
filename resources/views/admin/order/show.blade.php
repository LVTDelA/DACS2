@extends('admin.layout.master')

@section('title','Order Coffee')

@section('body')

    <!-- Main -->
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-shopbag icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>
                                    Đơn hàng
                                    <div class="page-title-subheading">
                                        Xem, tạo, sửa , xóa và quản lý.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body display_data">

                                    <div class="table-responsive">
                                        <h2 class="text-center">Danh sách sản phẩm</h2>
                                        <hr>
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th class="text-center">Số lượng</th>
                                                    <th class="text-center">Đơn giá</th>
                                                    <th class="text-center">Tổng tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order->orderDetails as $orderDetail)
                                                <tr>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <div class="widget-content-left">
                                                                        <img style="height: 60px;"
                                                                            data-toggle="tooltip" title="Image"
                                                                            data-placement="bottom"
                                                                             src="front/img/products/{{$orderDetail->coffeeProduct->CoffeeImages[0]->path}}" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">{{$orderDetail->coffeeProduct->name}}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        {{$orderDetail->qty}}
                                                    </td>
                                                    <td class="text-center">{{$orderDetail->amount}}</td>
                                                    <td class="text-center">
                                                        {{$orderDetail->total}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>



                                    <h2 class="text-center mt-5">Thông tin đặt hàng</h2>
                                        <hr>
                                    <div class="position-relative row form-group">
                                        <label for="name" class="col-md-3 text-md-right col-form-label">
                                            Họ tên khách hàng:
                                        </label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$order->first_name . ' ' . $order->last_name}}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$order->email}}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="phone" class="col-md-3 text-md-right col-form-label">Điện thoại:</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$order->phone}}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="street_address" class="col-md-3 text-md-right col-form-label">
                                            Street Address</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$order->street_address}}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="country"
                                            class="col-md-3 text-md-right col-form-label">Đất nước</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$order->country}}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="payment_type" class="col-md-3 text-md-right col-form-label">Hình thức thanh toán</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$order->payment_type}}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="status" class="col-md-3 text-md-right col-form-label">Trạng thái</label>
                                        <div class="col-md-9 col-xl-8">
                                            <div class="badge badge-dark mt-2">
                                                    {{App\Utilities\Constant::$order_status[$order->status]}}
{{--                                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">--}}
{{--                                                    <option selected>Tuỳ chỉnh trạng thái đơn hàng :</option>--}}
{{--                                                    <option {{$this->orderService->update(['status' => Constant::order_status_ReceiveOrder])}} value="1">--}}
{{--                                                        Nhận đơn--}}
{{--                                                    </option>--}}
{{--                                                    <option {{$this->orderService->update(['status' => Constant::order_status_Unconfirmed])}} value="2">--}}
{{--                                                        Chưa xác nhận đơn--}}
{{--                                                    </option>--}}
{{--                                                    <option {{$this->orderService->update(['status' => Constant::order_status_Confirmed])}} value="3">--}}
{{--                                                        Đã xác nhận--}}
{{--                                                    </option>--}}
{{--                                                    <option {{$this->orderService->update(['status' => Constant::order_status_Paid])}} value="4">--}}
{{--                                                        Đã trả trước--}}
{{--                                                    </option>--}}
{{--                                                    <option {{$this->orderService->update(['status' => Constant::order_status_Processing])}} value="5">--}}
{{--                                                        Xử lý--}}
{{--                                                    </option>--}}
{{--                                                    <option {{$this->orderService->update(['status' => Constant::order_status_Shipping])}} value="6">--}}
{{--                                                        Đang giao hàng--}}
{{--                                                    </option>--}}
{{--                                                    <option {{$this->orderService->update(['status' => Constant::order_status_Finish])}} value="7">--}}
{{--                                                        Hoàn thành--}}
{{--                                                    </option>--}}
{{--                                                    <option {{$this->orderService->update(['status' => Constant::order_status_Cancel])}} value="8">--}}
{{--                                                        Hủy đơn--}}
{{--                                                    </option>--}}
{{--                                                </select>--}}

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main -->
@endsection
