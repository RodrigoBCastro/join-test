<?php

namespace App\Assembler\Category;

use App\Domain\DTO\CategoryRequestDto;
use App\Domain\Models\Category;

class CategoryRequestDtoToCategoryAssembler
{
    public function __invoke(CategoryRequestDto $categoryRequestDto): Category
    {
        $category = new Category();
        $category->nome_categoria = $categoryRequestDto->getNomeCategoria();

        return $category;
    }
}
