<?php

namespace App\Repositories\Blog;

use App\Models\Blog;
use App\Repositories\BaseRepositories;

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
}
