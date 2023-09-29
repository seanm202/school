<?php

namespace App\Http\Controllers;

use Response;
use App\Models\studentSubjectAttendance;
use App\Models\student;
use App\Models\batch;
use App\Models\days;
use App\Models\dailyTeacherAllocation;
use App\Models\hours;
use Carbon;
use Illuminate\Http\Request;

class StudentSubjectAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function indexstudentSubjectAttendance()
    {
      $StudentSubjectAttendance=StudentSubjectAttendance::all();
      return view('Teacher/Attendance')->with(compact('StudentSubjectAttendance'));
    }
    public function storestudentSubjectAttendance(Request $request)
    {
      $dailyTeacherAllocations=dailyTeacherAllocation::where('daily_Teacher_AllocationId','=',$request->dailyTeacherAllocationId)->first();
      $dailyTeacherAllocations->status=2;
      $dailyTeacherAllocations->save();

      $students = student::all();
      $dateId=$request->dateId;

      $hoursId=$request->hourId;

      $subjectId =$request->subjectId;
      $classRoomId=$request->classRoomId;
      $teacherId=$request->teacherId;
      foreach($students as $student)
      {
        $StudentSubjectAttendanceController = new StudentSubjectAttendance;
        $StudentSubjectAttendanceController->studentId=$student->studentId;
        $StudentSubjectAttendanceController->dayId=$request->dayId;
        $StudentSubjectAttendanceController->hourId=$hoursId;
        $StudentSubjectAttendanceController->subjectId=$subjectId;
        $StudentSubjectAttendanceController->classRoomId=$classRoomId;
        $StudentSubjectAttendanceController->teacherId=$teacherId;
        $StudentSubjectAttendanceController->presentOrAbsent=0;
        $StudentSubjectAttendanceController->submitted=0;
        $StudentSubjectAttendanceController->status=0;
        $StudentSubjectAttendanceController->dailyTeacherAllocationId=$request->dailyTeacherAllocationId;
        $StudentSubjectAttendanceController->batchId=batch::where('status',1)->select('batchId')->first()->batchId;
        $StudentSubjectAttendanceController->save();
                // $StudentSubjectAttendanceController->insertOrIgnore();
      }
      return redirect()->route('TeacherAttendance',['id'=>'createTeacherTimetableForTheParticularHour']);
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
    public function updatestudentSubjectAttendance(Request $request)
    {

$inputs = $request->input('id');


    foreach($inputs as $key => $value) {
  $StudentSubjectAttendanceController = studentSubjectAttendance::where('id','=',$request->id[$key])->first();
    $StudentSubjectAttendanceController->presentOrAbsent=$request->input('presentOrAbsent')[$key];
      $StudentSubjectAttendanceController->submitted=1;
    $StudentSubjectAttendanceController->save();
    }

    return redirect()->route('TeacherAttendance',['id'=>'submitClasswiseAttendence']);
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
