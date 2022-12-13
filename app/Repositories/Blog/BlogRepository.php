<?php

namespace App\Repositories\Blog;

use App\Models\Blog;
use App\Repositories\BaseRepositories;
use App\Repositories\Brand\BrandRepositoryInterface;


class BlogRepository extends BaseRepositories implements BlogRepositoryInterface
{

    public function getModel()
    {
        return BLog::class;
    }

    public function getLatestBlogs($limit = 3)
    {
        return $this->model->orderBy('id', 'desc')
            ->limit($limit)
            ->get();
    }

    public function getPreAndNextBlog($id)
    {
//        dd($this->model->all());
        $preBlog = $this->model->where('id', '<', $id)->orderBy('id', 'desc')->first();
        $nextBlog = $this->model->where('id', '>', $id)->first();

        return [$preBlog, $nextBlog];
    }
}
