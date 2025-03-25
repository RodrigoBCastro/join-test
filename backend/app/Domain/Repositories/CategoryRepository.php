<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Category;
use App\Domain\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll(): Collection
    {
        return Category::all();
    }

    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function getById(int $id): Category
    {
        return Category::findOrFail($id);
    }

    public function update(int $id, array $data): Category
    {
        $category = Category::findOrFail($id);
        $category->update($data);
        return $category;
    }

    public function delete(int $id): bool
    {
        return Category::destroy($id);
    }
}
