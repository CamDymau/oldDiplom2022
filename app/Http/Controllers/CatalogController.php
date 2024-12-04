<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public $pag = 6;

    public function showCatalog($id)
    {
        $products = Product::where('category_id', $id)->orderBy('price', 'asc')->paginate($this->pag);
        session(['category' => $id]);

        $carts = Cart::content();
        return view('product.showProduct', compact('products', 'carts'));
    }
    public function showProduct($id){
        $products = Product::where('id', $id)->get();
        $carts = Cart::content();
        return view('product.thisProduct', compact('products', 'carts'));
    }

    public function sortBy(Request $request)
    {
        $val = explode(',', $request->orderBy);
        $products = Product::where('category_id', session('category'))->orderBy($val[0], $val[1])->paginate($this->pag);

        $carts = Cart::content();
        return view('product.showProduct', compact('products', 'carts'));
    }

    public function search(Request $request)
    {
        $result = Product::where('name', 'LIKE', "%{$request['search']}%")->get();
        return $result;
    }

    public function sortPrice(Request $request)
    {

        $products = Product::where(
            [
                ['category_id', '=', session('category')],
                ['price', '<', $request->biggerPrice != '' ? $request->biggerPrice : 100000],
                ['price', '>', $request->smallerPrice != '' ? $request->smallerPrice : 0],
            ])->orderBy('price', 'asc')->paginate($this->pag);
        $carts = Cart::content();
        return view('product.showProduct', compact('products', 'carts'));
    }
}
