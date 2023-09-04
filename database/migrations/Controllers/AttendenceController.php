<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\attendence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Redirect;

class AttendenceController extends Controller
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
    public function adminCreateAttendance(Request $request)
    {
      if(count($att = \App\Models\attendence::where('userRole','=',2)->where('todaysDate','=',date('Y-m-d'))->get())==0)
      {
        $users = User::all();

      foreach ($users as $userd) {

        $attendence = new attendence;

       $attendence->yes_or_no =  0;
       $attendence->userId =  $userd->userId;
       $attendence->userRole =  Auth()->user()->role;
       $attendence->dailyReg =  0;
       $attendence->todaysDate=date('Y-m-d');
       $attendence->save();
      }
             $attendence = new attendence;
             $attendence->yes_or_no =  1;
             $attendence->userId =  1;
             $attendence->userRole = 2;
             $attendence->dailyReg =  0;
             $attendence->todaysDate=date('Y-m-d');
             $attendence->save();
           }
     return view("/Admin/admin");
    }



          public function adminSubmitTodaysAttendance(Request $request)
          {

              $attendence = new attendence;

              attendence::where('todaysDate', '=',date('Y-m-d'))
              ->update([
             'dailyReg' => 1
          ]);

            return Redirect::back();
          }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Create a record
      $attendences = new attendence;

     $attendences->yes_or_no = $request->yes_or_no;
     $attendences->userId = $request->userId;
     $attendences->dailyReg = $request->dailyReg;

     $attendences->save();
     return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function show(attendence $attendence)
    {
      //View attendence details
      $attendences=attendence::all();
      return $attendences;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function edit(attendence $attendence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, attendence $attendence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function destroy(attendence $attendence)
    {
        //
    }

   public function showTodaysAbsentees(Request $request)
   {
     //View attendence details
     $todaysAttendences = DB::table('attendences')
            ->join('users', 'users.userId', '=', 'attendences.userId')
            ->join('roles', 'users.role', '=', 'roles.roleId')
            ->select('users.name as Name','roles.roleName as roleName','users.email as Email','attendences.yes_or_no as yes_or_no','attendences.todaysDate as todaysDate')
            ->where('yes_or_no', '=', 0)
            ->where('yes_or_no', '=', 0)
            ->where('todaysDate','=', date('Y-m-d'))
            ->get();

      return view("/Admin/attendance")->with('todaysAttendences',$todaysAttendences);
   }

   public function showDaysAbsentees(Request $request)
   {
     //View attendence details
     $attendences = DB::table('attendences')
            ->join('users', 'users.userId', '=', 'attendences.userId')
            ->join('roles', 'users.role', '=', 'roles.roleId')
            ->select('users.name as Name','roles.roleName as roleName','users.email as Email','attendences.yes_or_no as yes_or_no','attendences.todaysDate as todaysDate')
            ->where('yes_or_no', '=', 0)
            ->where('todaysDate','=', $request->selectedDate)
            ->get();

      return view("/Admin/attendance")->with('attendences',$attendences);
   }

   public function markTodaysAttendance(Request $request)
   {
     //View attendence details
     $att = attendence::where('userId','=',auth()->user()->userId)
                        ->where('userRole','=',$request->userRole)
                        ->where('todaysDate','=', date('Y-m-d'))->first();
     $att->yes_or_no = $request->inOrOut;
     $att->dailyReg = 0;
     $att->save();
     return Redirect::back();
   }
function resetTodaysAttendance(Request $request)
{

 $attendence = attendence::where('todaysDate','=',date('Y-m-d'))->get();

 $attendence->each->delete();
 return Redirect::back();
}
      public function showAbsenteesBetweenDays(Request $request)
      {
        //View attendence details
        $attendencesBetweens = DB::table('attendences')
               ->join('users', 'users.userId', '=', 'attendences.userId')
               ->join('roles', 'users.role', '=', 'roles.roleId')
               ->select('users.name as Name','attendences.todaysDate as todaysDate','roles.roleName as roleName','users.email as Email','attendences.yes_or_no as yes_or_no','attendences.todaysDate as todaysDate')
               ->orderBy('roleName','desc')
               ->orderBy('todaysDate','asc')
               ->where('attendences.yes_or_no', '=', 0)
               ->whereBetween('todaysDate', [$request->fromDate, $request->tillDate])
               ->get();

         return view("/Admin/attendance")->with('attendencesBetweens',$attendencesBetweens);
      }

}
