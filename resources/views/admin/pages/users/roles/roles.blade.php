@extends('adminlte::page')

@section('title', "Cargos do usuario {$user->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Users</a></li>
    </ol>

    <h1>Cargos do usuario {{ $user->name }} </h1>
    
    <a href="{{ route('users.roles.available', $user->id) }}" class="btn btn-dark "><i class="fas fa-plus-circle"> ADD NOVO CARGO</i></a>
    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr> 
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>
                                {{ $role->name }}
                            </td>
                            <td style="width=80px;">
                                <a href="{{ route('users.roles.detach', [$user->id, $role->id]) }}" class="btn btn-danger">Desvincular</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="cadrd-footer">
            @if (isset($filters))
                {!! $roles->appends($filters)->links() !!}
            @else
                {!! $roles->links() !!}
            @endif
        </div>
    </div>
@stop 