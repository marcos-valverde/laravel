@extends('adminlte::page')

@section('title', 'Detalhes da Categoria')

@section('content_header')
<h1>Detalhes da Categoria' <b>{{ $categories->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome      : </strong> {{ $categories->name }}
                </li>
                <li>
                    <strong>URL       : </strong> {{ $categories->url }}
                </li>
                <li>
                    <strong>Descrição : </strong> {{ $categories->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('categories.destroy', $categories->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt">  DELETAR A CATEGORIA {{ $categories->name }}</i></button>
            </form>
        </div>
    </div>
@endsection