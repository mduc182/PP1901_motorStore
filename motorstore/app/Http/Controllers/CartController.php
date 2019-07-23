<?php

namespace App\Http\Controllers;
use App\Model\Cart;
use App\Model\Order;
use Session;
use App\Model\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('cart', compact('products'));
    }

    public function add_cart(Request $request, $id)
    {
            $product = Product::find($id);
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->add($product, $product->id);
            $request->session()->put('cart', $cart);
            return redirect('/');

    }

    public function get_cart()
    {

        if (!Session::has('cart')) {
            return view('cart_info');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart_info', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function delete_cart($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect('cartinfo');
    }

    public function checkout()
    {
        if (!Session::has('cart')) {
            return view('cart_info');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('checkout', ['total' => $total, 'products' => $cart->items]);
    }

    public function store_checkout(Request $request)
    {
        if (!Session::has('cart')) {
            return view('cart_info');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        $orders = new Order();
        $orders->name = $request->get('name');
        $orders->address = $request->get('address');
        $orders->phone = $request->get('phone');
        $orders->product_name = $request->get('product_name');
        $orders->total = $request->get('total');
        $mess = '';

        if ($orders->save()) {
            $mess = trans('messages.ordersuccess');
        }

        return view('checkout', ['total' => $total, 'products' => $cart->items])->with(trans('mess'), $mess);
    }
}
