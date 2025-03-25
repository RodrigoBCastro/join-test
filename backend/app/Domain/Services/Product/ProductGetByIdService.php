<?php

namespace App\Domain\Services\Product;

use App\Domain\Models\Product;
use App\Domain\Repositories\Contracts\ProductRepositoryInterface;

class ProductGetByIdService
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ) {
    }

    public function __invoke(int $id): Product
    {
        return $this->productRepository->getById($id);
    }
}
