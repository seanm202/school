<?php

namespace App\Http\Controllers;

use App\Models\detail;
use App\Models\User;
use App\Models\ConstantController;
use App\Models\student;
use App\Models\teacher;
use App\Models\attendence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;

use Redirect;

class DetailController extends Controller
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



    public function updateRoleInUsers($userId,$roleId)
    {

        User::where('userId', $userId)
      ->update(['role' => $roleId]);
    return;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     function updateUserDetailsId($detailsId,$userId)
     {
       $user = User::where('userId','=',$userId)->first();

$user->detailsId =$detailsId;

$user->save();
return;
     }
    public function store(Request $request)
    {
        //Add An Entity
        $details = new detail;

       $details->firstname = $request->firstName;
       $details->lastname = $request->lastName;
       $details->age = $request->age;
       $details->dob = $request->dob;
       $details->contactNumber = $request->contactNumber;
       $details->alternateContactNumber = $request->alternateContactNumber;
       $details->userId = $request->userId;
       $details->roleId = $request->roleId;
       $details->address = $request->address;
       $details->bloodGroup = $request->bloodGroup;
       $details->identificationMark = $request->identificationMark;
       $details->parentNumber = $request->parentNumber;
       $details->homePhoneNumber = $request->homePhoneNumber;
       $details->fatherSpouseName = $request->fatherSpouseName;
       $details->motherName = $request->motherName;
       $details->guardianName = $request->guardianName;
       $details->save();
       $detailsId=$details->detailId;
       $roleIdForRoleDetailIdUpdation=$request->roleId;

       \App\Http\Controllers\DetailController::updateUserDetailsId($detailsId,$request->userId);
       \App\Http\Controllers\DetailController::updateRoleInUsers($request->userId,$request->roleId);
      // return redirect()->route('getAdminAllDetails');
      return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(detail $detail)
    {
        //
        $details=detail::all();
        return $details;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detail  $detail
     * @return \Illuminate\Http\Response
     */


    public function getDetails()
    {
      $users = \App\Models\User::all();
      return view("/Admin/details")->with('users',$users);
    }

    public function addToAdminTable($userId,$adminDetailId)
    {
      $admin= new admin;
      $admin->userId=$userId;
      $admin->notifications_Posted=NULL;
      $admin->adminDetailId=$adminDetailId;
      $admin->save();
      return;
    }


    public function addToTeacherTable($userId,$teacherDetailId)
    {
      $teacher= new teacher;
      $teacher->userId=$userId;
      $teacher->teacherDetailId=$teacherDetailId;
      $teacher->save();
      return;

    }


    public function addToStudentTable($userId,$studentDetailId)
    {
      $student = new student;
      $student->userId=$userId;
      $student->studentDetailsId=$studentDetailId;
      $student->save();
      return;
    }

    public function updateAdminDetails($request)
    {
        //Updating classroom details
        $detail = detail::where('detailId', $request->detailId)->first();
        $detail->firstname = $request->firstName;
        $detail->lastname = $request->lastName;
        $detail->age = $request->age;
        $detail->dob = $request->dob;
        $detail->contactNumber = $request->contactNumber;
        $detail->alternateContactNumber = $request->alternateContactNumber;
        $detail->userId = $request->userId;
        $detail->roleId = $request->roleId;
        $detail->address = $request->address;
        $detail->bloodGroup = $request->bloodGroup;
        $detail->identificationMark = $request->identificationMark;
        $detail->parentNumber = $request->parentNumber;
        $detail->homePhoneNumber = $request->homePhoneNumber;
        $detail->fatherSpouseName = $request->fatherSpouseName;
        $detail->motherName = $request->motherName;
        $detail->guardianName = $request->guardianName;
        $detail->save();
        $detailsId=$detail->detailId;
        \App\Http\Controllers\DetailController::addToAdminTable($userId,$detailsId);
 \App\Http\Controllers\DetailController::updateRoleInUsers($request->userId,$request->roleId);

  return Redirect::back();
    }

    public function updateTeacherDetails($teacher)
    {
        //Updating classroom details
        $detail = detail::where('detailId', $request->detailId)->first();
        $detail->firstname = $request->firstName;
        $detail->lastname = $request->lastName;
        $detail->age = $request->age;
        $detail->dob = $request->dob;
        $detail->contactNumber = $request->contactNumber;
        $detail->alternateContactNumber = $request->alternateContactNumber;
        $detail->userId = $request->userId;
        $detail->roleId = $request->roleId;
        $detail->address = $request->address;
        $detail->bloodGroup = $request->bloodGroup;
        $detail->identificationMark = $request->identificationMark;
        $detail->parentNumber = $request->parentNumber;
        $detail->homePhoneNumber = $request->homePhoneNumber;
        $detail->fatherSpouseName = $request->fatherSpouseName;
        $detail->motherName = $request->motherName;
        $detail->guardianName = $request->guardianName;
        $detail->save();
        $detailsId=$detail->detailId;
        \App\Http\Controllers\DetailController::addToTeacherTable($request->userId,$detailsId);

     \App\Http\Controllers\DetailController::updateRoleInUsers($request->userId,$request->roleId);

      return Redirect::back();
    }

    public function updateStudentDetails($request)
    {
        //Updating classroom details
        $detail = detail::where('detailId', $request->detailId)->first();
        $detail->firstname = $request->firstName;
        $detail->lastname = $request->lastName;
        $detail->age = $request->age;
        $detail->dob = $request->dob;
        $detail->contactNumber = $request->contactNumber;
        $detail->alternateContactNumber = $request->alternateContactNumber;
        $detail->userId = $request->userId;
        $detail->roleId = $request->roleId;
        $detail->address = $request->address;
        $detail->bloodGroup = $request->bloodGroup;
        $detail->identificationMark = $request->identificationMark;
        $detail->parentNumber = $request->parentNumber;
        $detail->homePhoneNumber = $request->homePhoneNumber;
        $detail->fatherSpouseName = $request->fatherSpouseName;
        $detail->motherName = $request->motherName;
        $detail->guardianName = $request->guardianName;
        $detail->save();
        $detailsId=$detail->detailId;
        \App\Http\Controllers\DetailController::addToStudentTable($request->userId,$detailsId);
    \App\Http\Controllers\DetailController::updateRoleInUsers($request->userId,$request->roleId);

      return Redirect::back();
    }


    public function createTeacher(Request $request)
    {

      $validated = $request->validate([
        'password' => ['required', Password::defaults(), 'confirmed'],
    ]);
      $user=new User;
      $user->email=$request->email;
      $user->password=Hash::make($request->password);
      $user->phone=$request->phone;
      $user->role=2;
      $user->save();
      $userId=$user->userId;
      event(new Registered($user));
        //Add An Entity
        $details = new detail;

       $details->firstname = $request->firstName;
       $details->lastname = $request->lastName;
       $details->age = $request->age;
       $details->dob = $request->dob;
       $details->contactNumber = $request->contactNumber;
       $details->alternateContactNumber = $request->alternateContactNumber;
       $details->userId = $userId;
       $details->roleId = 2;
       $details->address = $request->address;
       $details->bloodGroup = $request->bloodGroup;
       $details->identificationMark = $request->identificationMark;
       $details->parentNumber = $request->parentNumber;
       $details->homePhoneNumber = $request->homePhoneNumber;
       $details->fatherSpouseName = $request->fatherSpouseName;
       $details->motherName = $request->motherName;
       $details->guardianName = $request->guardianName;
       $details->save();
       $detailsId=$details->detailId;
       $roleIdForRoleDetailIdUpdation=2;

       \App\Http\Controllers\DetailController::updateUserDetailsId($detailsId,$userId);
       \App\Http\Controllers\DetailController::updateRoleInUsers($userId,2);
    }

    public function createAdmin(Request $request)
    {

      $validated = $request->validate([
        'password' => ['required', Password::defaults(), 'confirmed'],
    ]);
      $user=new User;
      $user->email=$request->email;
      $user->password=Hash::make($request->password);
      $user->phone=$request->phone;
      $user->role=3;
      $user->save();
      $userId=$user->userId;
      event(new Registered($user));
        //Add An Entity
        $details = new detail;

       $details->firstname = $request->firstName;
       $details->lastname = $request->lastName;
       $details->age = $request->age;
       $details->dob = $request->dob;
       $details->contactNumber = $request->contactNumber;
       $details->alternateContactNumber = $request->alternateContactNumber;
       $details->userId = $userId;
       $details->roleId = 3;
       $details->address = $request->address;
       $details->bloodGroup = $request->bloodGroup;
       $details->identificationMark = $request->identificationMark;
       $details->parentNumber = $request->parentNumber;
       $details->homePhoneNumber = $request->homePhoneNumber;
       $details->fatherSpouseName = $request->fatherSpouseName;
       $details->motherName = $request->motherName;
       $details->guardianName = $request->guardianName;
       $details->save();
       $detailsId=$details->detailId;
       $roleIdForRoleDetailIdUpdation=3;

       \App\Http\Controllers\DetailController::updateUserDetailsId($detailsId,$userId);
       \App\Http\Controllers\DetailController::updateRoleInUsers($userId,3);
    }

    public function createStudent(Request $request)
    {

      $validated = $request->validate([
        'password' => ['required', Password::defaults(), 'confirmed'],
    ]);
      $user=new User;
      $user->email=$request->email;
      $user->password=Hash::make($request->password);
      $user->phone=$request->phone;
      $user->role=4;
      $user->save();
      $userId=$user->userId;
      event(new Registered($user));
        //Add An Entity
        $details = new detail;

       $details->firstname = $request->firstName;
       $details->lastname = $request->lastName;
       $details->age = $request->age;
       $details->dob = $request->dob;
       $details->contactNumber = $request->contactNumber;
       $details->alternateContactNumber = $request->alternateContactNumber;
       $details->userId = $userId;
       $details->roleId = 4;
       $details->address = $request->address;
       $details->bloodGroup = $request->bloodGroup;
       $details->identificationMark = $request->identificationMark;
       $details->parentNumber = $request->parentNumber;
       $details->homePhoneNumber = $request->homePhoneNumber;
       $details->fatherSpouseName = $request->fatherSpouseName;
       $details->motherName = $request->motherName;
       $details->guardianName = $request->guardianName;
       $details->save();
       $detailsId=$details->detailId;
       $roleIdForRoleDetailIdUpdation=4;

       \App\Http\Controllers\DetailController::updateUserDetailsId($detailsId,$userId);
       \App\Http\Controllers\DetailController::updateRoleInUsers($userId,4);
       return redirect()->to(route('AdminStudent#identify'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(detail $details)
    {
        //Delete self - details
        $details = detail::where('userId','=',$details->userId);
        $details->delete();
        return 1;
    }

   public function getDetailsAboutId()
   {
         //Retrieve  details
         $infoDetails = detail::all();
         return $infoDetails;
   }
}
