<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Cart;
use App\Models\Order;
use App\Models\product;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Session;
use Stripe;


class HomeController extends Controller
{
    //
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $totalproduct= product::all()->count();
            $totalcustomer= User::where('usertype',"0")->count();
            $totalorder= Order::all()->count();
            $orderdelivered= Order::where('deliverystatus',"Complete")->count();
            $orderprocessing= Order::where('deliverystatus',"processing")->count();
            $orderrev= Order::all();
            $totalrevenue=0;
            foreach($orderrev as $orderrevenue){
                $totalrevenue = $orderrevenue->price+ $totalrevenue;
            }

            return View('admin.home')
            ->with('totalproduct',$totalproduct)
            ->with('totalorder',$totalorder)
            ->with('orderdelivered', $orderdelivered)
            ->with('totalcustomer', $totalcustomer)
            ->with('totalrevenuie', $totalrevenue)

            ->with('orderprocessing', $orderprocessing);
        } else {
            $product = product::paginate(3);

            return View('home.userpage')->with('product', $product);
        }
    }
    public function index()
    {
        $product = product::paginate(3);

        return View('home.userpage')->with('product', $product);
    }
    public function productdetails(Request $req)
    {
        $product = product::where('id', $req->id)->first();

        return View('home.productdetails')->with('product', $product);
    }
    public function addTocart(Request $req,$id)
    {
        if(Auth::id()){
        $user =Auth::user();
        $userid=$user->id;
       $product = product::find($id);
       $product_exist_id = Cart::where('product_id',$product->id)
       ->where('user_id', $userid)->get('id')->first();
       if($product_exist_id){
        $cart = Cart::find($product_exist_id)->first();
        $quantity=  $cart->quantity;
        $cart->quantity=$quantity+$req->quantity;
        if($product->discountprice){
            $cart->price= $product->discountprice * $cart->quantity;
           }
            else{
                $cart->price= $product->price * $cart->quantity;
           }
        $cart->save();
        Alert::success('Success', 'Product added  Succesfully');


       return redirect()->back()->with('message','Product added  Succesfully');

       }
       else{
        $cart = new Cart();
       $cart->name= $user->name;
       $cart->email= $user->email;
       $cart->phone= $user->phone;
       $cart->user_id= $user->id;


       $cart->address= $user->address;
       $cart->producttitle= $product->title;
       $cart->image= $product->image;
       if($product->discountprice){
        $cart->price= $product->discountprice * $req->quantity;
       }
        else{
            $cart->price= $product->price * $req->quantity;
       }

       $cart->quantity= $req->quantity;
       $cart->product_id= $product->id;
       $cart->save();
       return redirect()->back()->with('message','Product added  Succesfully');;

       }

        }
        else{
            return redirect('login');
        }
    }
    public function showcart(){
        if(Auth::id()){
            $id= Auth::user()->id;
            $cart = Cart::where('user_id',$id)->get();
            return view('home.showcart')->with('cart',$cart);
        }
        return redirect('login');

    }
    public function removecart(Request $req){
        if(Auth::id()){

            $cart = Cart::where('id',$req->id)->first();
            $cart->delete();
            return redirect()->back();
        }
        return redirect('login');

    }
    public function cashondeliovery(Request $req){
      $user =Auth::user();
      $userid=$user->id;
      $data = Cart::where('user_id',$userid)->get();
      foreach($data as $data){
        $order = new Order();
        $order->name = $data->name;
        $order->email = $data->email;
        $order->phone = $data->phone;
        $order->address = $data->address;
        $order->producttitle = $data->producttitle;
        $order->price = $data->price;
        $order->quantity = $data->quantity;
        $order->product_id = $data->product_id;
        $order->user_id = $data->user_id;
        $order->image = $data->image;
        $order->paymentstatus ="Cash on delivery";
        $order->deliverystatus = "processing";
        $order->save();
        //delte cart item after order submit
        $cartid=$data->id;
        $cartitem= Cart::find($cartid);
        $cartitem->delete();

      }
      return redirect()->back()->with('message','We Recive Your Order');

    }
    public function stripepayment($totalprice){
        return view('home.stripepayment')->with('totalprice',$totalprice);

    }
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $request->totalprice *100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment Tology.com"
        ]);
        $user =Auth::user();
      $userid=$user->id;
      $data = Cart::where('user_id',$userid)->get();
      foreach($data as $data){
        $order = new Order();
        $order->name = $data->name;
        $order->email = $data->email;
        $order->phone = $data->phone;
        $order->address = $data->address;
        $order->producttitle = $data->producttitle;
        $order->price = $data->price;
        $order->quantity = $data->quantity;
        $order->product_id = $data->product_id;
        $order->user_id = $data->user_id;
        $order->image = $data->image;
        $order->paymentstatus ="Stripe Payment Done";
        $order->deliverystatus = "processing";
        $order->save();
        //delte cart item after order submit
        $cartid=$data->id;
        $cartitem= Cart::find($cartid);
        $cartitem->delete();

      }

        Session::flash('success', 'Payment successful!');

        return redirect()->back()->with('message','We Recive Your Order');
    }
    public function showorder(){

        if(Auth::id()){
            $id= Auth::user()->id;
            $order= Order::where('user_id',$id)->get();
            return view('home.showOrder')->with('order',$order);
        }
        return redirect('login');
    }
    public function cancelorder($id){
            $order =Order::find($id);
            $order->deliverystatus="You Cancel This Order";
            $order->save();

        return redirect()->back();

    }
    public function allproducts(){
        $product = product::paginate(3);


        return view('home.allproduct')->with('product',$product);

    }

}
