<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;


class Produtos extends Model
{
    public $table = 'products';
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public $fillable = [
        'nome',
        'descricao',
        'preco',
        'quantidade',
        'category_id'
    ];
    public static function rules($id = null) 
    {
        return [
            'nome' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products')->ignore($id),
            ],
            
        ];
    }

    public static function messages()
{
    return [
        'nome.required' => 'O campo nome é obrigatório.',
        'nome.string' => 'O campo nome deve ser uma string válida.',
        'nome.max' => 'O campo nome não pode ter mais que 255 caracteres.',
        'nome.unique' => 'Já existe um produto com esse nome. Tente um nome diferente.',
    ];
}

    protected $casts = [
        'nome' => 'string',
        'descricao' => 'string',
        'preco' => 'decimal:2'
    ];

    public static array $rules = [
        'nome' => 'required|string|max:255',
        'descricao' => 'nullable|string',
        'preco' => 'required|numeric',
        'quantidade' => 'required',
        'category_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Categoria::class, 'category_id');
    }
}
