@extends('layouts.app') @section('css')
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" /> @endsection @section('content')
<div class="col-sm-12">
    <h1>
        <strong>{{$product->product}}</strong>
    </h1>
    @if(!$product->available)
    <div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        No disponible
    </div>
    @endif
</div>
<div class="col-sm-6">
    <div class="owl-carousel owl-theme">
        @foreach($product->photos as $p)
        <div class="item">
            <a data-fancybox="gallery" href="{{asset($p->photo)}}">
                <img src="{{asset($p->photo)}}" class="img-responsive">
            </a>
        </div>
        @endforeach
    </div>
</div>
<div class="col-sm-6">
    <label for="">Descripcion</label>
    {!!$product->description!!}
    <form action="{{route('client.add')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <div class="form-group">
            <label for="">Color</label>
            <br> @foreach($product->colors as $c)
            <div class="radio">
                <label for="">
                    <input type="radio" name="color_id" value="{{$c->id}}">
                    <span>{{$c->color}}</span>
                </label>
            </div>
            @endforeach
        </div>
        <div class="form-group">
            <label for="">Cantidad</label>
            <input type="number" name="quantity" class="form-control">
        </div>
        <div class="form-group">
            @if(!Auth::guest() && $product->visible && $product->available)
            <button type="submit" class="btn btn-default">Aceptar</button>
            @endif
        </div>
    </form>
</div>
@endsection @section('scripts')
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 4000,
        margin: 10,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
</script> @endsection