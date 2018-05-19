@extends('layouts.app')
@section('content')
@include('administrator.menu')
<div class="col-sm-12">
    <h1><strong>Categoría</strong></h1>
</div>
<div class="col-sm-6">
    <form action="{{route('category.update', $category)}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
            <label for="" class="control-label">Categoría</label>
            <input type="text" name="category" class="form-control" value="{{$category->category}}">
        </div>
        <div class="input-group">
            <button class="btn btn-success">Aceptar</button>
        </div>
    </form>
</div>
@endsection