<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('role-permission/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role-permission/add');
    }


    public function add()
    {
        return view('role-permission/create');
    }

    public function assign_permission(Request $request)
    {
        // dd($request->all());

        $data = array(
            'role' => $request->role,
            'add_group' => $request->add_group,
            'edit_group' => $request->edit_group,
            'delete_group' => $request->delete_group,
            'add_user' => $request->add_user,
            'edit_user' => $request->edit_user,
            'delete_user' => $request->delete_user,
            'add_manager' => $request->add_manager,
            'edit_manager' => $request->edit_manager,
            'delete_manager' => $request->delete_manager,
            'add_lead' => $request->add_lead,
            'edit_lead' => $request->edit_lead,
            'delete_lead' => $request->delete_lead,
            'add_media' => $request->add_media,
            'edit_media' => $request->edit_media,
            'delete_media' => $request->delete_media,
            'add_role' => $request->add_role,
            'edit_role' => $request->edit_role,
            'delete_role' => $request->delete_role,
            'assign_role' => $request->assign_role,
            'ivr' => $request->ivr,
            'call_log' => $request->call_log,
            'whatsapp' => $request->whatsapp,
        );

        $assign = Permission::where('role' , $request->role)->update($data);

        if($assign){
            notify()->success('Permission assign succesfully!');
            return redirect()->back();

        }else{
            notify()->success('Permission not assign succesfully!');
            return redirect()->back();
        }
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
    public function destroy($id)
    {
        //
    }
}
