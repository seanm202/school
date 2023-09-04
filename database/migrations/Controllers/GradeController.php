<?php

namespace App\Http\Controllers;

use App\Models\grade;
use Illuminate\Http\Request;

class GradeController extends Controller
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

           //Add An Entity
         $gradeNameNew=$request->gradeName;
          grade::updateOrCreate(['grade' => $gradeNameNew]);
          return view("/Admin/grade");
     }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Create a record
      $grades = new grade;

     $grades->yes_or_no = $request->yes_or_no;
     $grades->userId = $request->userId;
     $grades->dailyReg = $request->dailyReg;

     $grades->save();
     return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(grade $grade)
    {

          //
          $grades=grade::all();
          return $grades;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\grade  $grade
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request)
     {
         //Updating classroom details
             grade::where('gradeId', $request->gradeId)->update(['grade' => $request->gradeName]);
           return view("/Admin/grade");
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      //Retrieve  details about grade
      $grades = grade::where('gradeId','=',$request->gradeId)->delete();
      return view("/Admin/grade");
    }
}
