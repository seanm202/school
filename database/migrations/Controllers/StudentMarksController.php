<?php

namespace App\Http\Controllers;

use App\Models\studentMarks;
use Illuminate\Http\Request;

class StudentMarksController extends Controller
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
    public function create(Request $request)
    {
      $studentMark = new studentMarks;

      $studentMarks->subjectId = $request->subjectId;
      $studentMarks->marks = $request->marks;
      $studentMarks->studentSemester = $request->studentSemester;
      $studentMarks->studentDepartmentId = $request->studentDepartmentId;
     $details->save();
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
      $studentMarks = studentMarks::where('student_marksId', $request->student_marksId)->first();
      $studentMarks->subjectId = $request->subjectId;
      $studentMarks->marks = $request->marks;
      $studentMarks->studentSemester = $request->studentSemester;
      $studentMarks->studentDepartmentId = $request->studentDepartmentId;
      $studentMarks->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\studentMarks  $studentMarks
     * @return \Illuminate\Http\Response
     */
     public function destroy(student $studentMark)
     {
       //Delete self - admin
       $studentMark = studentMarks::where('student_marksId'=> $studentMark->student_marksId);
       $studentMark->delete();
       return 1;
     }
}
