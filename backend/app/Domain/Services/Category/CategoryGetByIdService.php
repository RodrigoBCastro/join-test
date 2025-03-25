<?php

namespace App\Domain\Services\Category;

use App\Domain\Models\Category;
use App\Domain\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryGetByIdService
{
    public function __construct(
        private CategoryRepositoryInterface $categoryRepository
    ) {
    }

    public function __invoke(int $id): Category
    {
        return $this->categoryRepository->getById($id);
    }
}
