<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $status=new Status;
        $status->statusName=$request->statusName;
        $status->statusForRoles=$request->roleForStatus;;
        $status->save();
        return redirect()->route('Admin',['id'=>'createTheStatus']);
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
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {

          $status=Status::where('statusId','=',$request->statusId)->first();
          $status->statusName=$request->statusName;
          $status->statusForRoles=$request->roleForStatus;;
          $status->save();
          return redirect()->route('Admin',['id'=>'updateTheStatus']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

      $status=Status::where('statusId','=',$request->statusId)->first();
      $status->delete();
      return redirect()->route('Admin',['id'=>'updateTheStatus']);
    }
}
