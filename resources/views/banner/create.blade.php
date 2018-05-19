@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection
@section('content')
@include('administrator.menu')
<div class="col-sm-6">
    <form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group{{ $errors->has('expiration') ? ' has-error' : '' }}">
            <label for="" class="control-label" >Expiración</label>
            <input type="text" class="form-control" name="expiration">
        </div>
        <div class="form-group{{ $errors->has('page') ? ' has-error' : '' }}">
            <label for="" class="control-label" >Página</label>
            <input type="text" class="form-control" name="page">
        </div>
        <div class="form-group{{ $errors->has('banner') ? ' has-error' : '' }}">
            <label for="" class="control-label" >Banner</label>
            <input type="file" name="banner">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Aceptar</button>
        </div>
    </form>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $("[name='expiration']").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd"
    })
</script>
@endsection