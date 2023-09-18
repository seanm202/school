<?php

namespace App\Http\Controllers;

use Response;
use App\Models\SubjectTeacherForEachSections;
use App\Models\batch;
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
         $validated = $request->validate([

             'classRoomId' => ['required', 'confirmed'],
             'subjectId' => ['required', 'confirmed'],
        [
         'classRoomId.required'=> 'A cass room must be seleted',
         'subjectId.required'=> 'A subject must be seleted',
        ]
         ]);
         $subjectTeacherForEachSections = new SubjectTeacherForEachSections;
           $subjectTeacherForEachSections->teacherId = $request->teacherId;
           $subjectTeacherForEachSections->classRoomId =  $request->classroomDetailId;
           $subjectTeacherForEachSections->subjectId =  $request->subjectId;
           $subjectTeacherForEachSections->departmentId = $request->departmentId;
           $subjectTeacherForEachSections->semesterId =  $request->semesterId;
           $subjectTeacherForEachSections->status= 1;
           $subjectTeacherForEachSections->batchId= 1;
           $subjectTeacherForEachSections->save();

                 return redirect()->route('AdminSubjectTeachersForEachSection',['id'=>'createTeacherForSubject']);
     }



         public function update(Request $request)
         {
             //Updating classroom details
             $validated = $request->validate([

                 'classRoomId' => ['required', 'confirmed'],
                 'subjectId' => ['required', 'confirmed'],
            [
             'classRoomId.required'=> 'A cass room must be seleted',
             'subjectId.required'=> 'A subject must be seleted',
            ]
             ]);
             $detail = SubjectTeacherForEachSections::where('subjectForSectionId', $request->subjectForSectionId)->first();
             $subjectTeacherForEachSections->teacherId =  $request->teacherId;
             $subjectTeacherForEachSections->classRoomId =  $request->classroomDetailId;
             $subjectTeacherForEachSections->subjectId =  $request->subjectId;
             $subjectTeacherForEachSections->departmentId = $request->departmentId;
             $subjectTeacherForEachSections->semesterId =  $request->semesterId;
             $subjectTeacherForEachSections->status = 1;
          $SubjectTeacherForEachSections->save();


           return redirect()->route('AdminSubjectTeachersForEachSection',['id'=>'editTeacherForSubject']);
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
    // public function update(Request $request,SubjectTeacherForEachSections $subjectTeacherForEachSections)
    // {
    //     //
    // }

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
