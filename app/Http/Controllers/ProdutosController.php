<?php

namespace App\Http\Controllers;
use App\Models\Category;


use App\Http\Requests\CreateProdutosRequest;
use App\Http\Requests\UpdateProdutosRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Categoria;
use App\Models\Produtos;
use App\Repositories\ProdutosRepository;
use Illuminate\Http\Request;
use Flash;

class ProdutosController extends AppBaseController
{
    /** @var ProdutosRepository $produtosRepository*/
    private $produtosRepository;

    public function __construct(ProdutosRepository $produtosRepo)
    {
        $this->produtosRepository = $produtosRepo;
    }

    /**
     * Display a listing of the Produtos.
     */
    public function index(Request $request)
    {
        $produtos = $this->produtosRepository->paginate(10);
        $search = $request->input('search');  
        $categoryId = $request->input('category_id'); 
    
        
        $produtos = Produtos::query();
    
        // Filtro de pesquisa por nome ou descrição
        if ($search) {
            $produtos = $produtos->where('nome', 'like', '%' . $search . '%')
                                 ->orWhere('descricao', 'like', '%' . $search . '%');
        }
    
        // Filtro de pesquisa por categoria
        if ($categoryId) {
            $produtos = $produtos->where('category_id', $categoryId);
        }
    
        
        $produtos = $produtos->paginate(10);
    
        
        $categories = Categoria::all(); 
    
        return view('produtos.index', compact('produtos', 'categories'));

    }

    /**
     * Show the form for creating a new Produtos.
     */
    public function create()
    {
        $categories = Categoria::all();

        
        return view('produtos.create', compact('categories'));
        
    }

    /**
     * Store a newly created Produtos in storage.
     */
    public function store(CreateProdutosRequest $request)
    {
        $input = $request->all();

        $produtos = $this->produtosRepository->create($input);

        Flash::success('Produtos saved successfully.');

        return redirect(route('produtos.index'));
    }

    /**
     * Display the specified Produtos.
     */
    public function show($id)
    {
        $produtos = $this->produtosRepository->find($id);

        if (empty($produtos)) {
            Flash::error('Produtos not found');

            return redirect(route('produtos.index'));
        }

        return view('produtos.show')->with('produtos', $produtos);
    }

    /**
     * Show the form for editing the specified Produtos.
     */
    public function edit($id)
    {
        $produtos = $this->produtosRepository->find($id);
        $produts = Produtos::findOrFail($id);

        // Obter todas as categorias
        $categories = Categoria::all();
    
        // Passar o produto e as categorias para a view de edição
        

        if (empty($produtos)) {
            Flash::error('Produtos not found');

            return redirect(route('produtos.index'));
        }

        return view('produtos.edit', compact('produtos', 'categories', 'produtos'));

    }

    /**
     * Update the specified Produtos in storage.
     */
    public function update($id, UpdateProdutosRequest $request)
    {
        $produtos = $this->produtosRepository->find($id);

        if (empty($produtos)) {
            Flash::error('Produtos not found');

            return redirect(route('produtos.index'));
        }

        $produtos = $this->produtosRepository->update($request->all(), $id);

        Flash::success('Produtos updated successfully.');

        return redirect(route('produtos.index'));
    }

    /**
     * Remove the specified Produtos from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $produtos = $this->produtosRepository->find($id);

        if (empty($produtos)) {
            Flash::error('Produtos not found');

            return redirect(route('produtos.index'));
        }

        $this->produtosRepository->delete($id);

        Flash::success('Produtos deleted successfully.');

        return redirect(route('produtos.index'));
    }
}
