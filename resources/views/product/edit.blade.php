@extends('layouts.app')
@section('content')
<div class="col-sm-12">
    <h1>Producto</h1>
</div>
<div class="col-sm-4">
    <h2>Características</h2>
    <form action="{{route('product.update', $product->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
            <label for="" class="control-label">Categoría</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $c)
                <option value="{{$c->id}}" {{$c->id == $product->category_id ? 'selected': ''}}>{{$c->category}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group{{ $errors->has('brand_id') ? ' has-error' : '' }}">
            <label for="" class="control-label">Marca</label>
            <select name="brand_id" class="form-control">
                @foreach($brands as $b)
                <option value="{{$b->id}}" {{($b->id == $product->brand_id? 'selected': '')}}>{{$b->brand}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group{{ $errors->has('product') ? ' has-error' : '' }}">
            <label for="" class="control-label">Producto</label>
            <input type="text" name="product" class="form-control" value="{{$product->product}}">
        </div>
        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="" class="control-label">Descripción</label>
            <textarea name="description" id="description" rows="10" class="form-control">{{$product->description}}</textarea>
        </div>
        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
            <label for="" class="control-label">Precio</label>
            <input type="text" name="price" class="form-control" value="{{$product->price}}">
        </div>
        <div class="input-group">
            <button class="btn btn-default">Aceptar</button>
        </div>
    </form>
</div>
<div class="col-sm-4">
    <h2>Fotos</h2>
    <form action="{{route('photo.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <div class="form-group">
            <label for="">Foto</label>
            <input type="file" name="photo" required>
        </div>
        <div class="form-group">
            <button class="btn btn-default">Aceptar</button>
        </div>
    </form>
    <div class="row">
        @foreach($product->photos->chunk(3) as $chunk)
            @foreach($chunk as $photo)
            <div class="col-sm-6">
                <img src="{{asset($photo->photo)}}" alt="" class="img-responsive thumbnail">
            </div>
            @endforeach
            <div class="col-sm-12">
            </div>
        @endforeach
    </div>
</div>
<div class="col-sm-4">
    <h2>Colores</h2>
    <form action="" method="post">
        @foreach($colors as $c)
        <div class="checkbox">
            <label for="">
                <input type="checkbox" name="color_id[]" value="$c->id">{{$c->color}}
            </label>
        </div>
        @endforeach
    </form>
</div>
@endsection