@extends('adminlte::page')
@section('title', 'Listagem de Usuários')

@section('content_header')
    <h1>Usuários</h1>

    <a href="{{ route('users.create') }}" class="btn btn-success">Adicionar</a>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('users.index') }}" class="active">Usuários</a></li>
    </ol>

@stop

@section('content')
    <div class="content-row">
        <div class="box box-success">
            <div class="box-body">
                #formulario

            </div>
        </div>
        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts.alerts')
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">email</th>
                            <th scope="col">Data de criação</th>
                            <th scope="col">Ações</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{date_format($user->created_at, 'd-m-Y H:i:s')  }}</td>

                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}"
                                        class="badge bg-yellow">Editar</a>
                                    <a href="{{ route('users.show', $user->id) }}"
                                        class="badge bg-blue">Visualizar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                    {{--  @if (isset($filters))
                        {!! $products->appends($filters)->links() !!}
                    @else
                        {!! $products->links() !!}
                    @endif  --}}
            </div>
        </div>
    </div>
@stop
