<?php

namespace Boye\Repositories;

use Boye\Category;

class CategoryRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function getByName($title)
    {
        return $this->model->where('title', $title)->first();
    }
}
