<div class="form-group">
    <label for="inputName">Nome</label>
    <input type="text" class="form-control" name="name" id="inputName" value="{{ old('name',$user->name) }}" />
    @error('name')
    <div class="small text-danger"> {{$message}} </div>
    @enderror
</div>
<div class="form-group">
    <label for="inputEmail">Email</label>
    <input type="text" class="form-control" name="email" id="inputEmail" value="{{ old('email',$user->email) }}" />
    @error('email')
    <div class="small text-danger"> {{$message}} </div>
    @enderror
</div>
<div class="form-group">
    <label for="inputPassword">Password</label>
    <input type="password" class="form-control" name="password" id="inputPassword" value="{{ old('password',$user->password) }}" />
    @error('password')
    <div class="small text-danger"> {{$message}} </div>
    @enderror
</div>
<div class="form-group">
    <label for="inputTipo">Tipo</label>
    <input type="text" class="form-control" name="tipo" id="inputTipo" value="{{ old('tipo',$user->tipo) }}" />
    @error('tipo')
    <div class="small text-danger"> {{$message}} </div>
    @enderror
</div>

<div class="form-group">
    <label for="inputFotoUrl">Foto</label>
    <input type="file" class="form-control" name="foto_url" id="inputFotoUrl" />
    @error('foto_url')
    <div class="small text-danger"> {{$message}} </div>
    @enderror
</div>

@dump($errors)
