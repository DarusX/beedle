@extends('layouts.app')
@section('content')
@include('administrator.menu')
<div class="col-sm-12">
    <h1><strong>Marca</strong></h1>
</div>
<div class="col-sm-6">
    <form action="{{route('brand.update', $brand)}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
            <label for="" class="control-label">Marca</label>
            <input type="text" name="brand" class="form-control" value="{{$brand->brand}}">
        </div>
        <div class="input-group">
            <button class="btn btn-success">Aceptar</button>
        </div>
    </form>
</div>
@endsection