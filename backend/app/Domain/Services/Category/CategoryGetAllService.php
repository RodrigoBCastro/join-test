<?php

namespace App\Domain\Services\Category;

use App\Domain\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryGetAllService
{
    public function __construct(
        private CategoryRepositoryInterface $categoryRepository
    ) {
    }

    public function __invoke(): array
    {
        return $this->categoryRepository->getAll()->toArray();
    }
}
