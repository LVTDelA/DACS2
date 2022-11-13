<?php

namespace App\Service\Blog;

use App\Repositories\Blog\BlogRepositoryInterface;
use App\Service\BaseService;

class BlogService extends BaseService implements BlogServiceInterface
{
    public $repository;

    public function __construct(BlogRepositoryInterface $categoryRepository)
    {
        $this->repository = $categoryRepository;
    }

    public function getLatestBlogs($limit = 3)
    {
        return $this->repository->getLatestBlogs($limit);
    }

}
