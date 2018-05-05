@extends('layouts.app') @section('css')
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}"> @endsection @section('content')
<div class="col-sm-12">
    <h1>
        <strong>{{$product->product}}</strong>
    </h1>
</div>
<div class="col-sm-6">
    <div class="owl-carousel owl-theme">
        @foreach($product->photos as $p)
        <div class="item">
            <img src="{{asset($p->photo)}}" alt="..." class="img-responsive">
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
            @foreach($product->colors as $c)
            <div class="radio">
                <label for="">
                    <input type="radio" name="color_id" value="{{$c->id}}">{{$c->color}}
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
@endsection @section('scripts')
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
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