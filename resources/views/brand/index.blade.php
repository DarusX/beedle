@extends('layouts.app')
@section('content')
@include('administrator.menu')
<div class="col-sm-12">
    <h1><strong>Marcas</strong></h1>
    <table class="table">
        <thead>
            <tr>
                <th>Marca</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($brands as $b)
            <tr>
                <td>{{$b->brand}}</td>
                <td>
                    <a href="{{route('brand.edit', $b->id)}}" class="btn btn-default btn-xs"><i class="fas fa-edit"></i></a>
                    <a href="{{route('brand.destroy', $b->id)}}" class="btn btn-danger btn-xs destroy"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection