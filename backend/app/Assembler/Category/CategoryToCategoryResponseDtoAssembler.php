<?php

namespace App\Assembler\Category;

use App\Domain\DTO\CategoryResponseDto;
use App\Domain\Models\Category;

class CategoryToCategoryResponseDtoAssembler
{
    public function __invoke(Category $category): CategoryResponseDto
    {
        return new CategoryResponseDto(
            $category->id_categoria_planejamento,
            $category->nome_categoria,
        );
    }
}
