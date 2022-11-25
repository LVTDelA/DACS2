@extends('front.layout.master')

@section('title', 'Blog')

@section('body')

<div class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-details-inner">
                    <div class="blog-detail-title">
                        <h2>{{$blog->title}}</h2>
                        <p><span>{{date('M d, Y', strtotime($blog->created_at))}}</span></p>
                    </div>
                    <div class="blog-large-pic">
                        <img src="/front/img/blog/{{$blog->image}}" alt="{{$blog->image}}" class="fix_img_blog">
                    </div>
                    <div class="blog-detail-desc">
                        {!!  $blog->content !!}
                    </div>
                    <!-- another post blog -->
                    <div class="blog-post">
                        <div class="row">

                            @if($preBlog)
                            <div class="col-lg-5 col-md-6">
                                <a href="./blog/{{$preBlog->id}}" class="prev-blog">
                                    <div class="pb-pic">
                                        <i class="ti-arrow-left"></i>
                                        <img src="front/img/blog/{{$preBlog->image}}" alt="">
                                    </div>
                                    <div class="pb-text">
                                        <span>Bài viết trước</span>
                                        <h5>{{$preBlog->title}}</h5>
                                    </div>
                                </a>
                            </div>
                            @endif

                            @if($nextBlog)
                            <div class="col-lg-5 col-md-6 offset-lg-2">
                                <a href="./blog/{{$nextBlog->id}}" class="next-blog">
                                    <div class="nb-pic">
                                        <img src="front/img/blog/{{$nextBlog->image}}" alt="{{$nextBlog->image}}">
                                        <i class="ti-arrow-right"></i>
                                    </div>
                                    <div class="nb-text">
                                        <span>Bài viết tiếp</span>
                                        <h5>{{$nextBlog->title}}</h5>
                                    </div>
                                </a>
                            </div>
                                @endif

                        </div>
                    </div>
                    <!-- comment for customer -->
{{--                    <div class="leave-comment">--}}
{{--                        <h4>Để lại bình luận :</h4>--}}
{{--                        <form action="#" class="comment-form">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <input type="text" placeholder="Tên">--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <input type="text" placeholder="Email">--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-12">--}}
{{--                                    <textarea type="text" placeholder="Lời nhắn"> </textarea>--}}
{{--                                    <button type="submit" class="site-btn">Gửi bình luận</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
