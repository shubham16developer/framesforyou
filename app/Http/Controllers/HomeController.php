<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use PragmaRX\Google2FAQRCode\Google2FA;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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

    public function profile()
    {   
        $data = Auth::user();
        return view('profile',compact('data'));
    }

    public function update_profile(Request $request)
    {   

        $id = $request->id;
        $userdata = User::where('id',$id)->first();
        $user2fa = $userdata->two_fa;


        if($request->two_fa == '0' || $request->two_fa == null){
            $google2fa_secret = null;
        }else{
            $google2fa_secret = $request->google2fa_secret;
        }

        
        $data = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'google2fa_secret' => $google2fa_secret,
            'two_fa' => $request->two_fa,
        );
        
        $update = User::where('id' , $id)->update($data);

        $getdata = User::where('id',$id)->first();


        if(($user2fa == '0' || $user2fa == null) && $getdata->two_fa == '1'){
            notify()->success('Profile updated successfully !');
            return redirect(url('active2fa/' . base64_encode($id)));
        }else{
            notify()->success('Profile updated successfully !');
            return redirect('home');
        }

    }

    public function active2fa(Request $request ,$id)
    {   
        $id = base64_decode($id);
        // dd($id);
        $getdata = User::where('id',$id)->first();


        $google2fa = app('pragmarx.google2fa');
        $registration_data = $request->all();
        $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();
        // dd($google2fa->generateSecretKey());
        $request->session()->flash('registration_data', $registration_data);

        $twoFa = new Google2FA();
        $key = $twoFa->generateSecretKey();
        $QR_Image = $twoFa->getQRCodeInline(
            config('app.name'),
            $getdata['email'],
            $registration_data['google2fa_secret']
        );


        $data = array('google2fa_secret' => encrypt($registration_data['google2fa_secret']));

        // dd($registration_data['google2fa_secret']);
        $updatedata = User::where('id' , $id)->update($data);

        
        return view('google2fa.register', ['QR_Image' => $QR_Image, 'secret' => $registration_data['google2fa_secret']]);


    }
}
