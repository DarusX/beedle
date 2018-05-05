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
        $products = array();
        $user = Auth::user();
        foreach (Auth::user()->carts as $cart) {
            array_push($products, [
                'name' => $cart->product->product . ' - ' . $cart->color->color,
                'unit_price' => $cart->product->price * 100,
                'quantity' => $cart->quantity
            ]);
        }
        Conekta::setApiKey("key_tKqskNzUHpQjoszXtcWAzw");
        Conekta::setApiVersion("2.0.0");

        try {
            $order = \Conekta\Order::create([
                'line_items' => $products,
                'shipping_lines' => [[
                    'amount' => 0,
                    'carrier' => 'FEDEX'
                ]],
                'currency' => 'MXN',
                'customer_info' => [
                    'name' => $user->fullName,
                    'email' => $user->email,
                    'phone' => '+5218181818181'
    
                ],
                'shipping_contact' => [
                    'address' => [
                        'street1' => 'Calle Falsa 123',
                        'postal_code' => '86000',
                        'country' => 'MX'
                    ],
                ],
                'charges' => [[
                    'payment_method' => [
                        'type' => 'oxxo_cash'
                    ]
                ]]
            ]);
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
