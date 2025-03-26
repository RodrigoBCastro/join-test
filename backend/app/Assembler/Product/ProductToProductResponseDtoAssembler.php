<?php

namespace App\Assembler\Product;

use App\Domain\DTO\ProductResponseDto;
use App\Domain\Models\Product;

class ProductToProductResponseDtoAssembler
{
    public function __invoke(Product $product): ProductResponseDto
    {
        return new ProductResponseDto(
            $product->id_produto,
            $product->id_categoria_produto,
            $product->nome_produto,
            $product->valor_produto,
        );
    }
}
