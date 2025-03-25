<?php

namespace App\Application\Controllers\Category;

use App\Domain\Services\Category\CategoryUpdateService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoryUpdateAction
{
    public function __construct(
        private CategoryUpdateService $categoryService
    ) {
    }

    /**
     * @OA\Put(
     *     path="/api/categories/{id}",
     *     tags={"Categories"},
     *     summary="Atualiza uma categoria",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="nome_categoria", type="string", example="Eletrônicos")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Categoria atualizada com sucesso")
     * )
     */
    public function __invoke(Request $request, int $idCategory): JsonResponse
    {
        return response()->json(
            ($this->categoryService)($idCategory, $request->all()), 201
        );
    }
}
