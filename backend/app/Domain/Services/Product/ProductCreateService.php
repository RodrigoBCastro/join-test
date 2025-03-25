<?php

namespace App\Domain\Services\Product;

use App\Domain\Models\Product;
use App\Domain\Repositories\Contracts\ProductRepositoryInterface;

class ProductCreateService
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ) {
    }

    public function __invoke(array $data): Product
    {
        $data['data_cadastro'] = new \DateTime();
//        dd($data);

        return $this->productRepository->create($data);
    }
}
