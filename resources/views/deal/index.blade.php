@extends('layouts.app')
@section('content')
<div class="col-sm-12">
    <h1><strong>Productos</strong></h1>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Disponible</th>
                <th>Visible</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr>
                <td>{{$p->product}}</td>
                <td></td>
                <td></td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection