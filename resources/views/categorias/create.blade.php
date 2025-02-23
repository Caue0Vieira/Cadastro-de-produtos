@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                    Criar Categoria
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'categorias.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('categorias.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('categorias.index') }}" class="btn btn-default"> Cancelar </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
