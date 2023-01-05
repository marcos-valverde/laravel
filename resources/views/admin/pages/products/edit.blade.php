@extends('adminlte::page')

@section('title', "Editar o produto {$products->title}")

@section('content_header')
<h1>Editar o produto {{ $products->title }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.update', $products->id) }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf 
                @method('PUT')
                
                @include('admin.pages.products._partials.form')
            </form>
        </div>
    </div>
@endsection