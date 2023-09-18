<?php

namespace App\Http\Controllers;

use Response;
use App\Models\classRoom;
use App\Models\grade;
use App\Models\section;
use App\Models\subject;
use App\Models\teacher;
use App\Models\student;
use App\Models\batch;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
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

    public function gatherClassRoomCreateData()
    {

      $classRooms = classRoom::all();

      return view("/Admin/classRoom")
      ->with('classRooms',$classRooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $validated = $request->validate([
          'grade' => ['required'],
              'section' => ['required'],
                'classTeacher' => ['required'],
      [
      'grade.required'=> 'A name must be specified for the grade(May be the grade in digits).',
        'section.required'=> 'A section must be selected',
         'classTeacher.date'=> 'Class teacher must be selected',
      ]
      ]);
      //createClassRoom

               $classRoom = new classRoom;
               $classRoom->grade =  $request->grade;
               $classRoom->roomNo =   $request->roomNo;
               $classRoom->section =  $request->section;
               $classRoom->classTeacher =    $request->classTeacher;
               $classRoom->description =$request->classDescription;
               $classRoom->capacity =$request->classCapacity;
               $classRoom->classTimeTableId = $request->classTimeTableId ? $request->classTimeTableId:"";
               $classRoom->batchId=batch::where('status',1)->select('batchId')->first()->batchId;
               $classRoom->save();

      return redirect()->route('AdminClassRoom',['id'=>'createClassRoom'])->with('success', 'Class created successfully.');
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
     * @param  \App\Models\classRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function show(classRoom $classRoom)
    {
        //Retrieve details
        $classRoom = classRoom::find(classroomDetailId);
        return $classRoom;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\classRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(classRoom $classRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\classRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        //Update A Classroom
        classRoom::where('classroomDetailId', $request->classroomId)
      ->update(['classTeacher' => $request->teacherId]);
        return redirect()->route('AdminClassRoom',['id'=>'viewEditClassrooms'])>with('success', 'Updated successfully.');
    }

    public function updateClassroomStudent(Request $request)
    {

       //Update A Classroom
       student::where('studentId', $request->studentId)
     ->update(['studentClassroom' => $request->classroomDetailId]);
       // return redirect()->route('AdminStudent');
       return redirect()->route('AdminClassRoom',['id'=>'viewEditClassrooms'])->with('success', 'Updated successfully.');
    }


    public function assignClassroomStudent(Request $request)
    {

       //Update A Classroom
       student::where('studentId', $request->studentId)
     ->update(['studentClassroom' => $request->classroomDetailId,
   'status'=>2]);
       //return redirect()->route('AdminStudent');
return redirect()->route('AdminStudent',['id'=>'assignClassRoomToStudents']) back()->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\classRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $classRoom=classRoom::where('classroomDetailId','=',$request->classroomId)->first();
        $classRoom->delete();
          return redirect()->route('getAdminClassRoomDetails');
    }


   public function showAllClassrooms()
   {
       //Collect details
       $classRoom = classRoom::all();
       return $classRoom;

   }

}
