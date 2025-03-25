<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $table = 'categoria_produto';
    protected $primaryKey = 'id_categoria_planejamento';
    protected $fillable = ['nome_categoria'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id_categoria_planejamento');

    }
}
