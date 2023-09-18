<?php

namespace App\Http\Controllers;

use Response;
use App\Models\teacher;
use App\Models\batch;
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
      $validated = $request->validate([

          'firstName' => ['required', 'confirmed'],
          'lastName' => ['required', 'confirmed'],
          'age' => ['required', 'numeric', 'confirmed'],
          'dob' => ['required', 'date', 'confirmed'],
          'contactNumber' => ['required', 'numeric', 'confirmed'],
          'alternateContactNumber' => ['required','numeric', 'confirmed'],
          'address' => ['required',  'confirmed'],
          'bloodGroup' => ['required',  'confirmed'],
          'identificationMark' => ['required', Password::defaults(), 'confirmed'],
          'parentNumber' => ['required', 'numeric', 'confirmed'],
          'homePhoneNumber' => ['required', 'numeric', 'confirmed'],
          'fatherSpouseName' => ['required', 'confirmed'],
          'motherName' => ['required',  'confirmed'],
          'guardianName' => ['required', 'confirmed'],
     [
      'firstName.required'=> 'Your First Name is Required',
      'lastName.required'=> 'Your Last Name is Required',
      'age.numeric'=> 'Age should be numeric',
      'dob.required'=> 'Your date of birth is Required',
      'contactNumber.required'=> 'Your Contact Number is Required',
      'contactNumber.numeric'=> 'Contact Number Should be numeric',
      'alternateContactNumber.required'=> 'An Alternate Contact Number is Required',
      'alternateContactNumber.numeric'=> 'Alternate Contact Number Should be numeric',
      'address.required'=> 'Address is required',
      'bloodGroup.required'=> 'Your blood group is Required',
      'identificationMark.required'=> 'Please provide an identification mark',
      'parentNumber.required'=> 'Parent\'s contact number is required',
      'homePhoneNumber.required'=> 'Home phone number is required',
      'fatherSpouseName.required'=> 'Your Father\'s / Spouse\'s name is Required',
      'motherName.required'=> 'Your Mother\'s name is Required',
      'guardianName.required'=> 'Your Guardian\'s name is Required',
     ]
      ]);
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
     $details->batchId = batch::where('status',1)->select('batchId')->first()->batchId;
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
