<?php

namespace App\Domain\DTO;

class CategoryResponseDto
{
    public function __construct(
        private int $id_categoria_planejamento,
        private string $nome_categoria,
    ) {
    }

    public function getIdCategoriaPlanejamento(): int
    {
        return $this->id_categoria_planejamento;
    }

    public function getNomeCategoria(): string
    {
        return $this->nome_categoria;
    }

    public function toArray(): array
    {
        return [
            'id_categoria_planejamento' => $this->getIdCategoriaPlanejamento(),
            'nome_categoria' => $this->getNomeCategoria(),
        ];
    }
}
