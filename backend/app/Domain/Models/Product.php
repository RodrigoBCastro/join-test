<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $table = 'produto';
    protected $primaryKey = 'id_produto';
    protected $fillable = ['id_categoria_produto', 'data_cadastro', 'nome_produto', 'valor_produto'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categoria_produto', 'id_categoria_planejamento');

    }
}
