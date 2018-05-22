@extends('layouts.app')
@section('content')
@include('administrator.menu')
<div class="col-sm-12">
    <h1><strong>Órdenes</strong></h1>
    <table class="table">
        <thead>
            <tr>
                <th>Órden</th>
                <th>Usuario</th>
                <th>Estatus</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>#{{$order->id}}</td>
                <td>{{$order->user->fullName}}</td>
                <td>{{$order->estado}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection