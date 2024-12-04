<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::orderBy("name")->get();
        return view('admin.admin-settings', compact('products'));
    }
    public function showOrder()
    {
        $orders = Order::get();
        return view('admin.adminCRUD', compact('orders'));
    }
    public function addNewOrder()
    {
        $categories = Category::get();
        return view('admin.adminOrderCreate', compact('categories'));
    }
    public function adminOrderUpdate($id)
    {
        $orders = Order::where('id', $id)->get();
        $statuses = Status::get();
        return view('admin.adminOrderUpdate', compact('orders','statuses'));
    }
    public function adminProductUpdate($id)
    {
        $products = Product::where('id', $id)->get();
        $categories = Category::get();
        return view('admin.adminProductUpdate', compact('products','categories'));
    }
    public function uploadOrder(Request $request)
    {
        $date = $request->only('status_id');
        Order::where('id', $request->idOrder)->update($date);
        $orders = Order::get();
        return view('admin.adminCRUD', compact('orders'));
    }
    public function uploadProduct(Request $request)
    {
        if ($request->file('image') != null) {
            $img = explode('/', $request->file('image')->store('public'))[1];
            $date = [
                'image' => $img,
            ];
            $date += $request->only('name','category_id','price','pricePledge','height','weight','description');
        }else {
            $date = $request->only('name', 'category_id', 'price','pricePledge', 'height', 'weight', 'description');
        }

        Product::where('id', $request->idOrder)->update($date);

        $products = Product::get();
        return view('admin.admin-settings', compact('products'));
    }
    public function deleteOrder($id){
        Order::where('id',$id)->delete();
        $orders = Order::get();
        return view('admin.adminCRUD', compact('orders'));
    }
    public function deleteProduct($id){
        Product::where('id',$id)->delete();
        $products = Product::get();
        return view('admin.admin-settings', compact('products'));
    }
    public function addNewProduct()
    {
        $categories = Category::get();
        return view('admin.createNew',compact('categories'));
    }

    public function createNewProduct(Request $request)
    {
        $request->validate([
            'image'=>'required|file|mimes:jpeg,bmp,png|max:10240',
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required|regex:/([0-9])/',
            'pricePledge' => 'required|regex:/([0-9])/',
            'height' => 'required|regex:/([0-9])/',
            'weight' => 'required|regex:/([0-9])/',
        ]);
        $img = explode('/',$request->file('image')->store('public'))[1];

        $date = [
            'image'=>$img,
        ];
        $date+=$request->only('name','category_id','price','pricePledge','height','weight','description');

        Product::create($date);
        $products = Product::orderBy("name")->get();
        return view('admin.admin-settings', compact('products'));
    }
}
