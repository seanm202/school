<?php

namespace App\Http\Controllers;
use App\Models\semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
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
        //Add A Subject
            $semester = new semester;
            $semester->semesterName = $request->semesterName;
           $semester->save();

           return redirect()->route('Admin');
      }

      /**
       * Display the specified resource.
       *
       * @param  \App\Models\semester  $subject
       * @return \Illuminate\Http\Response
       */
      public function show(semester $subject)
      {
        ////
        $subjects=semester::all();
        return $subjects;
      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\Models\semester  $subject
       * @return \Illuminate\Http\Response
       */
      public function edit(semester $semester)
      {
        //get old values
        $semester = semester::where('semesterId', $semester->semesterId)
               ->get();
               return 1;
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  \App\Models\semester  $subject
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request, semester $semester)
      {
        $semester = semester::where('subjectId', $request->semesterId)->first();
      $semester->semesterName = $request->semesterName;
      $semester->save();
      return redirect()->route('Admin');
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  \App\Models\semester  $subject
       * @return \Illuminate\Http\Response
       */
       public function destroy(Request $request)
       {
         //Delete Subject
        $semester = semester::where('semesterId', $request->semesterId)->first();
         $semester->delete();
         return redirect()->route('Admin');
       }
}
