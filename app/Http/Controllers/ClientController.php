<?php


namespace App\Http\Controllers;

require_once(app_path().'\Libraries\Conekta\Conekta.php');

use Illuminate\Http\Request;
use Auth;
use App\Cart;
use App\User;
use Conekta\Conekta;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addToCart(Request $request)
    {
        Auth::user()->carts()->create($request->all());
        return redirect()->route('client.cart');
    }
    public function removeFromCart($id)
    {
        Cart::destroy($id);
    }
    public function cart()
    {
        return view('client.cart');
    }
    public function generatePayment()
    {
        Conekta::setApiKey("key_tKqskNzUHpQjoszXtcWAzw");
        Conekta::setApiVersion("2.0.0");
        try{
            $order = \Conekta\Order::create(
              array(
                "line_items" => array(
                  array(
                    "name" => "Tacos",
                    "unit_price" => 29900,
                    "quantity" => 1
                  )//first line_item
                ), //line_items
                "shipping_lines" => array(
                  array(
                    "amount" => 0,
                    "carrier" => "FEDEX"
                  )
                ), //shipping_lines - physical goods only
                "currency" => "MXN",
                "customer_info" => array(
                  "name" => "Fulanito Pérez",
                  "email" => "fulanito@conekta.com",
                  "phone" => "+5218181818181"
                ), //customer_info
                "shipping_contact" => array(
                  "address" => array(
                    "street1" => "Calle 123, int 2",
                    "postal_code" => "06100",
                    "country" => "MX"
                  )//address
                ), //shipping_contact - required only for physical goods
                "charges" => array(
                    array(
                        "payment_method" => array(
                          "type" => "oxxo_cash"
                        )//payment_method
                    ) //first charge
                ) //charges
              )//order
            );
          } catch (\Conekta\ParameterValidationError $error){
            echo $error->getMessage();
          } catch (\Conekta\Handler $error){
            echo $error->getMessage();
          }
          return view('client.payment')->with([
              'order' => $order
          ]);
    }
}
