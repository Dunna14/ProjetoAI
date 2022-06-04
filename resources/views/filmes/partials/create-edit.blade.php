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
    <label for="inputGenero">Genero</label>
    <select class="form-control" name="genero_curso" id="inputGeneroCurso">
        @foreach ($generos as $genero)
            <option value="{{ $genero->nome }}"
                {{ old('genero_curso',$filme->genero_code) == $genero->nome ? 'selected' : '' }}>{{ $genero->nome }}</option>
        @endforeach
    </select>
    @error('genero_code')
    <div class="small text-danger"> {{$message}} </div>
    @enderror
</div>
<div class="form-group">
    <div>Ano</div>
    <div class="form-check form-check-inline">
        <input type="hidden" name="ano" value="">
        <input type="radio" class="form-check-input" id="inputAno1" name="ano" value="1"
            {{ old('ano',$filme->ano) == 1 ? 'checked' : '' }}>
        <label class="form-check-label" for="inputAno1"> 1 </label>
        <input type="radio" class="form-check-input ml-4" id="inputAno2" name="ano" value="2"
            {{ old('ano',$filme->ano) == 2 ? 'checked' : '' }}>
        <label class="form-check-label" for="inputAno2"> 2 </label>
        <input type="radio" class="form-check-input ml-4" id="inputAno3" name="ano" value="3"
            {{ old('ano',$filme->ano) == 3 ? 'checked' : '' }}>
        <label class="form-check-label" for="inputAno3"> 3 </label>
    </div>
    @error('ano')
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
    <input type="text" class="form-control" name="cartaz_url" id="inputCartazUrl" value="{{ old('cartaz_url',$filme->cartaz_url) }}" />
    @error('cartaz_url')
    <div class="small text-danger"> {{$message}} </div>
    @enderror
</div>

