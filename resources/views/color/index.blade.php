@extends('layouts.app')
@section('content')
@include('administrator.menu')
<div class="col-sm-12">
    <h1><strong>Colores</strong></h1>
    <table class="table">
        <thead>
            <tr>
                <th>Color</th>
                <th>HEX Color</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($colors as $color)
            <tr>
                <td>
                    <span class="radio-color" style="background: {{$color->hcolor != null ? $color->hcolor :''}}">
                        <i class="fas fa-paint-brush"></i>
                    </span> <span style="margin-left: 10px">{{$color->color}}</span>
                </td>
                <td>{{$color->hcolor}}</td>
                <td>
                    <a href="{{route('color.edit', $color)}}" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a>
                    <a href="{{route('color.destroy', $color)}}" class="btn btn-danger btn-xs destroy"><i class="fas fa-times"></i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection