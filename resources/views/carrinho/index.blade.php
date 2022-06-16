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
              <th>Nome</th>
              <th>Preco</th>
              <th>Estado</th>
              <th>Data</th>
              <th>Fila</th>
              <th>Banco</th>
              <th>Sala</th>
              <th></th>
              <th></th>
              <th></th>
          </tr>
      </thead>
      <tbody>
      @foreach ($carrinho as $row)
      <tr>
          <td>{{ $row['qtd'] }} </td>
          <td>{{ $row['nome'] }} </td>
          <td>{{ $row['preco'] }} </td>
          <td>{{ $row['estado'] }} </td>
          <td>{{ $row['data'] }} </td>
          <td>{{ $row['fila'] }} </td>
          <td>{{ $row['banco'] }} </td>
          <td>{{ $row['sala'] }} </td>
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
