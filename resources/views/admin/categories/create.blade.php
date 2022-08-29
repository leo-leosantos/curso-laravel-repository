@extends('adminlte::page')
@section('title', 'Adicionar Categorias')

@section('content_header')
    <h1>Nova Categoria</h1>

@stop

@section('content')
    <div class="content-row">
        <div class="box box-success">
            <div class="box-body">
                @if ($errors->any())

                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error )
                        <p>{{ $error }}</p>
                    @endforeach
                </div>

                @endif
              <form action="{{ route('categories.store') }}" class="form" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="title">Titulo da Categoria</label>
                        <input type="text" name="title" class="form-control" placeholder="Titulo da Categoria" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="title">url da cateoria</label>
                        <input type="text" name="url" class="form-control" placeholder="URL da Categoria" value="{{ old('url')  }}">
                    </div>

                    <div class="form-group">
                        <label for="title">Descrição da Categoria</label>
                            <textarea name="description" class="form-control" placeholder="Descrição da categoria" cols="30" rows="10" >
                                {{ old('description') }}
                            </textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block btn-flat">Enviar</button>
                    </div>
              </form>
            </div>
        </div>
    </div>
@stop
