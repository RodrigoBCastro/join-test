<?php

namespace App\Application\Controllers\Category;

use App\Domain\Services\Category\CategoryCreateService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoryCreateAction
{
    public function __construct(
        private CategoryCreateService $categoryService
    ) {
    }

    /**
     * @OA\Post(
     *     path="/api/categories",
     *     tags={"Categories"},
     *     summary="Cria uma nova categoria",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="nome_categoria", type="string", example="Eletrônicos")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Categoria criada com sucesso")
     * )
     */
    public function __invoke(Request $request): JsonResponse
    {
        return response()->json(
            ($this->categoryService)($request->all()), 201
        );
    }
}
