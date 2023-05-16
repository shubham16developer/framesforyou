<?php

namespace App\Http\Controllers;

use App\Models\Security;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;
use App\Helpers\MailHelper;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SecurityController extends Controller
{
    public function index(){
        return view('security.index');
    }
    
    public function add(){
        return view('security.add');
    }

    public function list(){
        $data = Security::where('is_delete' , '0')->get();
        return DataTables()->of($data)->tojson();
    }

    public function store(Request $request){
        $data = array(
            'ip' => $request->ip,
        );

        $insert = Security::create($data);

        if($insert){
            notify()->success('IP added succesfully!');
            return redirect('security');
        }else{
            notify()->error('IP not added succesfully!');
            return redirect('security');
        }
    }

    public function edit($id){
        $data['security'] = Security::where('id' , base64_decode($id))->where('is_delete' , '0')->first();
        return view('security.add' , $data);
    }
    
    public function update(Request $request , $id){
        $data = array(
            'ip' => $request->ip
        );

        $update = Security::where('id', base64_decode($id))->update($data);

        if($update){
            notify()->success('IP updated succesfully!');
            return redirect('security');
        }else{
            notify()->error('IP not updated succesfully!');
            return redirect('security');
        }

    }

    public function delete(Request $request){

        $id = base64_decode($request->id);
        $data = array('is_delete' => '1');
        $delete = Security::where('id',$id)->update($data);
        if($delete){
            $data['status'] = "success";  
            $data['message'] = "Ip is deleted successfully!";
        }else{
            $data['status'] = "error";
            $data['message'] = "Ip is not deleted!";
        }
            return response()->json($data);

    }

    public function testcall(){

        if (isset($_POST['X-PH-Test2'])) {

            dd($_POST['X-PH-Test2']);


            
        }else{

        }
    }


}
