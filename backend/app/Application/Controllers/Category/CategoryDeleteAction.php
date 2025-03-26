<?php

namespace App\Application\Controllers\Category;

use App\Domain\Services\Category\CategoryDeleteService;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoryDeleteAction
{
    public function __construct(
        private CategoryDeleteService $categoryService
    ) {
    }

    /**
     * @OA\Delete(
     *     path="/api/categories/{id}",
     *     tags={"Categories"},
     *     summary="Exclui uma categoria",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Categoria excluída com sucesso")
     * )
     */
    public function __invoke(int $id): JsonResponse
    {
        ($this->categoryService)($id);
        return response()->json(null, 204);

    }
}
