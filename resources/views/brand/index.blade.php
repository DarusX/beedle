@extends('layouts.app')
@section('content')
<div class="col-sm-12">
    <h1><strong>Marcas</strong></h1>
    <table class="table">
        <thead>
            <tr>
                <th>Marca</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($brands as $b)
            <tr>
                <td>{{$b->brand}}</td>
                <td></td>
                <td></td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection