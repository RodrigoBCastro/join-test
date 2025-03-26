<?php

namespace App\Assembler\Product;

use App\Domain\DTO\ProductRequestDto;
use App\Domain\Models\Product;

class ProductRequestDtoToProductAssembler
{
    public function __invoke(ProductRequestDto $productRequestDto): Product
    {
        $product = new Product();
        $product->id_categoria_produto = $productRequestDto->getIdCategoriaProduto();
        $product->data_cadastro = (new \DateTime());
        $product->nome_produto = $productRequestDto->getNomeProduto();
        $product->valor_produto = $productRequestDto->getValorProduto();

        return $product;
    }
}
