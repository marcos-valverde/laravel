@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" name="name" class="form-control" placeholder="Nome do detalhe" value="{{ $detail->name ?? old('name') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> - Gravar</button>
</div>
