<?php

namespace App\Domain\Services\Category;

use App\Domain\Models\Category;
use App\Domain\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryCreateService
{
    public function __construct(
        private CategoryRepositoryInterface $categoryRepository
    ) {
    }

    public function __invoke(array $data): Category
    {
        return $this->categoryRepository->create($data);
    }
}
