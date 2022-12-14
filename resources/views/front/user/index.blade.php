@extends('front.layout.master')

@section('title', 'User')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form method="POST" action="account/user/{{$user->id}}" enctype="multipart/form-data">
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
                            <label for="description"
                                   class="col-md-3 text-md-right col-form-label">Description</label>
                            <div class="col-md-9 col-xl-8">
                                <textarea name="description" id="description"
                                          class="form-control">{{$user->description}}</textarea>
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

                        <div>

                            <div class="position-relative row form-group">
                                <label for="password"
                                       class="col-md-3 text-md-right col-form-label">Mật khẩu cũ</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="oldPassword" id="oldPassword" type="password"
                                           class="form-control" autocomplete="off" placeholder="Old password">
                                </div>
                            </div>


                            <div class="position-relative row form-group">
                                <label for="password"
                                       class="col-md-3 text-md-right col-form-label">Mật khẩu mới</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="password" id="password" type="password" placeholder="New password"
                                           class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="password_confirmation"
                                       class="col-md-3 text-md-right col-form-label">Xác nhận mật khẩu mới</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="password_confirmation" id="password_confirmation"
                                           placeholder="Confirm Password" type="password"
                                           class="form-control" value="">
                                </div>
                            </div>

                        </div>

                        <div class="position-relative row form-group mb-1">
                            <div class="col-md-9 col-xl-8 offset-md-2">
                                <a href="./" class="border-0 btn btn-outline-danger mr-1">
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
