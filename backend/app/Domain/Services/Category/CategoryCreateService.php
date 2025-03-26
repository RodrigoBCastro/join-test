<?php

namespace App\Domain\Services\Category;

use App\Assembler\Category\CategoryRequestDtoToCategoryAssembler;
use App\Assembler\Category\CategoryToCategoryResponseDtoAssembler;
use App\Domain\DTO\CategoryRequestDto;
use App\Domain\DTO\CategoryResponseDto;
use App\Domain\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryCreateService
{
    public function __construct(
        private CategoryRepositoryInterface $categoryRepository
    ) {
    }

    public function __invoke(CategoryRequestDto $categoryRequestDto): CategoryResponseDto
    {
        $category = (new CategoryRequestDtoToCategoryAssembler())($categoryRequestDto);

        $this->categoryRepository->create($category);

        return (new CategoryToCategoryResponseDtoAssembler())($category);
    }
}
