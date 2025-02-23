<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    public $table = 'categories';
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public $fillable = [
        'nome',
        'descricao'
    ];

    protected $casts = [
        'nome' => 'string',
        'descricao' => 'string'
    ];

    public static array $rules = [
        'nome' => 'required|string|max:255',
        'descricao' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Produtos::class, 'category_id');
    }
}
