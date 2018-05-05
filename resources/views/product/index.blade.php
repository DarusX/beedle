@extends('layouts.app')
@section('content')
<div class="col-sm-12">
    <h1><strong>Productos</strong></h1>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr>
                <td>{{$p->product}}</td>
                <td>
                    <a href="" class="btn btn-warning btn-xs"><i class="fas fa-toggle-{{($p->available) ? 'on' : 'off'}}"></i></a>
                    <a href="" class="btn btn-warning btn-xs"><i class="fas fa-eye{{($p->visible) ? '' : '-slash'}}"></i></a>
                    <a href="{{route('product.edit', $p->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
                    <a href="{{route('product.destroy', $p->id)}}" class="btn btn-danger btn-xs destroy"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection