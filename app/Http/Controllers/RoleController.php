<?php

namespace App\Http\Controllers;

use Response;
use App\Models\role;
use App\Models\batch;
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


    }
    public function getRoleDetails()
    {
      $roles = \App\Models\role::all();
      return view("/Admin/role")->with('roles',$roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRole(Request $request)
    {

          //Add An Entity
        $roleNameNew=$request->roleName;
         role::updateOrCreate(['roleName'=> $roleNameNew]);
         return view("/Admin/role");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Add An Entity
      $roles = new role;

     $roles->roleName = $request->roleName;
     $roles->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function updateRole(Request $request,role $role)
    {
        //Updating classroom details
          $role= role::where('roles.roleId','=',$request->roleId)->first();
          $role->roleName=$request->roleName;
          $role->save();
          return view("/Admin/role",['id'=>'updateRoleByAdmin']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroyRole(Request $request)
    {


      $role = role::where('roleId','=',$request->roleId)->delete();
          return view("/Admin/role");
    }
}
