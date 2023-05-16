<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        // echo "string";exit;
        return view('category.index');
    }

    public function list(){
        $data = Category::where('is_delete' , '0')->get();
        return DataTables()->of($data)->toJson();
    }

    public function add()
    {
        return view('category.add');
    }

    public function store(Request $request)
    {
        
        $data = array(
            'cat_name' => $request->cat_name,
        );

        $insert = Category::create($data);

        if($insert){
            notify()->success('Category added succesfully!');
            return redirect('category');
        }else{
            notify()->error('Category not added!');
            return redirect('category');
        }
    }

    public function edit($id)
    {
        $data['category'] = Category::where('id' , base64_decode($id))->first();
        
        return view('category.add', $data);
    }

    public function update(Request $request , $id){

        $id = base64_decode($id);

        $data = array(
            'cat_name' => $request->cat_name,
        );

        $update = Category::where('id' , $id)->update($data);

        if($update){
            notify()->success('Category updated succesfully!');
            return redirect('category');
        }else{
            notify()->error('Category not updated!');
            return redirect('category');
        }
    }

    public function delete(Request $request)
    {

        $id = base64_decode($request->id);
        $data = array('is_delete' => '1');
        $delete = Category::where('id',$id)->update($data);
        if($delete){
            $data['status'] = "success";  
            $data['message'] = "Category is deleted successfully!";
        }else{
            $data['status'] = "error";
            $data['message'] = "Category is not deleted!";
        }
            return response()->json($data);
    }



}
