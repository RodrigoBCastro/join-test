<?php

namespace App\Application\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome_categoria' => 'required|string|max:255',
        ];
    }
}
