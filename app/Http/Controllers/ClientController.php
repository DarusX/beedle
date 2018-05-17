<?php


namespace App\Http\Controllers;

require_once(app_path().'\Libraries\Conekta\Conekta.php');

use Illuminate\Http\Request;
use Auth;
use App\Cart;
use App\User;
use Conekta\Conekta;
use App\Deal;
use App\Order;
use App\Municipality;
use DB;
use Carbon\Carbon;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addToCart(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'color_id' => 'required',
            'quantity' => 'required',
        ]);
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
    public function validateCode(Request $request)
    {
        
        return Deal::with([
            'product' => function($query){
                $query->with('colors', 'photos');
            }
        ])->whereRaw('BINARY code = ?', [$request->code])->where('expiration', '>', Carbon::now())->first();

    }

    public function generateOrder(Request $request)
    {
        $municipality =  Municipality::find($request->municipality_id);
        $order = Order::create([
            'user_id' => Auth::id(),
            'municipality_id' => 1,
            'address' => $request->address . ', ' . 
            $municipality->municipality . ', ' . $municipality->state->state
        ]);
        foreach (Auth::user()->carts as $cart){
            $order->products()->create([
                'product_id' => $cart->product->id,
                'color_id' => $cart->color->id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->price
            ]);
        }
        Auth::user()->carts()->delete();
        
        return redirect()->route('client.order', $order->id);
    }

    public function order($id)
    {
        return view('client.order')->with([
            'order' => Order::find($id)
        ]);
    }
    public function generatePayment(Request $request)
    {
        
        $order = Order::create([
            'user_id' => Auth::id(),
            'municipality_id' => 1,
            'address' => $request->address . ', ' . $municipality->municipality . ', ' . $municipality->state->state
        ]);
        foreach (Auth::user()->carts as $cart){
            $order->products()->create([
                'product_id' => $cart->product->id,
                'color_id' => $cart->color->id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->price
            ]);
        }
        $products = [];
        $user = Auth::user();
        foreach (Auth::user()->carts as $cart) {
            array_push($products, [
                'name' => $cart->product->product . ' - ' . $cart->color->color,
                'unit_price' => $cart->product->price * 100,
                'quantity' => $cart->quantity
                ]
            );
        }
        Auth::user()->carts()->delete();
        Conekta::setApiKey("key_tKqskNzUHpQjoszXtcWAzw");
        Conekta::setApiVersion("2.0.0");

        try {
            $conektaOrder = \Conekta\Order::create([
                'line_items' => $products,
                'shipping_lines' => [[
                    'amount' => 0,
                    'carrier' => 'FEDEX'
                ]],
                'currency' => 'MXN',
                'customer_info' => [
                    'name' => $user->fullName,
                    'email' => $user->email,
                    'phone' => '18181818181'
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
            $order->conekta_id = $conektaOrder->id;
            $order->save();
            return view('client.payment')->with([
                'order' => $conektaOrder
            ]);
          } catch (\Conekta\ParameterValidationError $error){
            echo $error->getMessage();
          } catch (\Conekta\Handler $error){
            echo $error->getMessage();
          }
    }
}
