<?php

namespace App\Domain\Repositories\Contracts;

use App\Domain\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryInterface
{
    public function getAll(): Collection;
    public function create(array $data): Category;
    public function getById(int $id): Category;
    public function update(int $id, array $data): Category;
    public function delete(int $id): bool;
}
