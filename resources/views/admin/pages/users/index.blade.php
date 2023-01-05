@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Usuários</a></li>
    </ol>

    <h1>Usuários  <a href="{{ route('users.create') }}" class="btn btn-dark "><i class="fas fa-plus-circle"> Adicionar</i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        <form action="{{ route('users.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filter['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">  
                    <i class="fas fa-search"> Pesquisar</i>
                </button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr> 
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}
                            </td>
                            <td style="width=80px;">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info" title="Editar"><i class="far fa-edit"></i></i></a>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning" title="Visualizar"><i class="far fa-eye"></i></a>
                                <a href="{{ route('users.roles', $user->id) }}" class="btn btn-info" title="Cargos"><i class="fas fa-lock"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="cadrd-footer">
            @if (isset($filters))
                {!! $users->appends($filters)->links() !!}
            @else
                {!! $users->links() !!}
            @endif
        </div>
    </div>
@stop 