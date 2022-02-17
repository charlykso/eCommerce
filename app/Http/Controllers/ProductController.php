<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();

        return view('index', ['products' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("CreateProduct");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        //validat request details
        $request->validate([
            'Pname' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required|string|max:255',
            'picture' => 'required|image|max:1999',
            'category' => 'required|string|max:200'
            
        ]);
        // return $request;

        //get filename with extension
        $fileNameWithExtension = $request->file('picture')->getClientOriginalName();
        //get just filename
        $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
        //get just extension
        $extension = $request->file('picture')->getClientOriginalExtension();
        //filename to store
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        //upload image
        $path = $request->file('picture')->storeAs('public/products', $fileNameToStore);

        $product = new Product();
        $product->name = $request->input('Pname');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->gallery = $fileNameToStore;
        $product->category = $request->input('category');
        $product->save();

        $request->session()->flash('Pname', $product->name);
        
        return redirect('product/create')->with('success', 'product successfully created');
    }


    public function addToCart(Request $request, $id)
    {
        
        if ($request->session()->has('user')) {
            $cart = new Cart;
            $cart->product_id = $request->product_id;
            $cart->user_id = $request->session()->get('user')['id'];
            
            $cart->save();

            return redirect('/');
        }else {
            return redirect('/signin');
        }

    }


    public static function cartItem()
    {
        $userId = Session::get('user')['id'];
        // $noOfItems = Cart::where('user_id', $userId)->count();

        return Cart::where('user_id', $userId)->count();
    }



    public function myCartList()
    {
        if (Session::has('user')) {
            $userId = Session::get('user')['id'];
            // $myProducts = $user->getProductInCart;
            $myProducts = DB::table('cart')
            ->join('products', 'cart.product_id', '=' , 'products.id')
            ->where('cart.user_id', $userId)
            ->select('products.*', 'cart.id as cart_id')
            ->get();
            $allCart = Cart::where('user_id', $userId)->get();
            $numAllCart = count($allCart);
            $data = [
                'myProducts' => $myProducts,
                'myCartNo' => $numAllCart
            ];
            // dd($myProducts);
            return view('cartlist')->with($data);
        }
        return view('auth.signin');
    }


    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Product::find($id);
        $data = Product::find($id);
        return view('productDetail', ['product' => $data]);
    }



    public function OrderNow()
    {
         $userId = Session::get('user')['id'];
        // $myProducts = $user->getProductInCart;
        $total = DB::table('cart')
        ->join('products', 'cart.product_id', '=' , 'products.id')
        ->where('cart.user_id', $userId)
        ->sum('products.price');
        // dd($myProducts);
        return view('ordernow', ['total' => $total]);
    }


    public function placeOrderNow(Request $request)
    {
        //validat request details
        $request->validate([
            'address' => 'required|string|max:255',
            'payment_method' => 'required|string|max:255'
        ]);

        // $user = Session::get('user');
        // $allCart = $user->getProductInCart;
        // dd($allCart);
        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id', $userId)->get();
        
        foreach ($allCart as $cart) {
            $order = new Order();
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = "Pending";
            $order->payment_method = $request->payment_method;
            $order->payment_status = "Pending";
            $order->address = $request->address;
            $order->save();

            Cart::where('user_id', $userId)->delete();

        }

        return redirect('/')->with('success', "Order completed");

    }


    public function MyPlacedOrders(){

        if (Session::has('user')) {
            $userId = Session::get('user')['id'];
            // $myOders = Orders::where('user_id', $userId)->get();
            $myOders = DB::table('orders')
            ->join('products', 'orders.product_id', '=' , 'products.id')
            ->where('orders.user_id', $userId)
            ->select('products.*', 'orders.id as order_id', 'orders.status', 'orders.payment_method', 'orders.payment_status', 'orders.created_at as order_date')
            ->get();
            $myCount = count($myOders);
            $context = [
                'myOders' => $myOders,
                'myCount' => $myCount
            ];
            return view('myPlacedOrders')->with($context);
        }
        return view('auth.signin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DeleteItem($id)
    {
        Cart::destroy($id);

        return redirect('cartlist');
    }
}
