<?php

namespace App\Http\Controllers;

use App\Models\studentSubjectAttendance;
use Illuminate\Http\Request;

class StudentSubjectAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {

    }
    public function store(Request $request)
    {
      $students=  new student::all();
      $dayId=$request->dayId;
      $hourId= $request->hourId;
      $subjectId =$request->subjectId;
      $classRoomId=$request->classRoomId;
      $teacherId=$request->teacherId;
      foreach($students as $student)
      {
        $StudentSubjectAttendanceController = new StudentSubjectAttendanceController;
        $StudentSubjectAttendanceController->studentId=$student->studentId;
        $StudentSubjectAttendanceController->dayId=$dayId;
        $StudentSubjectAttendanceController->hourId=$hourId;
        $StudentSubjectAttendanceController->subjectId=$subjectId;
        $StudentSubjectAttendanceController->classRoomId=$classRoomId;
        $StudentSubjectAttendanceController->teacherId=$teacherId;
        $StudentSubjectAttendanceController->presentOrAbsent=0;
        $StudentSubjectAttendanceController->submitted=0;
        $StudentSubjectAttendanceController->save();
      }
      return redirect()->reoute('Admindashboard');
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\studentSubjectAttendance  $studentSubjectAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(studentSubjectAttendance $studentSubjectAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\studentSubjectAttendance  $studentSubjectAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(studentSubjectAttendance $studentSubjectAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\studentSubjectAttendance  $studentSubjectAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, studentSubjectAttendance $studentSubjectAttendance)
    {

$inputs = $request->input('studentId');


    foreach($inputs as $key => $value) {
  $StudentSubjectAttendanceController = StudentSubjectAttendanceController::where('studentId','=',$request->studentId[$key])
                                        ->where('teacherId','=',$request->teacherId)
                                        ->where('classRoomId','=',$request->classRoomId)
                                        ->where('subjectId','=',$request->subjectId)
                                        ->where('dayId','=',$request->dayId)
                                        ->where('hourId','=',$request->hourId)
                                        ->where('presentOrAbsent','=',$request->input('presentOrAbsent')[$key])
                                        ->where('submitted','=',1)
                                        ->first();
    $StudentSubjectAttendanceController->save();
    }

    return redirect()->route('TeacherAttendance');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\studentSubjectAttendance  $studentSubjectAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(studentSubjectAttendance $studentSubjectAttendance)
    {
        //
    }
}
