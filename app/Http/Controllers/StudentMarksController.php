<?php

namespace App\Http\Controllers;

use Response;
use App\Models\student;
use App\Models\subject;
use App\Models\studentMarks;
use Illuminate\Http\Request;
use App\Models\batch;

class StudentMarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $students = student::all();
        $batchId=batch::where('status',1)->select('batchId')->first();
        foreach($students as $student)
        {
          $subjects = subject::where('semesterId','=',$student->studentSemester)
                              ->where('departmentId','=',$student->studentDepartmentId)
                              ->where('batchId',1)->get();
          foreach($subjects as $subject)
          {
            $studentMark=new studentMarks;


              $studentMark->userId = $student->userId;
              $studentMark->studentId = $student->studentId;
              $studentMark->classRoomId = $student->studentClassroom;
              $studentMark->subjectId = $subject->subjectId;
              $studentMark->marks = 0;
              $studentMark->status = 3;
              $studentMark->batchId = $batchId->batchId;
              $studentMark->save();
          }
              }
            return redirect()->route('AdminStudent',['id'=>'createMarkEntry']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $studentMarks = new studentMarks;

      $studentMarks->userId = $request->userId;
      $studentMarks->studentId = $request->studentId;
      $studentMarks->classRoomId = $request->classroomDetailId;
      $studentMarks->subjectId =  $request->subjectId;
      $studentMarks->marks = $request->subjectMarks;
      $studentMarks->status = 2;
      $studentMarks->batchId=batch::where('status',1)->select('batchId')->first()->batchId;
      $studentMarks->save();
      return redirect()->route('AdminStudent');
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
     * @param  \App\Models\studentMarks  $studentMarks
     * @return \Illuminate\Http\Response
     */
    public function show(studentMarks $studentMarks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\studentMarks  $studentMarks
     * @return \Illuminate\Http\Response
     */
    public function edit(studentMarks $studentMarks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\studentMarks  $studentMarks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, studentMarks $studentMarks)
    {

      $inputs = $request->input('student_marksId');


          foreach($inputs as $key => $value) {
        $studentMarks = studentMarks::where('student_marksId','=',$request->student_marksId[$key])->first();
          $studentMarks->marks=$request->input('subjectMark')[$key];
          $studentMarks->save();
          }

      return redirect()->route('AdminStudent',['id'=>'adminStudentAddStudentMarks']);
    }

    public function updateMarksTeacher(Request $request, studentMarks $studentMarks)
    {

      $inputs = $request->input('student_marksId');


          foreach($inputs as $key => $value) {
        $studentMarks = studentMarks::where('student_marksId','=',$request->student_marksId[$key])->first();
          $studentMarks->marks=$request->input('subjectMark')[$key];
          $studentMarks->save();
          }

      return redirect()->route('TeacherStudent',['id'=>'teacherStudentAddStudentMarks']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\studentMarks  $studentMarks
     * @return \Illuminate\Http\Response
     */
     public function destroy(studentMarks $studentMark)
     {
       //Delete self - admin
       $studentMark = studentMarks::where('student_marksId','=',$studentMark->student_marksId);
       $studentMark->delete();
       return redirect()->route('AdminStudent');
     }
}
