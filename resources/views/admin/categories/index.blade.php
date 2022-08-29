@extends('adminlte::page')
@section('title', 'Listagem de Categorias')

@section('content_header')
    <h1>Categorias</h1>

    <a href="{{ route('categories.create') }}" class="btn btn-success">Adicionar</a>
@stop

@section('content')
    <div class="content-row">
        <div class="box box-success">
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">url</th>
                            <th scope="col">Description</th>
                            <th scope="col">Ações</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)
                            <tr>
                                <th scope="col">{{ $category->id }}</th>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->url }}</td>
                                <td>{{ $category->description }}</td>
                                <td>#acoes</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
