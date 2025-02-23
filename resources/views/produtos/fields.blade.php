<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Descricao Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descricao', 'Descrição:') !!}
    {!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}
</div>

<!-- Preco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('preco', 'Preço:') !!}
    {!! Form::number('preco', null, ['class' => 'form-control', 'required', 'step' => '0.01', 'min' => '0.00']) !!}
</div>

<!-- Quantidade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantidade', 'Quantidade:') !!}
    {!! Form::number('quantidade', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Categoria:') !!}
    {!! Form::select('category_id', 
        $categories->pluck('nome', 'id')->toArray(), 
        null, 
        ['class' => 'form-control', 'required']) !!}
</div>
