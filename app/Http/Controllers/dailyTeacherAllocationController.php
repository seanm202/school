<?php

namespace App\Http\Controllers;

use Response;
use App\Models\hours;
use App\Models\batch;
use App\Models\days;
use App\Models\dailyTeacherAllocation;
use App\Models\SubjectTeacherForEachSections;
use Illuminate\Http\Request;

class dailyTeacherAllocationController extends Controller
{

      //

      public function createDailyAttendanceForAllTeachers(Request $request)
      {
          //Store or add admin
          $SubjectTeacherForEachSections = SubjectTeacherForEachSections::all();
          $days=days::where('dayName','=',date('l'))->select('dayId')->first();
          $batchId=batch::where('status',1)->select('batchId')->first();
          foreach($SubjectTeacherForEachSections as $SubjectTeacherForEachSection)
          {
            $hours=hours::all();
            foreach($hours as $hour)
            {
            $dailyTeacherAllocations=new dailyTeacherAllocation;
            $dailyTeacherAllocations->classRoomId=$SubjectTeacherForEachSection->classRoomId;
            $dailyTeacherAllocations->teacherId=$SubjectTeacherForEachSection->teacherId;
            $dailyTeacherAllocations->subjectId=$SubjectTeacherForEachSection->subjectId;
            $dailyTeacherAllocations->dayId=$days->dayId;
            $dailyTeacherAllocations->hourId=$hour->hourId;
            $dailyTeacherAllocations->date=$request->dateSelected;
            $dailyTeacherAllocations->subjectForSectionId=$SubjectTeacherForEachSection->subjectForSectionId;
            $dailyTeacherAllocations->batchId=$batchId->batchId;
            $dailyTeacherAllocations->status=1;
            $dailyTeacherAllocations->save();
          }
          }

          $admins = admin::all();
          $days=days::where('dayName','=',date('l'))->select('dayId')->first();
          $batchId=batch::where('status',1)->select('batchId')->first();
          foreach($admins as $admin)
          {
            $hours=hours::all();
            foreach($hours as $hour)
            {
            $dailyTeacherAllocations=new dailyTeacherAllocation;
            $dailyTeacherAllocations->classRoomId=0;
            $dailyTeacherAllocations->teacherId=$admin->adminId;
            $dailyTeacherAllocations->subjectId=0;
            $dailyTeacherAllocations->dayId=$days->dayId;
            $dailyTeacherAllocations->hourId=$hour->hourId;
            $dailyTeacherAllocations->date=$request->dateSelected;
            $dailyTeacherAllocations->subjectForSectionId=0;
            $dailyTeacherAllocations->batchId=$batchId->batchId;
            $dailyTeacherAllocations->status=1;
            $dailyTeacherAllocations->save();
          }
          }

         return redirect()->route('Admin',['id'=>'generateAttendanceForTeachers'])->with('success', 'Updated successfully.');
      }

  }
