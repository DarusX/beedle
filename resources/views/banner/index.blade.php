@extends('layouts.app')
@section('content')
@include('administrator.menu')
<div class="col-sm-12">
    <h1><strong>Banners</strong></h1>
    <table class="table">
        <thead>
            <tr>
                <th>Banner</th>
                <th>Expiración</th>
                <th>Página</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banners as $b)
            <tr>
                <td><a href="{{$b->banner}}">Banner</a></td>
                <td>{{$b->expiration}}</td>
                <td><a href="{{$b->page}}">{{$b->page}}</a></td>
                <td>
                    <a href="{{route('banner.edit', $b->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
                    <a href="{{route('banner.destroy', $b->id)}}" class="btn btn-danger btn-xs destroy"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection