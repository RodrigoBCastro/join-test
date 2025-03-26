<?php

namespace App\Application\Controllers\Category;

use App\Domain\Services\Category\CategoryGetByIdService;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoryGetByIdAction
{
    public function __construct(
        private CategoryGetByIdService $categoryService
    ) {
    }

    /**
     * @OA\Get(
     *     path="/api/categories/{id}",
     *     tags={"Categories"},
     *     summary="Busca uma categoria pelo ID",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Categoria encontrada")
     * )
     */
    public function __invoke(int $idCategory): JsonResponse
    {
        return response()->json(
            ($this->categoryService)($idCategory)->toArray()
        );
    }
}
