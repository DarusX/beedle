@extends('layouts.app')
@section('content')
<div class="col-sm-12">
    <h1><strong>{{$product->product}}</strong></h1>
</div>
<div class="col-sm-6">

</div>
<div class="col-sm-6">
    {!!$product->description!!}
    <form action="{{route('buyer.add_to_cart')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <div class="form-group">
            <label for="">Color</label>
            @foreach($product->colors as $c)
            <div class="checkbox">
                <label for="">
                    <input type="checkbox" name="color_id" value="{{$c->id}}">{{$c->color}}
                </label>
            </div>
            @endforeach
        </div>
        <div class="form-group">
            <label for="">Cantidad</label>
            <input type="number" name="quantity" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Aceptar</button>
        </div>
    </form>
</div>
@endsection