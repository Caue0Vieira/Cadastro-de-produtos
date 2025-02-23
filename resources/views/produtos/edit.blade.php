@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Editar Produtos
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($produtos, ['route' => ['produtos.update', $produtos->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                @include('produtos.fields', ['categories' => $categories])
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('produtos.index') }}" class="btn btn-default"> Cancelar </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
