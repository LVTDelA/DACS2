<?php

namespace App\Repositories\Blog;

use App\Models\Blog;
use App\Repositories\BaseRepositories;

class BlogRepository extends BaseRepositories implements BrandRepositoryInterface
{

    public function getModel()
    {
        return BLog::class;
    }

    public function getLatestBrands($limit = 3)
    {
        return $this->model->orderBy('id', 'desc')
            ->limit($limit)
            ->get();
    }
}
