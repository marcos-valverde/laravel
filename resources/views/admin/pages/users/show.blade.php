@extends('adminlte::page')

@section('title', 'Detalhes do Usuário')

@section('content_header')
<h1>Detalhes do Usuário <b>{{ $users->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome      : </strong> {{ $users->name }}
                </li>
                <li>
                    <strong>E-mail       : </strong> {{ $users->email }}
                </li>
                <li>
                    <strong>Empresa : </strong> {{ $users->tenant->name }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('users.destroy', $users->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt">  DELETAR O Usuário {{ $users->name }}</i></button>
            </form>
        </div>
    </div>
@endsection