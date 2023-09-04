<?php

namespace App\Http\Controllers;

use App\Models\classRoom;
use App\Models\grade;
use App\Models\section;
use App\Models\subject;
use App\Models\teacher;
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
    public function create(Rrequest $request)
    {

      //createClassRoom

               $classRoom = new classRoom;
               $classRoom->grade =  1;
               $classRoom->roomNo =  1;
               $classRoom->section = 2;
               $classRoom->classTeacher =  0;
               $classRoom->description;
               $classRoom->capacity;
               $classRoom->classTimeTableId;
               $classRoom->save();

      return redirect()->route('getAdminClassRoomDetails');
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
      $validatedData = $request->validate([
    'teacherId' => ['teacherrequired'],
]);
        //Update A Classroom
        classRoom::where('classroomDetailId', $request->classroomId)
      ->update(['classTeacher' => $request->teacherId]);
        return redirect()->route('getAdminClassRoomDetails');
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
