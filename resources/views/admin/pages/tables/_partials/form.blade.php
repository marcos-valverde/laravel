@include('admin.includes.alerts')

<div class="form-group">
    <label>Identificador da Mesa:</label>
    <input type="text" name="identify" class="form-control" placeholder="identificação:" value="{{ $tables->identify ?? old('identify') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <textarea name="description" cols="30" rows="5" class="form-control">{{ $tables->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
