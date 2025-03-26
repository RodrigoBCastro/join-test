<?php

namespace App\Application\Controllers\Category;

use App\Application\Requests\Product\CategoryRequest;
use App\Assembler\Category\CategoryRequestToCategoryRequestDtoAssembler;
use App\Domain\Services\Category\CategoryCreateService;
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
    public function __invoke(CategoryRequest $request): JsonResponse
    {
        $categoryRequestDto = (new CategoryRequestToCategoryRequestDtoAssembler())($request);

        return response()->json(
            ($this->categoryService)($categoryRequestDto)->toArray(), 201
        );
    }
}
