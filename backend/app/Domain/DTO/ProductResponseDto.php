<?php

namespace App\Domain\DTO;

class ProductResponseDto
{
    public function __construct(
        private int $id_produto,
        private int $id_categoria_produto,
        private string $nome_produto,
        private string $valor_produto,
    ) {
    }

    public function getIdProduto(): int
    {
        return $this->id_produto;
    }

    public function getIdCategoriaProduto(): int
    {
        return $this->id_categoria_produto;
    }

    public function getNomeProduto(): string
    {
        return $this->nome_produto;
    }

    public function getValorProduto(): string
    {
        return $this->valor_produto;
    }

    public function toArray(): array
    {
        return [
            'id_produto' => $this->getIdProduto(),
            'id_categoria_produto' => $this->getIdCategoriaProduto(),
            'nome_produto' => $this->getNomeProduto(),
            'valor_produto' => $this->getValorProduto(),
        ];
    }
}
