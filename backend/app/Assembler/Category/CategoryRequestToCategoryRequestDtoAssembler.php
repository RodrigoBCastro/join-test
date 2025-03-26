<?php

namespace App\Assembler\Category;

use App\Domain\DTO\CategoryRequestDto;
use Symfony\Component\HttpFoundation\Request;

class CategoryRequestToCategoryRequestDtoAssembler
{
    public function __invoke(Request $request): CategoryRequestDto
    {
        $content = json_decode($request->getContent(), true);
        return new CategoryRequestDto(
            $content['nome_categoria']
        );
    }
}
