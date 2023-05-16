<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        // echo "string";exit;
        return view('product.index');
    }

    public function list(){
        $data = Product::where('is_delete' , '0')->with('product_category')->with('product_color')->get();
        return DataTables()->of($data)->toJson();
    }

    public function add()
    {
        $data['category'] = Category::where('is_delete', '0')->get();
        $data['color'] = Color::where('is_delete', '0')->get();
        return view('product.add' ,$data);
    }

    public function store(Request $request)
    {

        if($request->file('image'))
        {

        $file = $request->file('image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file->move('upload/product_images', $filename);

        $data = array
        (
            'category_id'  => $request->category_id,
            'color_id'     => $request->color_id,
            'description'  => $request->description,
            'price'        => $request->price,
            'product_name' => $request->product_name,
            'image'        => $filename,
        );

            $insert = Product::create($data);

        }

        else
        {
        
        $data = array
        (
            'category_id'  => $request->category_id,
            'color_id'     => $request->color_id,
            'description'  => $request->description,
            'product_name' => $request->product_name,
            'price'        => $request->price,
        );

            $insert = Product::create($data);

        }

        if($insert){
            notify()->success('Product added succesfully!');
            return redirect('product');
        }else{
            notify()->error('Product not added!');
            return redirect('product');
        }
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
