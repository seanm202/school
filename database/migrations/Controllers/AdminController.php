<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\student;
use App\Models\teacher;
use App\Models\subject;
use App\Models\admin;
use App\Models\detail;
use App\Models\role;
use App\Models\grade;
use App\Models\classRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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
        //Create an add admin form
        $roles=role::where('roleName', 'admin')
               ->get();
        return 1;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Store or add admin
        $details = new detail;

       $details->firstname = $request->firstname;
       $details->lastname = $request->lastname;
       $details->age = $request->age;
       $details->dob = $request->dob;
       $details->contactNumber = $request->contactNumber;
       $details->alternateContactNumber = $request->alternateContactNumber;
       $details->roleId = $request->roleId;
       $details->userId = $request->userId;
       $details->address = $request->address;
       $details->bloodGroup = $request->bloodGroup;
       $details->identificationMark = $request->identificationMark;
       $details->parentNumber = $request->parentNumber;
       $details->homePhoneNumber = $request->homePhoneNumber;
       $details->fatherSpouseName = $request->fatherSpouseName;
       $details->motherName = $request->motherName;
       $details->guardianName = $request->guardianName;
       $details->save();

       return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
      return view('user.profile', [
         'user' => admin::findOrFail($id)
     ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        // get old values
        $admins = admin::where('userId', $admin->userId)
               ->get();
               return 1;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //Update admin details
        $detail = detail::where('userId'=>$admin->userId);
        $detail = detail::updateOrCreate(
    ['firstname' => $admin->, 'lastname' => $admin->,
    'age' => $admin->, 'dob' => $admin->, 'contactNumber' => $admin->,
    'alternateContactNumber' => $admin->, 'roleId' => $admin->, 'address' => $admin->,
    'bloodGroup' => $admin->, 'identificationMark' => $admin->, 'parentNumber' => $admin->,
    'homePhoneNumber' => $admin->, 'father/SpouseName' => $admin->, 'motherName' => $admin->,
    'guardianName' => $admin->, 'dob' => $admin->]
);
return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admins)
    {
      //Delete self - admin
      $admins = admin::where('adminId'=>$admins->userId);
      $admins->delete();
      $detail = detail::where('userId'=>$admins->userId);
      $detail->delete();
      return 1;
    }

    //////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    public function getAdminDetails(Request $request)
    {
      $admin = admin::where('adminId', '==',$request->adminId)->firstOrFail();
      return 1;
    }
    public function getUserRoleDetails(Request $request)
      {
        $userDetail = DB::table('users')->select('userRole', 'name')->where('userId','==',$request->userId)->get();
        return $userDetail;
      }
    // public function getAdminAttendance_Yes_Or_No()
    // {
    //
    // }
    public function getDailyRegister()
    {
      $dailyRegister = attendence::where('dailyReg', '==',$request->todayDate)->get();
      return $dailyRegister;
    }
    public function getClassRoomDetails(Request $request)
    {
      $classRoom = classRoom::where('classroomDetailId', '==',$request->classroomDetailId)->firstOrFail();
      return $classRoom;
    }
    public function getUserDetails(Request $request)
    {
      $users = User::where('userId', '==',$request->userId)->firstOrFail();
      return 1;
    }
    // public function searchUser()
    // {
    //
    // }
    public function getGradeDetails(Request $request)
    {
      $grades= grade::where('gradeId', '==',$request->gradeId)->firstOrFail();
      return 1;
    }
    public function getRoleDetails(Request $request)
    {
      $roles = role::where('roleId', '==',$request->roleId)->firstOrFail();
      return 1;
    }
    public function assignOrChangeRole(Request $request)
    {
      $affected = DB::table('users')
                    ->where('userId', $request->userId)
                    ->update(['roleId' => $request->roleId]);
                    return 1;
    }
    public function getSectionDetails(Request $request)
    {
        $affected = DB::table('users')
                      ->where('userId', $request->userId)
                      ->update(['roleId' => $request->roleId]);
                      return 1;
    }
    // public function getSecurityDetails()
    // {
    //
    // }
    public function getStudentDetails(Request $request)
    {
      $affected = student::where('studentId', '==',$request->studentId)->firstOrFail();
      return $affected;
    }
    public function searchStudent()
    {

    }
    public function getSubjectDetails(Request $request)
    {
      $affected = subject::where('subjectId', '==',$request->subjectId)->firstOrFail();
      return $affected;
    }
    public function getTeacherAttendance(Request $request)
    {
      $affected = subject::where('subjectId', '==',$request->subjectId)->firstOrFail();
      return $affected;
    }
    public function getCurrentDayUserRoleAbsentDetails(Request $request)
    {
      $dailyRegister = attendence::where('dailyReg','==',$request->todayDate)
      ->where('userRole','==',$request->userRole)->get();
      return $dailyRegister;
    }
    public function getCurrentDayTeacherAbsentDetails(Request $request)
    {
      $dailyRegister = attendence::where('dailyReg','==',$request->todayDate)
      ->where('userRole','==',2)->get();
      return $dailyRegister;
    }
    public function getCurrentDayStudentAbsentDetails()
    {
      $dailyRegister = attendence::where('dailyReg','==',$request->todayDate)
      ->where('userRole','==',3)->get();
      return $dailyRegister;
    }
}
