<?php

namespace App\Domain\Services\Category;

use App\Assembler\Category\CategoryToCategoryResponseDtoAssembler;
use App\Domain\DTO\CategoryResponseDto;
use App\Domain\Models\Category;
use App\Domain\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryGetByIdService
{
    public function __construct(
        private CategoryRepositoryInterface $categoryRepository
    ) {
    }

    public function __invoke(int $id): CategoryResponseDto
    {
        $category = $this->categoryRepository->getById($id);

        return (new CategoryToCategoryResponseDtoAssembler())($category);
    }
}
