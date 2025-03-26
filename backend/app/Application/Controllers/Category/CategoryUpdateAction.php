<?php

namespace App\Application\Controllers\Category;

use App\Application\Requests\CategoryRequest;
use App\Assembler\Category\CategoryRequestToCategoryRequestDtoAssembler;
use App\Domain\Services\Category\CategoryUpdateService;
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
    public function __invoke(CategoryRequest $request, int $idCategory): JsonResponse
    {
        $categoryRequestDto = (new CategoryRequestToCategoryRequestDtoAssembler())($request);

        return response()->json(
            ($this->categoryService)($idCategory, $categoryRequestDto)->toArray(), 201
        );
    }
}
