<?php

namespace App\Domain\Services\Product;

use App\Domain\Models\Product;
use App\Domain\Repositories\Contracts\ProductRepositoryInterface;

class ProductUpdateService
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ) {
    }

    public function __invoke(int $id, array $data): Product
    {
        return $this->productRepository->update($id, $data);
    }
}
