@extends('adminlte::page')
@section('title', 'Cadastrar novo Produto')

@section('content_header')
    <h1>Novo Produto</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('products.index') }}" class="active">Produtos</a></li>
        <li><a href="{{ route('products.create') }}" class="active">Cadastrar</a></li>

    </ol>

@stop

@section('content')
    <div class="content-row">
        <div class="box box-primary">
            <div class="box-body">
                formulario de pesquisa
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.includes.alerts.alerts')
                <form action="{{ route('products.store') }}" method="post" class="form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nome do Produto</label>
                        <input type="text" name="name" placeholder="Nome do produto" class="form-control"
                            value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" name="url" placeholder="Url do produto" class="form-control"
                            value="{{ old('url') }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Preço do Produto</label>
                        <input type="number" name="price" min="0.00" placeholder="Preço do produto"
                            class="form-control" value="{{ old('price') }}">
                    </div>

                    <div class="form-group">
                        <label for="category_id">Categoria do Produto</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="">Selecione uma categoria</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Descrição do Produto</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block btn-flat">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


@stop
