@extends('layouts.app') 
@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
@endsection 
@section('content')
@include('administrator.menu')
<div class="col-sm-6">
    <form action="{{route('deal.update', $deal->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group{{ $errors->has('deal') ? ' has-error' : '' }}">
            <label for="" class="control-label">Oferta</label>
            <input type="text" name="deal" class="form-control" value="{{$deal->deal}}">
        </div>
        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
            <label for="" class="control-label">Código</label>
            <input type="text" name="code" class="form-control" value="{{$deal->code}}">
        </div>
        <div class="form-group{{ $errors->has('expiration') ? ' has-error' : '' }}">
            <label for="" class="control-label">Expiración</label>
            <input type="text" name="expiration" class="form-control" value="{{$deal->expiration}}">
        </div>
        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
            <label for="" class="control-label">Cantidad</label>
            <input type="text" name="quantity" class="form-control" value="{{$deal->quantity}}">
        </div>
        <div class="form-group">
            <a href="{{route('product.edit', $deal->product->id)}}" class="btn btn-default">Producto</a>
            <button type="submit" class="btn btn-success">Aceptar</button>
        </div>
    </form>
</div>
@endsection @section('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $("[name='expiration']").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd"
    })
</script> @endsection