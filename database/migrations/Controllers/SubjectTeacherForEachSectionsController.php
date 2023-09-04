<?php

namespace App\Http\Controllers;

use App\Models\SubjectTeacherForEachSections;
use Illuminate\Http\Request;
use Redirect;

class SubjectTeacherForEachSectionsController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         //Add An Entity
         $subjectTeacherForEachSections = new SubjectTeacherForEachSections;
           $subjectTeacherForEachSections->teacherId =>  $request->teacherId,
           $subjectTeacherForEachSections->classRoomId =>  $request->classroomDetailId,
           $subjectTeacherForEachSections->subjectId =>  $request->subjectId,
           $subjectTeacherForEachSections->departmentId => $request->departmentId,
           $subjectTeacherForEachSections->semesterId =>  $request->semesterId,
           $subjectTeacherForEachSections->status => 1,
        $SubjectTeacherForEachSectionss->save();
       return Redirect::back();
     }



         public function update(Request $request)
         {
             //Updating classroom details
             $detail = SubjectTeacherForEachSections::where('subjectForSectionId', $request->subjectForSectionId)->first();
             $subjectTeacherForEachSections->teacherId =>  $request->teacherId,
             $subjectTeacherForEachSections->classRoomId =>  $request->classroomDetailId,
             $subjectTeacherForEachSections->subjectId =>  $request->subjectId,
             $subjectTeacherForEachSections->departmentId => $request->departmentId,
             $subjectTeacherForEachSections->semesterId =>  $request->semesterId,
             $subjectTeacherForEachSections->status => 1,
          $SubjectTeacherForEachSectionss->save();


           return Redirect::back();
         }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubjectTeacherForEachSections  $subjectTeacherForEachSections
     * @return \Illuminate\Http\Response
     */
    public function show(SubjectTeacherForEachSections $subjectTeacherForEachSections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubjectTeacherForEachSections  $subjectTeacherForEachSections
     * @return \Illuminate\Http\Response
     */
    public function edit(SubjectTeacherForEachSections $subjectTeacherForEachSections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubjectTeacherForEachSections  $subjectTeacherForEachSections
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubjectTeacherForEachSections $subjectTeacherForEachSections)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubjectTeacherForEachSections  $subjectTeacherForEachSections
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubjectTeacherForEachSections $subjectTeacherForEachSections)
    {
        //
    }
}
