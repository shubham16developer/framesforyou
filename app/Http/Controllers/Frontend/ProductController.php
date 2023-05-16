<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Yajra\DataTables\Facades\DataTables;


class ProductController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::where('is_delete' , '0')->get();
        $data['products'] = Product::where('is_delete' , '0')->with('product_category')->with('product_color')->get();
        return view('frontend.shop',$data);
    }

    public function product_details(Request $request, $id)
    {
        $data['product'] = Product::where('id',$id)->where('is_delete','0')->with('product_category')->with('product_color')->first();
        return view('frontend.product_details',$data);
    } 

    public function view_cart(Request $request)
    {

        $auth_id  = Session::get('user_auth_id');
        $get_data = Cart::where('user_id',$auth_id)->with('cart_product')->get();
        $total = Cart::where('user_id',$auth_id)->with('cart_product')->sum('total_price');  

        //print_r($total);exit();

        return view('frontend.cart',compact('get_data','total'));
    }

    public function list()
    {
        $auth_id  = Session::get('user_auth_id');
        $data = Cart::where('user_id',$auth_id)->with('cart_product')->get();
        return DataTables()->of($data)->toJson();
    }

    public function add_to_cart(Request $request)
    {

        $auth_id = Session::get('user_auth_id');

        $data = array
        (
            'product_id'   => $request->product_id,
            'user_id'      => $auth_id,
            'quantity'     => $request->quantity,
            'total_price'  => $request->quantity * $request->price,
        );

            $insert = Cart::create($data);

            return redirect('/cart');

        // if($insert){
        //     notify()->success('Product added succesfully!');
        //     return redirect('product');
        // }else{
        //     notify()->error('Product not added!');
        //     return redirect('product');
        // }
    }

    public function update_quantity(Request $request)
    {

    //print_r($request->all());

    $cart = Cart::findOrFail($request->id);
    $cart->update([
        'quantity'    => $request->quantity,
        'total_price' => $request->price * $request->quantity,

    ]);

        if($cart)
        {
            $data['status'] = "success";  
        }
        else
        {
            $data['status'] = "error";
        }

        return response()->json($data);

    }

    public function edit($id)
    {
        $data['product'] = Product::where('id' , base64_decode($id))->first();
        $data['category'] = Category::where('is_delete' , '0')->get();
        $data['color'] = Color::where('is_delete' , '0')->get();
        
        return view('product.add', $data);
    }

    public function update(Request $request , $id){

        $id = base64_decode($id);

        $data = array(
            'category_id'  => $request->category_id,
            'color_id'     => $request->color_id,
            'product_name' => $request->product_name,
            'price'        => $request->price,
        );

        $update = Product::where('id' , $id)->update($data);

        if($update){
            notify()->success('Product updated succesfully!');
            return redirect('product');
        }else{
            notify()->error('Product not updated!');
            return redirect('product');
        }
    }

    public function delete(Request $request)
    {

        $id = base64_decode($request->id);
        $data = array('is_delete' => '1');
        $delete = Product::where('id',$id)->update($data);
        if($delete){
            $data['status'] = "success";  
            $data['message'] = "Product is deleted successfully!";
        }else{
            $data['status'] = "error";
            $data['message'] = "Product is not deleted!";
        }
            return response()->json($data);
    }



}
