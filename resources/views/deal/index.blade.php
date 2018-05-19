@extends('layouts.app')
@section('content')
@include('administrator.menu')
<div class="col-sm-12">
    <h1><strong>Ofertas</strong></h1>
    <table class="table">
        <thead>
            <tr>
                <th>Oferta</th>
                <th>Producto</th>
                <th>Código</th>
                <th>Expiración</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deals as $d)
            <tr>
                <td>{{$d->deal}}</td>
                <td>{{$d->product->product}}</td>
                <td>{{$d->code}}</td>
                <td>{{$d->expiration}}</td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection