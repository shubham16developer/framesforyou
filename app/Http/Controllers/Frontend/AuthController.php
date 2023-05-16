<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Helpers\MailHelper;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;


class AuthController extends Controller
{

	public function user_register(Request $request)
    {
    	$auth_role = Session::get('auth_role');
    	if($auth_role == 'User')
    	{
    		return redirect('/');
    	}
    	return view('frontend.auth.user_register');
    }

	public function custom_register(Request $request)
    {

        $data = array
        (
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'role'       => 'User',
            'password'   => Hash::make($request->password)
        );

        $registerUser = User::create($data);
        
        if ($registerUser) 
        {
            notify()->success('Succesfully register!');
            return redirect('user_login')->with('success', 'Successfully Login!');
        } 
        else 
        {
            notify()->error('Something went Wrong');
            return redirect('user_register')->with('error', 'Something went Wrong');
        }
   
    }

    public function user_login(Request $request)
    {
    	$auth_role = Session::get('auth_role');
    	if($auth_role == 'User')
    	{
    		return redirect('/');
    	}
    	return view('frontend.auth.user_login');
    }

    public function custom_login(Request $request)
    {
        $request->validate(
        [
            'email'    => 'required',
            'password' => 'required',
        ]);

        $get_password = $request->password;
        $check = User::where('email',$request->email)->where('role',"User")->where('is_delete',"0")->first();
    

        if($check)
        {

            $checkpassword = Hash::check($get_password,$check->password);

                if($checkpassword)
                {
            

        	       $user_data = User::where('email',$request->email)->where('role',"User")->where('is_delete',"0")->first();
        	
        	       Session::put('auth_role',$user_data->role);
        	       Session::put('user_auth_id',$user_data->id);

                    return redirect("/");
                }
                else
                {

                    //notify()->error('Invalid Password');
                    return redirect("user_login")->with('error', 'Incorrect Password!');
                }

        }
      	
      	//notify()->error('Login details are not valid');
        return redirect("user_login")->with('error', 'Login details are not valid!');
    }

    public function user_logout(Request $request)
    {
    	Session::forget('auth_role');
    	Session::forget('user_auth_id');
    	return Redirect::to('/');
    }

}
?>