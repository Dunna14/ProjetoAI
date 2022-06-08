<div class="form-group">
    <label for="inputTitulo">Título</label>
    <input type="text" class="form-control" name="titulo" id="inputTitulo" value="{{ old('titulo',$filme->titulo) }}" />
    @error('titulo')
    <div class="small text-danger"> {{$message}} </div>
    @enderror
</div>
<div class="form-group">
    <label for="inputSumario">Sumario</label>
    <input type="text" class="form-control" name="sumario" id="inputSumario" value="{{ old('sumario',$filme->sumario) }}" />
    @error('sumario')
    <div class="small text-danger"> {{$message}} </div>
    @enderror
</div>
<div class="form-group">
    <label for="inputAno">Ano</label>
    <input type="text" class="form-control" name="ano" id="inputAno" value="{{ old('ano',$filme->ano) }}" />
    @error('ano')
    <div class="small text-danger"> {{$message}} </div>
    @enderror
</div>
<div class="form-group">
    <label for="inputGenero">Genero</label>
    <select class="form-control" name="genero_code" id="inputGeneroCurso">
        @foreach ($generos as $genero)
            <option value="{{ $genero->code }}"
                {{ old('genero_code',$filme->genero_code) == $genero->code ? 'selected' : '' }}>{{ $genero->nome }}</option>
        @endforeach
    </select>
    @error('genero_code')
    <div class="small text-danger"> {{$message}} </div>
    @enderror
</div>

<div class="form-group">
    <label for="inputTrailerUrl">Trailer</label>
    <input type="text" class="form-control" name="trailer_url" id="inputTrailerUrl" value="{{ old('trailer_url',$filme->trailer_url) }}" />
    @error('trailer_url')
    <div class="small text-danger"> {{$message}} </div>
    @enderror
</div>

<div class="form-group">
    <label for="inputCartazUrl">Cartaz</label>
    <input type="file" class="form-control" name="cartaz_url" id="inputCartazUrl" />
    @error('cartaz_url')
    <div class="small text-danger"> {{$message}} </div>
    @enderror
</div>

@dump($errors)
