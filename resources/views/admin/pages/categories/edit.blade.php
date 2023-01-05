@extends('adminlte::page')

@section('title', "Editar a categoria {$categories->name}")

@section('content_header')
<h1>Editar a categoria {{ $categories->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.update', $categories->id) }}" class="form" method="POST">
                @csrf 
                @method('PUT')
                
                @include('admin.pages.categories._partials.form')
            </form>
        </div>
    </div>
@endsection