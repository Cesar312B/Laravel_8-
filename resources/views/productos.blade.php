@extends('layouts.vistapadre')

@section('content')
    <table class="table table-striped|sm|bordered|hover|inverse table-inverse table-responsive">
        <thead class="thead-inverse|thead-default">
            <tr>
                <th>Id</th>
                <th>Descripcion</th>
                <td>Categorias</td>
            </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                 
                        <td>{{$producto->id}}</td>
                        <td>{{$producto->descripcion}}</td>
                        <td>{{$producto->categorias->descripcion}}</td>
                    </tr> 

                @endforeach
               
            </tbody>
    </table>
    

@endsection