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
            {{ __('Attendance') }} @if ($errors->any())
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

            @if ( Auth::user()->role != 2)

                <script type="text/javascript">
                window.location = "{{url('logout')}}";//here double curly bracket
                </script>
              @endif

<!--


 -->

 <script type="text/javascript">

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

     $(".createTeacherTimetableForTheParticularHour").click(function(e){

         e.preventDefault();

         var form = $("#createTeacherTimetableForTheParticularHour");

         $.ajax({
            type:'POST',
            url:"{{ route('createTeacherTimetableForTheParticularHour') }}",
            data:form.serialize(),
            success: function(response){
      alert("jjjj");
            }
         });

     });


 </script>

    <div class="py-12" id="createTeacherTimetableForTheParticularHour">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  Create attendance table for allotted classes   @if(Session::has('success'))
                    <div class="alert alert-success" style="position: fixed;">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                    @endif
                  <table>
                    <thead>
                      <tr>
                        <th>Department</th>
                        <th>Grade</th>
                        <th>Semester</th>
                        <th>Section</th>
                        <th>Subject Name</th>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Hour</th>
                        <th>Created</th>
                        <th>Submit</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($classRoomsThatITeachs = \App\Models\dailyTeacherAllocation::where('daily_teacher_allocation.batchId','=',$currentBatchId)
                                                  ->where('daily_teacher_allocation.teacherId','=',(\App\Models\teacher::where('userId','=',Auth::user()->userId)->select('teacherId')->first())->teacherId)
                                                  ->where('daily_teacher_allocation.date',date('Y-m-d'))
                                                  ->join('class_rooms','class_rooms.classroomDetailId','=','daily_Teacher_Allocation.classRoomId')
                                                  ->join('sections','sections.sectionId','=','class_rooms.section')
                                                  ->join('grades','grades.gradeId','=','class_rooms.grade')
                                                  ->join('semesters','semesters.semesterId','class_rooms.semester')
                                                  ->join('subjects','subjects.subjectId','=','daily_Teacher_Allocation.subjectId')
                                                  ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                                                  ->join('hours','hours.hourId','=','daily_Teacher_Allocation.hourId')
                                                  ->join('days','days.dayId','=','daily_Teacher_Allocation.dayId')
                                                  ->select('grades.grade AS grade',
                                                  'sections.sectionName AS sectionName',
                                                  'semesters.semesterName AS semesterName',
                                                  'departments.departmentName AS departmentName',
                                                  'subjects.subjectName AS subjectName',
                                                  'semesters.semesterId AS semesterId',
                                                  'class_rooms.classroomDetailId AS classRoomId',
                                                  'subjects.subjectId AS subjectId',
                                                  'sections.sectionId AS sectionId',
                                                  'grades.gradeId as gradeId',
                                                  'departments.departmentId AS departmentId',
                                                  'days.dayId as dayId',
                                                  'hours.hourId AS hourId',
                                                  'days.dayName as dayName',
                                                  'hours.hourName AS hourName',
                                                  'daily_Teacher_Allocation.date AS date',
                                                  'daily_Teacher_Allocation.daily_Teacher_AllocationId as dailyTeacherAllocationId'
                                                  )->get() as $classRoomsThatITeach)
                                                  <tr>
                                                    <td>{{$classRoomsThatITeach->departmentName}}</td>
                                                    <td>{{$classRoomsThatITeach->grade}}</tdh>
                                                    <td>{{$classRoomsThatITeach->semesterName}}</td>
                                                    <td>{{$classRoomsThatITeach->sectionName}}</td>
                                                    <td>{{$classRoomsThatITeach->subjectName}}</td>
                                                    <td>{{$classRoomsThatITeach->date}}</td>
                                                    <td>{{$classRoomsThatITeach->dayName}}</td>
                                                    <td>{{$classRoomsThatITeach->hourName}}</td>
                                                    <form action="{{route('createTeacherTimetableForTheParticularHour')}}" method="POST" name="createTeacherTimetableForTheParticularHour" id="createTeacherTimetableForTheParticularHour">
                                                    {{ csrf_field() }}{{ method_field('POST') }}

                                                    {{Form::hidden('dayId',$classRoomsThatITeach->dayId)}}
                                                    {{Form::hidden('hourId',$classRoomsThatITeach->hourId)}}
                                                    {{Form::hidden('classRoomId',$classRoomsThatITeach->classRoomId)}}
                                                      {{Form::hidden('subjectId',$classRoomsThatITeach->subjectId)}}
                                                      {{Form::hidden('sectionId',$classRoomsThatITeach->sectionId)}}
                                                      {{Form::hidden('date',$classRoomsThatITeach->date)}}
                                                      {{Form::hidden('gradeId',$classRoomsThatITeach->gradeId)}}
                                                      {{Form::hidden('dailyTeacherAllocationId',$classRoomsThatITeach->dailyTeacherAllocationId)}}
                                                      {{Form::hidden('teacherId',(\App\Models\teacher::where('userId','=',Auth::user()->userId)->select('teacherId')->first())->teacherId)}}
                                                      {{Form::hidden('departmentId',$classRoomsThatITeach->departmentId)}}

                                                        @if(count($dayCreated=\App\Models\dailyTeacherAllocation::where('daily_teacher_allocation.batchId','=',$currentBatchId)
                                                                                      ->where('daily_teacher_allocation.teacherId','=',(\App\Models\teacher::where('userId','=',Auth::user()->userId)->select('teacherId')->first())->teacherId)
                                                                                      ->where('daily_teacher_allocation.classRoomId','=',$classRoomsThatITeach->classRoomId)
                                                                                      ->where('daily_teacher_allocation.subjectId','=',$classRoomsThatITeach->subjectId)
                                                                                      ->where('daily_teacher_allocation.dayId','=',$classRoomsThatITeach->dayId)
                                                                                      ->where('daily_teacher_allocation.hourId','=',$classRoomsThatITeach->hourId)
                                                                                      ->where('daily_teacher_allocation.date','=',date('Y-m-d'))
                                                                                      ->where('daily_teacher_allocation.status','=',2)
                                                                                      ->get())>0)
                                                            <td>                          <input type="checkbox" name="createClassAttendanceTable" value="1" checked disabled></input>
                                                          </td>
                                                          <td><button class="btn btn-success btn-createTeacherTimetableForTheParticularHour" disabled>Submit</button></input></td>
                                                        @else
                                                          <td> <input type="checkbox" name="createClassAttendanceTable" value="1"></input>
                                                          </td>
                                                          <td><button class="btn btn-success btn-createTeacherTimetableForTheParticularHour">Submit</button></input></td>
                                                        @endif
                                                    {{Form::close()}}
                                                  </tr>

                    @endforeach
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12" id="submitClasswiseAttendence">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    @foreach($classRoomsThatITeachs = \App\Models\dailyTeacherAllocation::where('daily_teacher_allocation.batchId','=',$currentBatchId)
                                                  ->where('daily_teacher_allocation.teacherId','=',(\App\Models\teacher::where('userId','=',Auth::user()->userId)->select('teacherId')->first())->teacherId)
                                                  ->where('batches.status','=',1)
                                                  ->where('daily_teacher_allocation.date','=',date('Y-m-d'))
                                                  ->join('class_rooms','class_rooms.classroomDetailId','=','daily_teacher_allocation.classRoomId')
                                                  ->join('sections','sections.sectionId','=','class_rooms.section')
                                                  ->join('grades','grades.gradeId','=','class_rooms.grade')
                                                  ->join('batches','batches.batchId','=','daily_teacher_allocation.batchId')
                                                  ->join('semesters','semesters.semesterId','class_rooms.semester')
                                                  ->join('subjects','subjects.subjectId','=','daily_teacher_allocation.subjectId')
                                                  ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                                                  ->select('grades.grade AS grade',
                                                  'sections.sectionName AS sectionName',
                                                  'semesters.semesterName AS semesterName',
                                                  'departments.departmentName AS departmentName',
                                                  'subjects.subjectName AS subjectName',
                                                  'daily_teacher_allocation.classRoomId AS classRoomId',
                                                  'daily_teacher_allocation.daily_Teacher_AllocationId  AS daily_Teacher_AllocationId',
                                                  'batches.batchName AS batchName',
                                                  'batches.batcheStartingYear AS batcheStartingYear',
                                                  'batches.batchEndingYear  AS batchEndingYear',
                                                  )->get() as $classRoomsThatITeach)
                                                  <table>
                                                    <thead>
                                                      <tr>
                                                        <th>Department</th>
                                                        <th>Grade</th>
                                                        <th>Semester</th>
                                                        <th>Section</th>
                                                        <th>Subject Name</th>
                                                        <th>View List</th></tr>
                                                        <tr>
                                                        <td>{{$classRoomsThatITeach->departmentName}}</td>
                                                        <td>{{$classRoomsThatITeach->grade}}</td>
                                                        <td>{{$classRoomsThatITeach->semesterName}}</td>
                                                        <td>{{$classRoomsThatITeach->sectionName}}</td>
                                                        <td>{{$classRoomsThatITeach->subjectName}}</td>
                                                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#getSelectedClassStudentList{{$classRoomsThatITeach->classRoomId}}">
                                                            View
                                                          </button></td></tr>

                                                    </thead>
                                                  </table>


                                                  <script type="text/javascript">

                                                      $.ajaxSetup({
                                                          headers: {
                                                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                          }
                                                      });

                                                      $(".submitClasswiseAttendence").click(function(e){

                                                          e.preventDefault();

                                                          var form = $("#submitClasswiseAttendence");

                                                          $.ajax({
                                                             type:'POST',
                                                             url:"{{ route('submitClasswiseAttendence') }}",
                                                             data:form.serialize(),
                                                             success: function(response){
                                                       alert("jjjj");
                                                             }
                                                          });

                                                      });


                                                  </script>
                                                  <div class="modal fade" id="getSelectedClassStudentList{{$classRoomsThatITeach->classRoomId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLongTitleS">Department : {{$classRoomsThatITeach->departmentName}}</h5>
                                                            <h5 class="modal-title" id="exampleModalLongTitless">Grade : {{$classRoomsThatITeach->grade}}</h5>
                                                          <h5 class="modal-title" id="exampleModalLongTitlesss">Semester : {{$classRoomsThatITeach->semesterName}}</h5>
                                                          <h5 class="modal-title" id="exampleModalLongTitlessss">Section : {{$classRoomsThatITeach->sectionName}}</h5>
                                                          <h5 class="modal-title" id="exampleModalLongTitlesssss">Subject : {{$classRoomsThatITeach->subjectName}}</h5>
                                                          <h5 class="modal-title" id="exampleModalLongTitlessssss">Student List</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <table>
                                                        <thead>
                                                          <tr>
                                                            <th>Name of the student</th>
                                                              <th>Present</th>
                                                              <th>Absent</th>
                                                          </tr>
                                                        </thead><form action="{{route('submitClasswiseAttendence')}}" method="POST" name="submitClasswiseAttendence" id="submitClasswiseAttendence">
                                                        {{ csrf_field() }}{{ method_field('POST') }}
                                                      @foreach(($students=\App\Models\studentSubjectAttendance::where('student_subject_attendances.batchId','=',$currentBatchId)
                                                                                ->where('student_subject_attendances.dailyTeacherAllocationId','=',$classRoomsThatITeach->daily_Teacher_AllocationId)
                                                                                ->join('students','students.studentId','=','student_subject_attendances.studentId')
                                                                                ->join('details','details.userId','=','students.userId')
                                                                                ->select('details.firstname AS firstName',
                                                                                'details.lastname AS lastName',
                                                                                'student_subject_attendances.id AS id',
                                                                                'students.studentId as studentId',
                                                                                'student_subject_attendances.presentOrAbsent AS presentOrAbsent'
                                                                                )
                                                                                ->get()) as $student)
                                                                @if($student->presentOrAbsent==1)

                                                                <tbody><tr>
                                                                    <td>{{$student->firstName}} {{$student->lastName}}<input type="hidden" name="id[]" value="{{$student->id}}"></input></td>
                                                                      <td><input type="checkbox" name="presentOrAbsent[]" value='1' checked>Present</input></td>
                                                                      <td><input type="checkbox" name="presentOrAbsent[]" value='0'>Absent</input></td>
                                                                  </tr>
                                                                @else
                                                                  <tr>
                                                                  <td>{{$student->firstName}} {{$student->lastName}}<input type="hidden" name="id[]" value="{{$student->id}}"></input></td>
                                                                    <td><input type="checkbox" name="presentOrAbsent[]" value='1'>Present</input></td>
                                                                    <td><input type="checkbox" name="presentOrAbsent[]" value='0' checked>Absent</input></td>
                                                                  </tr>
                                                                          </tbody>
                                                                @endif
                                                      @endforeach
                                                            </table>
                                                            <button class="btn btn-success btn-submitClasswiseAttendence">Submit</button>
                                                            {{Form::close()}}
                                                                            </div>
                                                                              <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                  </div>
                                                                            </div>
                                                                          </div>
                                                                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
