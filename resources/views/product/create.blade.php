@extends('layouts.app')
@section('content')
<div class="col-sm-6">
    <form action="{{route('product.store')}}" method="post">
        {{csrf_field()}}
        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
            <label for="" class="control-label">Categoría</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $c)
                <option value="{{$c->id}}" {{($c->id == old('category_id')? 'selected': '')}}>{{$c->category}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group{{ $errors->has('brand_id') ? ' has-error' : '' }}">
            <label for="" class="control-label">Marca</label>
            <select name="brand_id" class="form-control">
                @foreach($brands as $b)
                <option value="{{$b->id}}" {{($b->id == old('brand_id')? 'selected': '')}}>{{$b->brand}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group{{ $errors->has('product') ? ' has-error' : '' }}">
            <label for="" class="control-label">Producto</label>
            <input type="text" name="product" class="form-control" value="{{old('product')}}">
        </div>
        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="" class="control-label">Descripción</label>
            <textarea name="description" id="description" rows="10" class="form-control">{{old('description')}}</textarea>
        </div>
        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
            <label for="" class="control-label">Precio</label>
            <input type="text" name="price" class="form-control" value="{{old('price')}}">
        </div>
        <div class="input-group">
            <button class="btn btn-default">Aceptar</button>
        </div>
    </form>
</div>
@endsection
@section('scripts')
<script src="//cdn.ckeditor.com/4.9.2/basic/ckeditor.js"></script>
<script>
    CKEDITOR.replace("description");
</script>
@endsection