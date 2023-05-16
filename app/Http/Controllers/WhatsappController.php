<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WhatsappController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


            
            $user_id = 0;
            $login_id = Auth::id();


        // $users = User::where('role','Admin')->get();
        // return view('whatsapp_inbox.add',$users);
        return view('whatsapp_inbox.add',compact('user_id','login_id'));

    }

    public function show_dash($user_id)
    {
        $login_id = Auth::id();

        
        return view('whatsapp_inbox.add',compact('user_id','login_id'));

    }

    public function send(Request $request)
    {
        // dd($request->all());
        $store_arr = array
        (
            'msg' => $request->msg ,
            'user_from' => Auth::id() ,
            'user_to' => $request->user_to , 

        );

        $send = Message::insert($store_arr);
        return Redirect::back();

    }

    public function webhook(Request $request)
    {   

        // $mode = $request->query('hub_mode');
        $mode = $_REQUEST['hub_mode'];
        // $challenge = $request->query('hub_challenge');
        $challenge = $_REQUEST['hub_challenge'];
        // $token = $request->query('hub_verify_token');
        $token = $_REQUEST['hub_verify_token'];
        $mytoken = '123123';
        // dd($mytoken);
        if($mode && $token) {
            if ($mode === "subscribe" && $token === $mytoken) {
                // res.status(200).send(challenge);
                // return response()->json($challenge, 200);
                echo $challenge;
            } else {
                return response()->json(403);
            }
        }else {
                return response()->json(403);
        }
    }

    // function send_whatsapp($to_number, $twilio_number, $message,$template,$temp_langauge, $satusUrl, $mms=false){ 


        function send_message()
        { 
            try {   
                    // dd($template,$temp_langauge);
                    $data = json_encode(array('messaging_product'=>'whatsapp',
                        "to" => '919408609060',
                        'type'=>'template',
                        'template'=>array('name'=>'hello_world',
                                        'language'=>array('code'=>'en_US'),
                                    )
                        ));
        
                    $twilio_number='105875698917731';
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                      CURLOPT_URL => 'https://graph.facebook.com/v14.0/'.$twilio_number.'/messages',
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => '',
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => 'POST',
                      CURLOPT_POSTFIELDS =>$data,
                      CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json',
                        'Authorization: Bearer EAAGMzZALDg9wBAMDc9HdbYaVQRwZC6RbaUeuF4QHdueno0iTM0VoZAntPyVZCHYIZC3V2RmZAfyt2llIXeJLa4rZAhVxd6qLR9Eh4p6cpo3IWVtokTXwXHUg88dXs1vctMo9NOvshFZBfzHHZABH5BI9IxfJXT2uCuk7Ke4OZCnXUeCASvBLZAnINJwziRsZBx0MkrHffFwhzZCTgFQZDZD'
                      ),
                    ));
        
                    $response = curl_exec($curl);
                    curl_close($curl);
                    $object = json_decode($response,true);
                    dd($object);
                    
                    return array('status'=>'sent','sid'=>$object['messages']['0']['id']);
        
            } catch (Exception $e) {
                return array('status'=> 'error','error' => $e->getMessage());
            }
        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param  \Illuminate\Http\Request $request
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
    public function destroy($id)
    {
        //
    }
}
