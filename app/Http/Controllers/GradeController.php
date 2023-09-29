<?php

namespace App\Http\Controllers;

use Response;
use App\Models\batch;
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
    public function getGradeDetails()
    {
      $grades = \App\Models\grade::all();
      return view("/Admin/details")->with('grades',$grades);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function creategrade(Request $request)
     {
$grade= new grade;
$grade->grade=$request->gradeName;
$grade->status=1;
$grade->batchId=batch::where('status',1)->select('batchId')->first()->batchId;
$grade->save();
           //Add An Entity

        return redirect()->route('AdminGrade',['id'=>'createGradeByAdmin']);
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
     public function updategrade(Request $request)
     {
         //Updating classroom details
         $grade= grade::where('gradeId','=',$request->gradeId)->first();
         $grade->grade=$request->gradeName;
         $grade->save();
           return redirect()->route('AdminGrade',['id'=>'updateGradeByAdmin']);
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroygrade(Request $request)
    {
      //Retrieve  details about grade
      $grade= grade::where('gradeId','=',$request->gradeId)->first();
      $grade->delete();
    return redirect()->route('AdminGrade',['id'=>'updateGradeByAdmin']);
    }
}
