<?php

namespace App\Http\Controllers;


use App\Models\Category;

use App\Models\Order;

use App\Models\Product;
use App\Models\Status;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{


    public function index()
    {
        $categories = Category::get();
        return view('Orders.add', compact('categories'));
    }

    public function getOrder()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('Orders.outPut', compact('orders'));
    }

    public function addOrder(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required|file|mimes:jpeg,bmp,png|max:10240',
        ]);

        $img = explode('/', $request->file('image')->store('public'))[1];

        $date = [
            'photo' => $img,
            'user_id' => Auth::id(),
            'status_id' => '3',
        ];
        $date += $request->only('name', 'description', 'category_id');

        Order::create($date);
        if (Auth::user()->role) {
            $orders = Order::get();
            return view('showOrder', compact('orders'));
        }
        $orders = Order::where('user_id', Auth::id())->get();
        return view('getOrder', compact('orders'));
    }
    public function makeOrder(){
        $dates = Cart::content();

        foreach ($dates as $data =>$key){

          Order::create([
              'user_id'=>Auth::id(),
              'status_id'=>1,
              'product_id'=>$key->id,
              'quantity'=>$key->qty,
          ]);
        }
        $orders = Order::where('user_id', Auth::id())->get();
        return view('Orders.outPut', compact('orders'));

    }
    public function deleteOrder($id){
        Order::where('id',$id)->delete();
        $orders = Order::where('user_id', Auth::id())->get();
        return view('Orders.outPut', compact('orders'));
    }
}
