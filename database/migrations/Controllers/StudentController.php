<?php

namespace App\Http\Controllers;

use App\Models\detail;
use App\Models\role;
use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function assignClassRoomForStudent(Request $request)
    {
      //Store or add admin
      $student = students::where('studentId','=',$studentId);

     $details->userId = $request->userId;
     $details->userId = $request->userId;
     $details->studentDetailsId = $request->studentDetailsId;
     $details->studentClassroom = $request->studentClassroom;
     $details->studentGrade = $request->studentGrade;
     $details->studentSection = $request->studentSection;
     $details->studentSemester = $request->studentSemester;
     $details->studentDepartmentId = $request->studentDepartmentId;
     $details->save();

            return 1;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles=role::where('roleName', 'student')
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
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
      return view('student.profile', [
         'student' => student::findOrFail($id)
     ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
      // get old values
      $student = student::where('userId', $student->userId)
             ->get();
             return 1;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
      //Update admin details
            $detail = detail::where('userId'=>$student->userId);
            $detail = detail::updateOrCreate(
        ['firstname' => $request->, 'lastname' => $request->,
        'age' => $request->, 'dob' => $request->, 'contactNumber' => $request->,
        'alternateContactNumber' => $request->, 'roleId' => $request->, 'address' => $request->,
        'bloodGroup' => $request->, 'identificationMark' => $request->, 'parentNumber' => $request->,
        'homePhoneNumber' => $request->, 'father/SpouseName' => $request->, 'motherName' => $request->,
        'guardianName' => $request->, 'dob' => $request->]
    );
    return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
      //Delete self - admin
      $students = student::where('adminId'=> $student->userId);
      $students->delete();
      $detail = detail::where('userId'=>$student->userId);
      $detail->delete();
      return 1;
    }
}
