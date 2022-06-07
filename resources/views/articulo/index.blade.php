@extends('adminlte::page')

@section('title', 'Articulos')

@section('content_header')
    <h1>Articulos</h1>
@stop

@section('content')
<p> <a href="articulos/create" class="btn btn-primary">CREAR</a></p>




<table id="articulos" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>ID</th> 
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($articulos as $articulo)

      <tr>
          <td>{{$articulo->id}}</td>
          <td>{{$articulo->codigo}}</td>
          <td>{{$articulo->descripcion}}</td>
          <td>{{$articulo->cantidad}}</td>
          <td>{{$articulo->precio}}</td>
          <td>
           <form action="{{ route('articulos.destroy',$articulo->id) }}" method="POST">
              <a href="/articulos/{{$articulo->id}}/edit" class="btn btn-primary">Editar</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Borrar</button>
           </form>
          </td>
      </tr>
          
      @endforeach
    </tbody>
</table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
    $('#articulos').DataTable({
        "lengthMenu": [[5,10,50,-1],[5,10,50,"All"]]
    });
});
</script>
@stop