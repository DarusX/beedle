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
                <th></th>
            </tr>
        </thead>
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
        <tbody>
            @foreach(Auth::user()->carts as $cart)
            <tr>
                <td class="text-center">
                    <a href="{{route('client.remove', $cart->id)}}" class="destroy">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
                <td>{{$cart->product->product}} - {{$cart->color->color}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{number_format($cart->product->price, 2)}}</td>
                <td>{{number_format($cart->total, 2)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <purchase></purchase>
    <form action="" method="POST" id="card-form">
        <span class="card-errors"></span>
        <div>
            <label>
                <span>Cardholder name</span>
                <input type="text" size="20" data-conekta="card[name]">
            </label>
        </div>
        <div>
            <label>
                <span>Card number</span>
                <input type="text" size="20" data-conekta="card[number]">
            </label>
        </div>
        <div>
            <label>
                <span>CVC</span>
                <input type="text" size="4" data-conekta="card[cvc]">
            </label>
        </div>
        <div>
            <label>
                <span>Expiration date (MM/YYYY)</span>
                <input type="text" size="2" data-conekta="card[exp_month]">
            </label>
            <span>/</span>
            <input type="text" size="4" data-conekta="card[exp_year]">
        </div>
        <button type="submit">Create token</button>
    </form>
</div>
@endsection @section('scripts')
<script src="https://cdn.conekta.io/js/latest/conekta.js"></script>
<script>
    Conekta.setPublicKey('key_KJysdbf6PotS2ut2');

    var conektaSuccessResponseHandler = function (token) {
        var $form = $("#card-form");
        //Add the token_id in the form
        $form.append($('<input type="hidden" name="conektaTokenId" id="conektaTokenId">').val(token.id));
        $form.get(0).submit(); //Submit
    };
    var conektaErrorResponseHandler = function (response) {
        var $form = $("#card-form");
        $form.find(".card-errors").text(response.message_to_purchaser);
        $form.find("button").prop("disabled", false);
    };

    //jQuery generate the token on submit.
    $(function () {
        $("#card-form").submit(function (event) {
            var $form = $(this);
            // Prevents double clic
            $form.find("button").prop("disabled", true);
            Conekta.Token.create(tokenParams, conektaSuccessResponseHandler, conektaErrorResponseHandler);
            return false;
        });
    });
    Conekta.setPublicKey("key_eYvWV7gUaMyaN4iD");
    var tokenParams = {
        "card": {
            "number": "4242424242424242",
            "name": "Fulanito Pérez",
            "exp_year": "2020",
            "exp_month": "12",
            "cvc": "123",
            "address": {
                "street1": "Calle 123 Int 404",
                "street2": "Col. Condesa",
                "city": "Ciudad de Mexico",
                "state": "Distrito Federal",
                "zip": "12345",
                "country": "Mexico"
            }
        }
    };
    Conekta.Token.create(tokenParams, successResponseHandler, errorResponseHandler);

</script> @endsection