<?php

namespace App\Domain\Services\Category;

use App\Domain\Models\Category;
use App\Domain\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryUpdateService
{
    public function __construct(
        private CategoryRepositoryInterface $categoryRepository
    ) {
    }

    public function __invoke(int $id, array $data): Category
    {
        return $this->categoryRepository->update($id, $data);
    }
}
