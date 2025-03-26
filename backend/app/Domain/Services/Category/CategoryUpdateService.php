<?php

namespace App\Domain\Services\Category;

use App\Assembler\Category\CategoryToCategoryResponseDtoAssembler;
use App\Domain\DTO\CategoryRequestDto;
use App\Domain\DTO\CategoryResponseDto;
use App\Domain\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryUpdateService
{
    public function __construct(
        private CategoryRepositoryInterface $categoryRepository
    ) {
    }

    public function __invoke(int $id, CategoryRequestDto $categoryRequestDto): CategoryResponseDto
    {
        $category = $this->categoryRepository->update($id, $categoryRequestDto->toArray());

        return (new CategoryToCategoryResponseDtoAssembler())($category);
    }
}
