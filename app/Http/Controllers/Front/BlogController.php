<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Blog\BlogServiceInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogService;

    public function __construct(BlogServiceInterface $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index() {
        $blogs = $this->blogService->getAllAndPaginate();

        $latestBlogs = $this->blogService->getLatestBlogs();

        return view('front.blog.index', compact('blogs', 'latestBlogs'));
    }

    public function show($id) {
        $blog = $this->blogService->find($id);

        return view('front.blog.show', compact('blog'));
    }
}
