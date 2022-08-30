@extends('adminlte::page')
@section('title', 'Listagem de Produtos')

@section('content_header')
    <h1>Produtos</h1>

    <a href="{{ route('products.create') }}" class="btn btn-success">Adicionar</a>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('products.index') }}" class="active">Produtos</a></li>
    </ol>

@stop

@section('content')
    <div class="content-row">
        <div class="box box-primary">
            <div class="box-body">
                    formulario de pesquisa
            </div>
        </div>
        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts.alerts')
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">url</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Ações</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->url }}</td>
                                <td>R$  {{ $product->price }}</td>
                                <td>{{ $product->category->title }}</td>

                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="badge bg-yellow">Editar</a>

                                    <a href="{{ route('products.show', $product->id) }}"
                                        class="badge bg-blue">Visualizar</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
