<?php

namespace App\Repositories;

use App\Models\Produtos;
use App\Repositories\BaseRepository;

class ProdutosRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nome',
        'descricao',
        'preco',
        'quantidade',
        'category_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Produtos::class;
    }
}
