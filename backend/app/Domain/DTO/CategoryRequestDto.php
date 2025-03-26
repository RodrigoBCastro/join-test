<?php

namespace App\Domain\DTO;

class CategoryRequestDto
{
    public function __construct(
        private string $nome_categoria,
    ) {
    }

    public function getNomeCategoria(): string
    {
        return $this->nome_categoria;
    }

    public function toArray(): array
    {
        return [
            'nome_categoria' => $this->getNomeCategoria(),
        ];
    }
}
