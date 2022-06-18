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
              <th>Quantity</th>
              <th>Sessao</th>
              <th>Lugar</th>
              <th>Lugar</th>
              <th></th>
              <th></th>
              <th></th>
          </tr>
      </thead>
      <tbody>
      @foreach ($carrinho as $row)
      <tr>
          <td>{{ $row['qtd'] }} </td>
          <td>{{ $row['sessao'] }} </td>
          <td>{{ $row['lugar'] }} </td>
          <td>{{ $row['filme'] }} </td>
          <td>
              <form action="{{route('carrinho.update_bilhete', $row['id'])}}" method="POST">
                  @csrf
                  @method('put')
                  <input type="hidden" name="quantidade" value="1">
                  <input type="submit" value="Increment">
              </form>
          </td>
          <td>
              <form action="{{route('carrinho.update_bilhete', $row['id'])}}" method="POST">
                  @csrf
                  @method('put')
                  <input type="hidden" name="quantidade" value="-1">
                  <input type="submit" value="Decrement">
              </form>
          </td>
          <td>
              <form action="{{route('carrinho.destroy_bilhete', $row['id'])}}" method="POST">
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
