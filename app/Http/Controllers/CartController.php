<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    //
    public function cartView()
    {
        $products = Cart::content();
        return view('users.cart', compact('products'));
    }

    public function cartPost(Request $request)
    {
        $request->validate([
            'action' => 'required',
        ]);
        if ($request->action == "delete") {

            Cart::remove($request->rowId);
            $products = Cart::content();
            return redirect()->route('cartView');
        }
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            $request->idProduct => 'require',
        ]);
        $product = Product::findOrFail($request->idProduct);
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->quantity,
            'price' => $product->price,
            'weight' => $product->weight,
            'options' => [
                'pricePledge'=>$product->pricePledge,
                'image' => $product->image,
                'height' => $product->height,
                'description' => $product->description,
            ],
        ]);
        return "Корзина (". Cart::content()->count() .")";
    }

    public function changeQuantity(Request $request)
    {
        $rowId = $request->rowId;
        $carts = Cart::search(function ($cartItem, $rowId) {
            return $cartItem->rowId === $rowId;
        });
        $qty = 1;
        foreach ($carts as $cart) {
            $qty = $cart->qty;
        }
        if ($request->change_to == 'up') {
            Cart::update($request->rowId, $qty + 1);
        } else {
            Cart::update($request->rowId, $qty - 1);
        }
        return redirect()->route('cartView');
    }



}
