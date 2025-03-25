<?php

namespace App\Domain\Services\Category;

use App\Domain\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryDeleteService
{
    public function __construct(
        private CategoryRepositoryInterface $categoryRepository
    ) {
    }

    public function __invoke(int $id): void
    {
        $this->categoryRepository->delete($id);
    }
}
