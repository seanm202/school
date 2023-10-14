<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src = "https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity = "sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin = "anonymous">
  </script>
  <script src =
"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      integrity =
"sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
      crossorigin = "anonymous">
  </script>
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendance') }}
            @if ($errors->any())
               <div class="alert alert-danger">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
            @endif
        </h2>
    </x-slot>

        @if ( Auth::user()->role != 4)

            <script type="text/javascript">
            window.location = "{{url('logout')}}";//here double curly bracket
            </script>
          @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    View your attendance data   @if(Session::has('success'))
        <div class="alert alert-success" style="position: fixed;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif

                  @if(count($studentAttendanceStatus = \App\Models\studentSubjectAttendance::where('student_subject_attendances.studentId','=',(\App\Models\student::where('students.userId','=',Auth::user()->userId)->where('students.batchId','=',$currentBatchId)->select('students.studentId')->first())->studentId)->where('student_subject_attendances.batchId','=',$currentBatchId)
                           ->join('subjects','subjects.subjectId','=','student_subject_attendances.subjectId')
                           ->join('days','days.dayId','=','student_subject_attendances.dayId')
                           ->join('hours','hours.hourId','=','student_subject_attendances.hourId')
                           ->select('days.dayName AS dayName',
                            'hours.hourName AS hourName',
                            'subjects.subjectName AS subjectName',
                            'student_subject_attendances.presentOrAbsent AS attendanceStatus',
                            'student_subject_attendances.id  AS id'
                            )
                           ->get())>0)
                    <table class="table">
                      <thead>
                        <tr>
                        <th>Attendance Id</th>
                        <th>Day</th>
                        <th>Date</th>
                        <th>Hour</th>
                        <th>Subject</th>
                        <th>Absent</th>
                        <th>Present</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach(($studentAttendanceStatus = \App\Models\studentSubjectAttendance::where('student_subject_attendances.studentId','=',(\App\Models\student::where('students.userId','=',Auth::user()->userId)->where('students.batchId','=',$currentBatchId)->select('students.studentId')->first())->studentId)->where('student_subject_attendances.batchId','=',$currentBatchId)
                               ->join('daily_teacher_allocation','daily_teacher_allocation.daily_Teacher_AllocationId','=','student_subject_attendances.dailyTeacherAllocationId')
                               ->join('students','students.studentId','=','student_subject_attendances.studentId')
                               ->join('subjects','subjects.subjectId','=','student_subject_attendances.subjectId')
                               ->join('days','days.dayId','=','student_subject_attendances.dayId')
                               ->join('hours','hours.hourId','=','student_subject_attendances.hourId')
                               ->select('days.dayName AS dayName',
                                'hours.hourName AS hourName',
                                'subjects.subjectName AS subjectName',
                                'student_subject_attendances.presentOrAbsent AS attendanceStatus',
                                'student_subject_attendances.id  AS id',
                                'daily_teacher_allocation.date AS date'
                                )
                               ->get()) as $studentAttendanceState)
                               <tr>
                                 <td>{{$studentAttendanceState->id}}</td>
                                 <td>{{$studentAttendanceState->dayName}}</td>
                                 <td>{{$studentAttendanceState->date}}</td>
                                 <td>{{$studentAttendanceState->hourName}}</td>
                                 <td>{{$studentAttendanceState->subjectName}}</td>
                                 @if($studentAttendanceState->attendanceStatus==1)
                                  <td><input type="checkbox" class="form-control" name="attStatus" disabled></input></td>
                                  <td><input type="checkbox" class="form-control" name="attStatus" checked disabled></input></td>
                                 @else
                                  <td><input type="checkbox" class="form-control" name="attStatus" checked disabled></input></td>
                                  <td><input type="checkbox" class="form-control" name="attStatus" disabled></input></td>
                                 @endif
                               </tr>
                      @endforeach
                      </tbody>
                    </table>
                  @else
                    <h3 style="color:red;">List is empty</h3>
                  @endif




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
