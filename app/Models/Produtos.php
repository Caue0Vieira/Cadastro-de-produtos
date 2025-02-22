<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }
}
