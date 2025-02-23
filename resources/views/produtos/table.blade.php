<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="produtos-table">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Preco</th>
                <th>Quantidade</th>
                <th>Category Id</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($produtos as $produtos)
                <tr>
                    <td>{{ $produtos->nome }}</td>
                    <td>{{ $produtos->descricao }}</td>
                    <td>{{ $produtos->preco }}</td>
                    <td>{{ $produtos->quantidade }}</td>
                    <td>{{ $produtos->category ? $produtos->category->nome : 'Sem Categoria' }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['produtos.destroy', $produtos->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('produtos.show', [$produtos->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('produtos.edit', [$produtos->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">

        </div>
    </div>
</div>
