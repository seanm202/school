<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use App\Models\detail;
use App\Models\role;
use Illuminate\Http\Request;

class TeacherController extends Controller
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
      $roles=role::where('roleName', 'teacher')
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
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(teacher $teacher)
    {
      return view('user.profile', [
         'user' => teacher::findOrFail($id)
     ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(teacher $teacher)
    {
      // get old values
      $teacher = teacher::where('userId', $teacher->userId)
             ->get();
             return 1;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, teacher $teacher)
    {

          //Update admin details
          $detail = detail::where('userId'=>$teacher->userId);
          $detail = detail::updateOrCreate(
      ['firstname' => $teacher->, 'lastname' => $teacher->,
      'age' => $teacher->, 'dob' => $teacher->, 'contactNumber' => $teacher->,
      'alternateContactNumber' => $teacher->, 'roleId' => $teacher->, 'address' => $teacher->,
      'bloodGroup' => $teacher->, 'identificationMark' => $teacher->, 'parentNumber' => $teacher->,
      'homePhoneNumber' => $teacher->, 'father/SpouseName' => $teacher->, 'motherName' => $teacher->,
      'guardianName' => $teacher->, 'dob' => $teacher->]
  );
  return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(teacher $teacher)
    {
      //Delete self - admin
      $teachers = teacher::where('adminId'=> $teacher->userId);
      $teachers->delete();
      $detail = detail::where('userId'=>$teacher->userId);
      $detail->delete();
      return 1;
    }
}
