<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        return view('colors.index');
    }

    public function list()
    {
        $data = Color::where('is_delete', 0)->get();
        return DataTables()->of($data)->toJson();
    }

    public function add()
    {
        return view('colors.add');
    }

    public function store(Request $request)
    {

            $data = array
            (
                'color_name' => $request->color_name,
            );

            $insert = Color::create($data);

        if($insert){
            notify()->success('Color added succesfully!');
            return redirect('colors');
        }else{
            notify()->error('Color not added!');
            return redirect('colors');
        }
    }

    public function edit($id)
    {
        $data['color'] = Color::where('id' , base64_decode($id))->first();
        
        return view('colors.add', $data);
    }

    public function update(Request $request , $id){

        $id = base64_decode($id);
      

            $data = array
            (
                'color_name' => $request->color_name,
            );

        $update = Color::where('id' , $id)->update($data);

        if($update){
            notify()->success('Color updated succesfully!');
            return redirect('colors');
        }else{
            notify()->error('Color not updated!');
            return redirect('colors');
        }
    }

    public function delete(Request $request)
    {

        $id = base64_decode($request->id);
        $data = array('is_delete' => '1');
        $delete = Color::where('id',$id)->update($data);
        if($delete){
            $data['status'] = "success";  
            $data['message'] = "Color is deleted successfully!";
        }else{
            $data['status'] = "error";
            $data['message'] = "Color is not deleted!";
        }
            return response()->json($data);
    }



}
