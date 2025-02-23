@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Produtos</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('produtos.create') }}">
                        Adicionar produto
                    </a>
                </div>
            </div>
        </div>
        <!-- Formulário de pesquisa -->
<div class="form-group">
    {!! Form::open(['route' => 'produtos.index', 'method' => 'GET']) !!}
        <div class="input-group">
            <!-- Campo de pesquisa por nome -->
            {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Pesquisar produtos...']) !!}
            
            <!-- Campo de pesquisa por categoria -->
            {!! Form::select('category_id', $categories->pluck('nome', 'id')->toArray(), null, ['class' => 'form-control', 'placeholder' => 'Selecione uma categoria']) !!}

            <span class="input-group-btn">
                {!! Form::submit('Pesquisar', ['class' => 'btn btn-primary']) !!}
            </span>
        </div>
    {!! Form::close() !!}
</div>

    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('produtos.table')
        </div>
    </div>

@endsection
