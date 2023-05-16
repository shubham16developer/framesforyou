<?php

namespace App\Http\Controllers;

use App\Helpers\MailHelper;
use App\Models\Group;
use App\Models\GroupUsers;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use App\Models\User;
use \stdClass;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user_type = Auth::user()->role;
        $permission = Permission::where('role', $user_type)->first();
        if($permission->add_user == '1'){
            $data['add_user_permission'] = '1';
        }else{
            $data['add_user_permission'] = NULL;
        }
        
        if($permission->edit_user == '1'){
            $data['edit_user_permission'] = '1';
        }else{
            $data['edit_user_permission'] = NULL;
        }
        
        if($permission->delete_user == '1'){
            $data['delete_user_permission'] = '1';
        }else{
            $data['delete_user_permission'] = NULL;
        }


        return view('user.index',$data);
    }

    public function list()
    {
        return Datatables()->of(User::where('role', 'User')->where('is_delete', '0')->get())->toJson();
    }

    public function assigned_user_list()
    {
        $id = Auth::id();
        $userdatas = [];
        // $data = Group::where('manager_id' , $id)->where('is_delete' , '0')->with('group_users.group_user_detail')->get();
        $data = Group::where('manager_id', $id)->where('is_delete', '0')->get();
        foreach ($data as $key => $value) {

            $groupuserdata = GroupUsers::where('group_id', $value['id'])->get();

            foreach ($groupuserdata as $key => $values) {

                $User_data = User::where('id', $values['user_id'])->get();

                array_push($userdatas, $User_data);
            }
        }

        $datas = array_unique($userdatas);

        return Datatables()->of($datas)->toJson();
    }

    public function add()
    {
        return view('user.add');
    }


    public function edit($id)
    {

        $id = base64_decode($id);
        $user = User::where('id', $id)->first();
        $data['user'] = User::where('id', $id)->first();

        return view('user.add', $data);
    }

    public function store(Request $request)
    {

        $data = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role' => 'User',
            'password' => encrypt($request->password)
        );

        $insertdata = User::create($data);

        
        if ($insertdata) {
            
            $id = $insertdata->id;
            $userdata = User::where('id',$id)->first();
            $body = view('mail.logindetailmail',compact('userdata'))->render();
            $sendmail = MailHelper::sendEmailTo($body, 'Login Details',$userdata->email);
            notify()->success('User inserted succesfully!');
            return redirect('users');
        } else {
            notify()->error('User not inserted succesfully!');
            return redirect('users');
        }
    }

    public function update(Request $request, $id)
    {

        $id = base64_decode($id);

        $data = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email
        );
        $updatedata = User::where('id', $id)->update($data);

        if ($updatedata) {
            notify()->success('User updated succesfully!');
            return redirect('users');
        } else {
            notify()->error('User not updated succesfully!');
            return redirect('users');
        }
    }

    public function delete(Request $request)
    {
        $id = base64_decode($request->id);
        $data = array('is_delete' => '1');
        $delete = User::where('id', $id)->update($data);
        if ($delete) {
            $data['status'] = "success";
            $data['message'] = "Customer is deleted successfully!";
        } else {
            $data['status'] = "error";
            $data['message'] = "Customer is not deleted!";
        }
        return response()->json($data);
    }
}
