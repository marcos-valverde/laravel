@extends('adminlte::page')

@section('title', 'Detalhes do Produto')

@section('content_header')
<h1>Detalhes do Produto <b>{{ $products->title }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <img src="{{ url("storage/{$products->image}") }}" alt="{{ $products->title }}" style="max-width:90px">
            <ul>
                <li>
                    <strong>Título    : </strong> {{ $products->title }}
                </li>
                <li>
                    <strong>Flag    : </strong> {{ $products->flag }}
                </li>
                <li>
                    <strong>Descrição : </strong> {{ $products->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('products.destroy', $products->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt">  DELETAR O PRODUTO {{ $products->title }}</i></button>
            </form>
        </div>
    </div>
@endsection