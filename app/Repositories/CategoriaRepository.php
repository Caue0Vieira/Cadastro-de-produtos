<?php

namespace App\Repositories;

use App\Models\Categoria;
use App\Repositories\BaseRepository;

class CategoriaRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nome',
        'descricao'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Categoria::class;
    }
}
