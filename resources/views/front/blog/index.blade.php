@extends('front.layout.master')

@section('title', 'Blog')

@section('body')

    <!-- Breadcrumb (định vị vị trí ở web) -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home">Trang Chủ</i></a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END Breadcrumb (định vị vị trí ở web) -->

    <!-- Blog section -->
    <div class="blog-section spad">
        <div class="container">
            <div class="row">
                <!-- column left of page -->
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                    <!-- cột bên trái (sidebar) -->
                    <div class="blog-sidebar">
                        <div class="search-form">
                            <h4>Tìm kiếm</h4>
                            <form action="#">
                                <input type="text" placeholder="Nhập vào đây">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
{{--                        <div class="blog-catagory">--}}
{{--                            <h4>Thể loại</h4>--}}
{{--                            <ul>--}}
{{--                                <li><a href="#">Cafe tốt</a></li>--}}
{{--                                <li><a href="#">Thưởng thức</a></li>--}}
{{--                                <li><a href="#">Sức khỏe</a></li>--}}
{{--                                <li><a href="#">Cafe mới</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <div class="recent-post">
                            <h4>Recent Post</h4>
                            <div class="recent-blog">

                                @foreach($latestBlogs as $blog)
                                <a href="./blog/{{$blog->id}}" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="front/img/blog/{{$blog->image}}" alt="{{$blog->image}}">
                                    </div>
                                    <div class="rb-text">
                                        <h6>{{$blog->title}}</h6>
                                        <p><span>{{date('M d, Y', strtotime($blog->created_at))}}</span></p>
                                    </div>
                                </a>
                                @endforeach

                            </div>
                        </div>
{{--                        <div class="blog-tags">--}}
{{--                            <h4>Blog Tags</h4>--}}
{{--                            <div class="tag-item">--}}
{{--                                <a href="#">Cà phê sức khỏe</a>--}}
{{--                                <a href="#">Cà phê thơm</a>--}}
{{--                                <a href="#">Cà phê cao cấp</a>--}}
{{--                                <a href="#">Lợi ích cà phê</a>--}}
{{--                                <a href="#">Cà phê sắc đẹp</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <!-- right of page (blog) -->
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2>BLOG</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        @foreach($blogs as $blog)
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="front/img/blog/{{$blog->image}}" alt="{{$blog->image}}">
                                </div>
                                <div class="bi-text">
                                    <a href="./blog/{{$blog->id}}">
                                        <h4>{{$blog->title}}</h4>
                                    </a>
                                    <p><span><i class="fa fa-calendar-o" style="color: #e7ab3c;"></i> {{date('M d, Y', strtotime($blog->created_at))}}</span></p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    {{$blogs->links()}}
                </div>

            </div>
        </div>
    </div>
    <!-- END Blog section -->

@endsection
