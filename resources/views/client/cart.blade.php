@extends('layouts.app') @section('content')
<div class="col-sm-12">
    <h1>
        <strong>Carrito</strong>
    </h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach(Auth::user()->carts as $cart)
            <tr>
                <td class="text-center">
                    <a href="{{route('client.remove', $cart->id)}}" class="btn btn-danger btn-xs destroy">
                        <i class="fas fa-times"></i>
                    </a>
                </td>
                <td>
                    <a href="{{route('producto', $cart->product->id)}}">{{$cart->product->product}} - {{$cart->color->color}}</a>
                </td>
                <td>{{$cart->quantity}}</td>
                <td>$ {{number_format($cart->product->price, 2)}}</td>
                <td>$ {{number_format($cart->total, 2)}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <strong>Total:</strong>
                </td>
                <td>$ {{number_format(Auth::user()->carts->sum('total'), 2)}}</td>
            </tr>
        </tfoot>
    </table>
    <button class="btn btn-success pull-right" onclick="modalAddress()"><i class="fas fa-archive"></i> Finalizar</button>
    <div class="modal fade" id="modalAddress" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Dirección de envío</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('client.generate.order')}}" method="post" id="formGenerateOrder">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="">Dirección</label>
                                    <small>Calle, Número, Colonia, CP, Ciudad </small>
                                    <input type="text" name="street" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="">Número</label>
                                <input type="text" name="number" class="form-control">
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="">Colonia</label>
                                    <input type="text" name="colony" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="">CP</label>
                                <input type="text" name="postal_code" class="form-control">
                            </div>
                            <div class="col-sm-12">
                                <label for="">Ciudad</label>
                                <input type="text" name="city" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Estado</label>
                                    <select name="state_id" class="form-control" id="state_id" onchange="loadMunicipalities()">
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Municipio</label>
                                    <select name="municipality_id" class="form-control" id="municipality_id">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                    <button type="button" class="btn btn-success" onclick="$('#formGenerateOrder').submit()"><i class="fas fa-check"></i> Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection