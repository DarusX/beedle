<div class="col-sm-12">
    <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categorías
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li>
                <a href="{{route('category.index')}}">Categorías</a>
            </li>
            <li>
                <a href="{{route('category.create')}}">Crear</a>
            </li>
        </ul>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Marcas
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li>
                <a href="{{route('brand.index')}}">Marcas</a>
            </li>
            <li>
                <a href="{{route('brand.create')}}">Crear</a>
            </li>
        </ul>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Colores
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li>
                <a href="{{route('color.index')}}">Colores</a>
            </li>
            <li>
                <a href="{{route('color.create')}}">Crear</a>
            </li>
        </ul>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Productos
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li>
                <a href="{{route('product.index')}}">Productos</a>
            </li>
            <li>
                <a href="{{route('product.create')}}">Crear</a>
            </li>
        </ul>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Ofertas
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li>
                <a href="{{route('deal.index')}}">Ofertas</a>
            </li>
            <li>
                <a href="{{route('deal.create')}}">Crear</a>
            </li>
        </ul>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Banners
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li>
                <a href="{{route('banner.index')}}">Banners</a>
            </li>
            <li>
                <a href="{{route('banner.create')}}">Crear</a>
            </li>
        </ul>
    </div>
</div>