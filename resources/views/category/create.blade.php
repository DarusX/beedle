@extends('layouts.app')
@section('content')
@include('administrator.menu')
<div class="col-sm-6">
    <form action="{{route('category.store')}}" method="post">
        {{csrf_field()}}
        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
            <label for="" class="control-label">Categoría</label>
            <input type="text" name="category" class="form-control">
        </div>
        <div class="input-group">
            <button class="btn btn-success">Aceptar</button>
        </div>
    </form>
</div>
@endsection