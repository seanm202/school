<?php

namespace App\Http\Controllers;

use App\Models\securityFacility;
use Illuminate\Http\Request;

class SecurityFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      //Add An Entity
          $securityFacility = new securityFacility;

         $securityFacility->detail1 = $request->detail1;
         $securityFacility->detail2 = $request->detail2;
         $securityFacility->detail3 = $request->detail3;
         $securityFacility->save();

         return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\securityFacility  $securityFacility
     * @return \Illuminate\Http\Response
     */
    public function show(securityFacility $securityFacility)
    {
        ////
        $securityFacilitys=securityFacility::all();
        return $securityFacilitys;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\securityFacility  $securityFacility
     * @return \Illuminate\Http\Response
     */
    public function edit(securityFacility $securityFacility)
    {
      // get old values
      $securityFacility = securityFacility::all()//where('userId', $securityFacility->userId)
             ->get();
             return 1;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\securityFacility  $securityFacility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, securityFacility $securityFacility)
    {

          //Updating classroom details
          securityFacility::where('securityId', $request->securityId)
        ->update(['detail1' => $request->detail1,
      'detail2' =>$request->detail2,
    'detail3' => $request->detail3,]);

  return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\securityFacility  $securityFacility
     * @return \Illuminate\Http\Response
     */
    public function destroy(securityFacility $securityFacility)
    {
      //Delete security facilities
    //  $securityFacility = securityFacility::where('userId'=>$details->userId);
      $securityFacility->delete();
      return 1;
    }
}
