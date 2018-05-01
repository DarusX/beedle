@extends('layouts.app')
@section('content')
<div class="col-sm-12">
    <h1><strong>Categorías</strong></h1>
    <table class="table">
        <thead>
            <tr>
                <th>Categoría</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $c)
            <tr>
                <td>{{$c->category}}</td>
                <td></td>
                <td></td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection