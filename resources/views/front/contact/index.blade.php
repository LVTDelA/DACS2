@extends("front.layout.master")

@section("title", "Contact")

@section("body")

    <!-- Breadcrumb (định vị vị trí ở web) -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home">Trang Chủ</i></a>
                        <span>Liên hệ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END Breadcrumb (định vị vị trí ở web) -->

    <!-- Google Map -->
    <div class="map spad">
        <div class="container">
            <div class="map-inner">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.733396098416!2d108.252355!3d15.975293100000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2sVietnam%20-%20Korea%20University%20of%20Information%20and%20Communication%20Technology.!5e0!3m2!1sen!2s!4v1666704128748!5m2!1sen!2s"
                    height="610" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="icon">
                    <i class="fa fa-map-marker"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- End Google Map -->

    <!-- Contact Section -->
    <div class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-title">
                        <h4>Liên hệ cho chúng tôi</h4>
                        <p>Chúng tôi luôn luôn sẵn sàng chào đón các bạn</p>
                    </div>
                    <div class="contact-widget">
                        <!-- map -->
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="ci-text">
                                <span>Địa chỉ:</span>
                                <p>470 Đường Trần Đại Nghĩa, Khu đô thị, Ngũ Hành Sơn, Đà Nẵng</p>
                            </div>
                        </div>
                        <!-- phone -->
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <span>Điện thoại:</span>
                                <p>+84 123.456.789</p>
                            </div>
                        </div>
                        <!-- email -->
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p>tranquangbun293@gmail.com</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 off-set-lg-1">
                    <div class="contact-form">
                        <div class="leave-comment">
                            <h4>Lời nhắn với chúng tôi:</h4>
                            <p>Chúng tôi sẽ liên hệ lại và trả lời bạn.</p>
                            <form action="#" class="comment-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Tên của bạn">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Email của bạn">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Lời nhắn"> </textarea>
                                        <button type="submit" class="site-btn">Gửi lời nhắn</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Section -->

@endsection
