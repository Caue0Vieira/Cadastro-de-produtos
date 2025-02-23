<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CategoriaRepository;
use Illuminate\Http\Request;
use Flash;

class CategoriaController extends AppBaseController
{
    /** @var CategoriaRepository $categoriaRepository*/
    private $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepo)
    {
        $this->categoriaRepository = $categoriaRepo;
    }

    /**
     * Display a listing of the Categoria.
     */
    public function index(Request $request)
    {
        $categorias = $this->categoriaRepository->paginate(10);

        return view('categorias.index')
            ->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new Categoria.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created Categoria in storage.
     */
    public function store(CreateCategoriaRequest $request)
    {
        $input = $request->all();

        $categoria = $this->categoriaRepository->create($input);

        Flash::success('Categoria Salva.');

        return redirect(route('categorias.index'));
    }

    /**
     * Display the specified Categoria.
     */
    public function show($id)
    {
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            Flash::error('Produto não encontrado');

            return redirect(route('categorias.index'));
        }

        return view('categorias.show')->with('categoria', $categoria);
    }

    /**
     * Show the form for editing the specified Categoria.
     */
    public function edit($id)
    {
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            Flash::error('Produto não encontrado');

            return redirect(route('categorias.index'));
        }

        return view('categorias.edit')->with('categoria', $categoria);
    }

    /**
     * Update the specified Categoria in storage.
     */
    public function update($id, UpdateCategoriaRequest $request)
    {
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            Flash::error('Produto não encontrado');

            return redirect(route('categorias.index'));
        }

        $categoria = $this->categoriaRepository->update($request->all(), $id);

        Flash::success('Categoria Atualizada.');

        return redirect(route('categorias.index'));
    }

    /**
     * Remove the specified Categoria from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            Flash::error('Categoria não encontrada');

            return redirect(route('categorias.index'));
        }

        $this->categoriaRepository->delete($id);

        Flash::success('Categoria deletada.');

        return redirect(route('categorias.index'));
    }
}
