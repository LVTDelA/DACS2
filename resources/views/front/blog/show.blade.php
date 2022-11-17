@extends('front.layout.master')

@section('title', 'Blog')

@section('body')

<div class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-details-inner">
                    <div class="blog-detail-title">
                        <h2>Nên chọn phin pha cà phê nhôm hay inox ?</h2>
                        <p>Cà phê sức khỏe <span>25/10/2022</span></p>
                    </div>
                    <div class="blog-large-pic">
                        <img src="/img/blog/detail-blog-1.jpg" alt="" class="fix_img_blog">
                    </div>
                    <div class="blog-detail-desc">
                        <p>
                            Trên thị trường hiện nay, dựa vào chất liệu phin pha cà phê được xuất hiện dưới hai loại là:
                            phin làm bằng nhôm và phin làm bằng inox. Phin nhôm đã xuất xuất hiện kể từ khi chúng ta
                            biết dùng tới cà phê, còn phin làm từ inox chỉ mới xuất hiện từ vài năm trở lại đây.
                            Nâu phin Trung Nguyên ( Phin Nhôm )
                            <br>
                            Để dễ dàng cho việc trả lời câu hỏi nên chọn loại phin nào, chúng tôi xin đưa ra các phân
                            tích về sự khác nhau giữa hai loại phin này:
                            <br>
                            <b>Phin Inox:</b>
                            <br>
                            Màu sắc: So với phin nhôm, phin làm từ inox rất bóng bẩy, màu sắc bắt mắt hơn.
                            Giá: inox có giá thành đắt đỏ nên có thể dễ hiểu, phin được làm từ inox sẽ có giá khá.
                            Độ bền: do được là từ inox nên nếu dùng về lâu về dài thì chắc hẳn phin inox sẽ bền hơn và
                            cũng khó xảy ra xay xước.
                            Lỗ ở đáy phin nhôm: trên thị trường hiện nay thì các sản phẩm phin làm bằng inox sẽ có lỗ
                            khá lớn, không phủ kín đáy phin.
                            Đặc tính dẫn nhiệt: kém, hấp thụ nhiệt độ cao.
                            <br>
                            <b>Phin nhôm:</b>
                            <br>
                            Giá: thấp hơn phin inox ở cùng kích thước.
                            Màu sắc: màu của phin nhôm có cảm giác nhẹ hơn, nhám, không bóng bẩy như inox.
                            Độ bền: phin được làm từ nhôm có kết cấu tương đối yếu, dễ bị móp méo và xay xước hơn.
                            Lỗ ở đáy phin: phân bổ đều, nhỏ.
                            Đặc tính dẫn nhiệt: cao, ít hấp thụ nhiệt.
                        </p>
                    </div>
                    <!-- another post blog -->
                    <div class="blog-post">
                        <div class="row">
                            <div class="col-lg-5 col-md-6">
                                <a href="#" class="prev-blog">
                                    <div class="pb-pic">
                                        <i class="ti-arrow-left"></i>
                                        <img src="img/blog/prev-blog.png" alt="">
                                    </div>
                                    <div class="pb-text">
                                        <span>Bài viết trước</span>
                                        <h5>Có gì bên trong 1 quầy pha chế cà phê ?</h5>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-5 col-md-6 offset-lg-2">
                                <a href="#" class="next-blog">
                                    <div class="nb-pic">
                                        <img src="img/blog/next-blog.png" alt="">
                                        <i class="ti-arrow-right"></i>
                                    </div>
                                    <div class="nb-text">
                                        <span>Bài viết tiếp:</span>
                                        <h5>Workshop "Cold brew - xu hướng cà phê lạnh"</h5>

                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- comment for customer -->
                    <div class="leave-comment">
                        <h4>Để lại bình luận :</h4>
                        <form action="#" class="comment-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Tên">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea type="text" placeholder="Lời nhắn"> </textarea>
                                    <button type="submit" class="site-btn">Gửi bình luận</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
