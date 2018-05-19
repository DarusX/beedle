@extends('layouts.app')
@section('content')
@include('administrator.menu')
<div class="col-sm-12">
    <h1><strong>Categorías</strong></h1>
    <table class="table">
        <thead>
            <tr>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $c)
            <tr>
                <td>{{$c->category}}</td>
                <td>
                    <a href="{{route('category.edit', $c->id)}}" class="btn btn-default btn-xs"><i class="fas fa-edit"></i></a>
                    <a href="{{route('category.destroy', $c->id)}}" class="btn btn-danger btn-xs destroy"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection