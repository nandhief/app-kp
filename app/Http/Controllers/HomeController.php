<?php

namespace App\Http\Controllers;

use Session;
use App\Cart;
use App\Report;
use App\Product;
use App\Transaction;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('dashboard', compact('products'));
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : NULL;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id, $request->qty);
        Session::put('cart', $cart);
        return redirect()->route('home.index');
    }
    
    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : NULL;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        Session::put('cart', $cart);
        return redirect()->route('shopcart.shoppingcart');
    }

    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart', $cart);
        return redirect()->route('shopcart.shoppingcart');
    }

    public function postCheckout(Request $request)
    {
        if ($request->btn == 'reset') {
            session()->forget('cart');
            return redirect()->route('home.index')->with('message', 'Berhasil reset cart');
        }
        if (!session()->has('cart')) {
            return redirect()->route('home.index');
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $invoice = is_null(Transaction::orderBy('id', 'desc')->first()) ? '1' : Transaction::orderBy('id', 'desc')->first()->id+1;
        try {
            $order = new Transaction;
            $order->invoice = 'T-INV' . $invoice;
            $order->cart = serialize($cart);
            if (!empty($request->name)) {
                $order->name = $request->name;
            }
            if (!empty($request->address)) {
                $order->address = $request->address;
            }
            auth()->user()->orders()->save($order);
            foreach ($cart->items as $r) {
                $report = new Report;
                $report->transaction_id = $order->id;
                $report->category_id = $r['item']['category_id'];
                $report->product_id = $r['item']['id'];
                $report->qty = $r['qty'];
                $report->total = $r['price'];
                $order->reports()->save($report);
            }
        } catch (\Exception $e) {
            return redirect()->route('home.index')->with('error', $e->getMessage());
        }
        foreach ($cart->items as $item) {
            $product = Product::findOrFail($item['item']->id);
            $qty = $product->inventory->quantity - $item['qty'];
            $product->inventory->quantity = $qty;
            $product->inventory->save();
        }
        session()->forget('cart');
        return redirect()->route('home.index')->with('message', 'Transaksi berhasil');
    }
}
