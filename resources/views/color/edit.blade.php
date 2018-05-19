@extends('layouts.app')
@section('css')
@endsection
@section('content')
@include('administrator.menu')
<div class="col-sm-6">
    <form action="{{route('color.update', $color)}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
            <label for="" class="control-label">Color</label>
            <input type="text" name="color" class="form-control" value="{{$color->color}}">
        </div>
        <div class="form-group{{ $errors->has('hcolor') ? ' has-error' : '' }}">
            <label for="" class="control-label">Color HEX</label>
            <input type="text" name="hcolor" class="form-control color-input" value="{{$color->hcolor}}" placeholder="#101010">
        </div>
        <div class="input-group">
            <button class="btn btn-success">Aceptar</button>
        </div>
    </form>
</div>
@endsection
@section('scripts')
@endsection