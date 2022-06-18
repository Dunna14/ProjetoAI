@extends('layout_website')

@section('content')

<div>
    <p>
          <form action="{{ route('carrinho.destroy') }}" method="POST">
              @csrf
              @method("DELETE")
              <input type="submit" value="Apagar carrinho">
          </form>
    </p>
    <p>
          <form action="{{ route('carrinho.store') }}" method="POST">
              @csrf
              <input type="submit" value="Confirmar carrinho">
          </form>
    </p>
  </div>

  <table class="table table-bordered">
      <thead>
          <tr>
              <th>Filme</th>
              <th>Sala</th>
              <th>Fila</th>
              <th>Posição</th>
              <th></th>
              <th></th>
              <th></th>
          </tr>
      </thead>
      <tbody>
      @foreach ($carrinho as $row)
      <tr>
          <td>{{ $row['filme'] }} </td>
          <td>{{ $row['sala'] }} </td>
          <td>{{ $row['fila'] }} </td>
          <td>{{ $row['posicao'] }} </td>
          <td>
              <form action="{{route('carrinho.update', $row['id'])}}" method="POST">
                  @csrf
                  @method('put')
                  <input type="hidden" name="quantidade" value="1">
                  <input type="submit" value="Increment">
              </form>
          </td>
          <td>
              <form action="{{route('carrinho.update', $row['id'])}}" method="POST">
                  @csrf
                  @method('put')
                  <input type="hidden" name="quantidade" value="-1">
                  <input type="submit" value="Decrement">
              </form>
          </td>
          <td>
              <form action="{{route('carrinho.bilhete.destroy', $row['id'])}}" method="POST">
                  @csrf
                  @method('delete')
                  <input type="submit" value="Remove">
              </form>
          </td>
      </tr>
      @endforeach
      </tbody>
  </table>




@endsection
