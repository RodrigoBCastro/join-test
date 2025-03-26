<?php

namespace App\Application\Controllers\Category;

use App\Domain\Services\Category\CategoryGetAllService;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoryGetAllAction
{
    public function __construct(
        private CategoryGetAllService $categoryService
    ) {
    }

    /**
     * @OA\Get(
     *     path="/api/categories",
     *     tags={"Categories"},
     *     summary="Lista todas as categorias",
     *     @OA\Response(response=200, description="Lista de categorias")
     * )
     */
    public function __invoke(): JsonResponse
    {
        return response()->json(
            ($this->categoryService)()
        );
    }
}
