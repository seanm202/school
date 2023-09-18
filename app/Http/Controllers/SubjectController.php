<?php

namespace App\Http\Controllers;

use Response;
use App\Models\subject;
use App\Models\batch;
use Illuminate\Http\Request;
use Session;

class SubjectController extends Controller
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
    // public function getSubjects()
    // {
    //   $subjects=subject::all();
    //   return view('Admin/subject')->with(['subjects'=>$subjects]);
    // }
    public function getDepartmentFromGradeForSubject(Request $request)
    {
      $gradeId=$request->gradeId;
      $departmentId=$request->departmentId;
      $semesterId=$request->semesterId;
      $subjectWithSelectedConditions=subject::where('subjectGrade','=',$gradeId)
                       ->where('subjectDepartment','=',$departmentId)
                       ->where('subjectSemester','=',$semesterId)->get();
Session::put('subjectWithSelectedConditions', $subjectWithSelectedConditions);
      return view('/Admin/subject');
    }

// //////////////////////////////////////////////////////////////////////////////////

    public function getSubCategories($id)
{
        $subjects = DB::table("sub_categories")->where("category_id",$id)->pluck("name","id");
        return json_encode($subcategories);
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
          $subjects = new subject;
          $validated = $request->validate([

              'semesterId' => ['required', 'confirmed'],
              'departmentId' => ['required', 'confirmed'],
              'subjectName' => ['required',  'confirmed'],
              'subjectGrade' => ['required',  'confirmed'],
              'subjectMaxMarks' => ['required', 'numeric', 'confirmed'],
         [
          'semesterId.required'=> 'Semester must be seleted',
          'departmentId.required'=> 'Department must be seleted',
          'subjectName.required'=> 'Subject name must be filled in',
          'subjectGrade.required'=> 'Subject grade must be entered.',
          'subjectMaxMarks.required'=> 'Subject maximum marks must be filled in.',
          'subjectMaxMarks.numeric'=> 'Subject maximum marks should be numeric',
         ]
          ]);
                   $subjects->semesterId = $request->semesterId;
                   $subjects->departmentId = $request->departmentId;
         $subjects->subjectName = $request->subjectName;
         $subjects->subjectGrade = $request->subjectGrade;
         $subjects->subjectMaxMarks = $request->subjectMaxMarks;
         $subjects->subjectTextName = $request->subjectTextName;
         $subjects->batchId=batch::where('status',1)->select('batchId')->first()->batchId;
         $subjects->save();

      return redirect()->route('AdminSubject',['id'=>'createSubject']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(subject $subject)
    {
      ////
      $subjects=subject::all();
      return $subjects;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(subject $subject)
    {
      //get old values
      $subject = subject::where('subjectId', $subject->subjectId)
             ->get();
             return 1;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {$validated = $request->validate([

        'semesterId' => ['required', 'confirmed'],
        'departmentId' => ['required', 'confirmed'],
        'subjectName' => ['required',  'confirmed'],
        'subjectGrade' => ['required',  'confirmed'],
        'subjectMaxMarks' => ['required', 'numeric', 'confirmed'],
   [
    'semesterId.required'=> 'Semester must be seleted',
    'departmentId.required'=> 'Department must be seleted',
    'subjectName.required'=> 'Subject name must be filled in',
    'subjectGrade.required'=> 'Subject grade must be entered.',
    'subjectMaxMarks.required'=> 'Subject maximum marks must be filled in.',
    'subjectMaxMarks.numeric'=> 'Subject maximum marks should be numeric',
   ]
    ]);
      $subject = subject::where('subjectId',$request->subjectId)->first();
    $subject->semesterId =$request->semesterId;
    $subject->departmentId = $request->departmentId;
    $subject->subjectName = $request->subjectName;
    $subject->subjectGrade = $request->subjectGrade;
    $subject->subjectMaxMarks = $request->subjectMaxMarks;
    $subject->subjectTextName = $request->subjectTextName;
    $subject->save();
    return redirect()->route('AdminSubject',['id'=>'updateSubject']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subject  $subject
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request)
     {
       //Delete Subject
      $subject = subject::where('subjectId', $request->subjectId)->first();
       $subject->delete();
       return redirect()->route('AdminSubject',['id'=>'updateSubject']);
     }
}
