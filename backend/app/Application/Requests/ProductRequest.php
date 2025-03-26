<?php

namespace App\Application\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome_produto' => 'required|string|max:255',
            'id_categoria_produto' => 'required|integer|exists:categoria_produto,id_categoria_planejamento',
            'valor_produto' => 'required|numeric|min:0',
        ];
    }
}
