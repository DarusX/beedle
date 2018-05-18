<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Categorías
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li id="categories-menu">
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Marcas
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li id="brands-menu">
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                <li>
                    <a href="{{ route('login') }}">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}">Register</a>
                </li>
                @else @if(Auth::user()->carts->count() > 0)
                <li>
                    <a href="{{route('client.cart')}}">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </li>
                @endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->fullName }}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="#" id="logout">Logout</a>
                        </li>
                        <li>
                            <a href="{{route('home')}}">Perfil</a>
                        </li>
                        <li>
                            <a href="#" id="coupon-link">Añadir Cupón</a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@if(!Auth::guest())
<div class="modal fade" id="modal-coupon" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Añadir Cupón</h4>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="form-deal-code">
                    {{csrf_field()}}
                   
                    <div class="form-group">
                        <label for="">Código</label>
                        <input type="text" name="code" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success" onclick="validateCode()"><i class="fas fa-check"></i> Aceptar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-select-color" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="deal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-4">
                        <img src="" alt="" class="img-responsive" id="img-deal">
                    </div>
                    <div class="col-xs-8">
                        <form action="{{route('client.add')}}" method="post" id="form-add-product">
                            {{csrf_field()}}
                            <input type="hidden" name="quantity" id="deal-quantity">
                            <input type="hidden" name="product_id" id="deal-product_id">
                            <div class="form-group">
                                <label for="">Color</label>
                                <select name="color_id" class="form-control" id="deal-color">

                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success" onclick="$('#form-add-product').submit()"><i class="fas fa-check"></i> Aceptar</button>
            </div>
        </div>
    </div>
</div>
@endif