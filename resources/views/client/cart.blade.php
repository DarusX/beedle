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
                <td>{{number_format($cart->product->price, 2)}}</td>
                <td>{{number_format($cart->total, 2)}}</td>
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
                <td>{{number_format(Auth::user()->carts->sum('total'), 2)}}</td>
            </tr>
        </tfoot>
    </table>
    <button class="btn btn-default pull-right" onclick="modalAddress()">Finalizar</button>
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
                        <div class="form-group">
                            <label for="">Estado</label>
                            <select name="state_id" class="form-control" id="state_id" onchange="loadMunicipalities()">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Municipio</label>
                            <select name="municipality_id" class="form-control" id="municipality_id">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Dirección</label>
                            <small>Calle, Número, Colonia, CP, Ciudad </small>
                            <textarea name="address" class="form-control"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="$('#formGenerateOrder').submit()">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div id="paypal-button" class="pull-right"></div>
        </div>
        <div class="col-sm-4">
            <a href="{{route('client.generate.payment')}}" target="_blank" class="pull-right">
                <img src="{{asset('img/oxxopay_brand.png')}}" alt="" width="150px">
            </a>
        </div>
    </div>
</div>
@endsection @section('scripts')
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    paypal.Button.render({
        env: 'production',
        client: {
            production: "Aeay4agvqT6LUwvxMn2uPkQ_MEooq-44ZDEcnYQv5CmM8Kv8393h9EoQoJi_zmeb0G8hL7J4jt2AExvP",
            sandbox: ""
        },
        commit: true,
        style: {
            color: 'blue',
            size: 'small'
        },

        payment: function (data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: "{{number_format(Auth::user()->carts->sum('total'), 2)}}", currency: 'MXN' }
                        }
                    ]
                }
            });
        },

        onAuthorize: function (data, actions) {
            return actions.payment.execute().then(function (payment) {
                paid();
            });
        },

        onCancel: function (data, actions) {
            /* 
             * Buyer cancelled the payment 
             */
        },

        onError: function (err) {
        }
    }, '#paypal-button');
    function paid() {
        $.ajax({
            url: "",
            method: "POST",
            data: {
                _method: "PUT",
                _token: "{{csrf_token()}}",
                status_id: 2
            },
            success: function (data) {
                location.reload;
            }
        });
    }
</script> @endsection