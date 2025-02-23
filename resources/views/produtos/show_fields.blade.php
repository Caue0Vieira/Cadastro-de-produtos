<!-- Nome Field -->
<div class="col-sm-12">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{{ $produtos->nome }}</p>
</div>

<!-- Descricao Field -->
<div class="col-sm-12">
    {!! Form::label('descricao', 'Descrição:') !!}
    <p>{{ $produtos->descricao }}</p>
</div>

<!-- Preco Field -->
<div class="col-sm-12">
    {!! Form::label('preco', 'Preço:') !!}
    <p>{{ $produtos->preco }}</p>
</div>

<!-- Quantidade Field -->
<div class="col-sm-12">
    {!! Form::label('quantidade', 'Quantidade:') !!}
    <p>{{ $produtos->quantidade }}</p>
</div>

<!-- Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('category_id', 'Category Id:') !!}
    <p>{{ $produtos->category ? $produtos->category->nome : 'Sem Categoria' }}</p>
</div>

