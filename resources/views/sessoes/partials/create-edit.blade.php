<div class="form-group">
    <label for="inputData">Data</label>
    <input type="text" class="form-control" name="data" id="inputData" value="{{old('data', $sessao->data)}}" >
    @error('data')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputHoraInicio">Hora Inicio</label>
    <input type="text" class="form-control" name="horario_inicio" id="inputhoraInicio" value="{{old('horario_inicio', $sessao->horario_inicio)}}" >
    @error('horario_inicio')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
