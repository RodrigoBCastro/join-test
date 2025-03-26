<?php

namespace App\Domain\DTO;

class ProductRequestDto
{
    public function __construct(
        private string $nome_produto,
        private int $id_categoria_produto,
        private float $valor_produto,
    ) {
    }

    public function getNomeProduto(): string
    {
        return $this->nome_produto;
    }

    public function getIdCategoriaProduto(): int
    {
        return $this->id_categoria_produto;
    }

    public function getValorProduto(): float
    {
        return $this->valor_produto;
    }

    public function toArray(): array
    {
        return [
            'id_categoria_produto' => $this->getIdCategoriaProduto(),
            'nome_produto' => $this->getNomeProduto(),
            'valor_produto' => $this->getValorProduto(),
        ];
    }
}
