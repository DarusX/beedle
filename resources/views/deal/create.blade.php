@extends('layouts.app') @section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> @endsection @section('content')
<form action="{{route('deal.store')}}" method="post">
    {{csrf_field()}}
    <input type="hidden" name="visible" value="0">
    <div class="col-sm-4">
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
    </div>
    <div class="col-sm-4">
        <form action="{{route('deal.store')}}" method="post" enctype="multipart/form-data">
            <div class="form-group{{ $errors->has('deal') ? ' has-error' : '' }}">
                <label for="" class="control-label">Oferta</label>
                <input type="text" name="deal" class="form-control">
            </div>
            <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                <label for="" class="control-label">Código</label>
                <input type="text" name="code" class="form-control">
            </div>
            <div class="form-group{{ $errors->has('expiration') ? ' has-error' : '' }}">
                <label for="" class="control-label">Expiración</label>
                <input type="text" name="expiration" class="form-control">
            </div>
            <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                <label for="" class="control-label">Cantidad</label>
                <input type="text" name="quantity" class="form-control">
            </div>
        </form>
    </div>
</form>
@endsection @section('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdn.ckeditor.com/4.9.2/basic/ckeditor.js"></script>
<script>
    CKEDITOR.replace("description");
    $("[name='expiration']").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd"
    })
</script> @endsection