@extends('layouts.app')
@section('content')
<div class="col-sm-6">
    <form action="{{route('color.store')}}" method="post">
        {{csrf_field()}}
        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
            <label for="" class="control-label">Color</label>
            <input type="text" name="color" class="form-control">
        </div>
        <div class="form-group{{ $errors->has('hcolor') ? ' has-error' : '' }}">
            <label for="" class="control-label">Color HEX</label>
            <input type="text" name="hcolor" class="form-control">
        </div>
        <div class="input-group">
            <button class="btn btn-default">Aceptar</button>
        </div>
    </form>
</div>
@endsection