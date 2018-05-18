<div class="row">

    <div class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            @foreach($banners as $a)
            <div class="item {{ ($loop->first) ? 'active' : '' }}">
                <img src="{{asset($a->banner)}}" alt="..." class="img-responsive">
                <div class="carousel-caption">
                    <a href="{{$a->page}}" class="btn btn-lg btn-success">Comprar</a>
                </div>
            </div>
            @endforeach
            
        </div>
        <a class="left carousel-control" href=".carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href=".carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>