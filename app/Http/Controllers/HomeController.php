<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Orders;
use App\Models\Products;
use App\Models\OrderItem;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function products($id)
    {

        $products=Products::where('cat_id',$id)->get();
        //$products=User::get();
        //return $products;
        return view('products',compact('products'));
    }
    public function categories()
    {
        $category=Category::get();
        //return $products;
        return view('welcome',compact('category'));
    }
    public function addToCart(Request $request)
    {

        $id=$request->id;
        $product = Products::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            return  $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "prod_id" => $product->id
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function cart(){
        return view('cart');
    }
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function saveorder(Request $req){
        $oldCart = session()->get('cart');
        $pass=Str::random(10);
        $user=new User();
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($pass);
        $user->save();
        $cust=new Customers();
        $cust->user_id=$user->id;
        $cust->phone=$req->phone;
        $cust->save();
        //return $cust;
        $order=new Orders;
        $order->prod_name = count($oldCart);
        $order->cust_id = $cust->id;//$value['name'];
        $order->prod_id=2;
        $order->total =$req->total;
        //$order->customer_id = $value['price']; // you can add this to tag the customer info
        $order->save();

        $oid=$order->id;
        $orderItems = [];
    foreach ($oldCart as $key => $value) {
    $orderItems[] = [
        'order_id' => $oid,
        'prod_id' => $value['prod_id'],
        'quantity' => $value['quantity'],
        'price' => $value['price'],
        'name' => $value['name']
    ];
}
OrderItem::insert($orderItems);
        //dd($oldCart);
        $req-> session() -> flush();
return redirect()->route('homee')->with('order','order created succesful');

    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
