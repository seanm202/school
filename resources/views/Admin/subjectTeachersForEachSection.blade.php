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

<!--




 -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assign classes') }}   @if(Session::has('success'))
        <div class="alert alert-success" style="position: fixed;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif
        </h2>
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
    </x-slot>
    @if ( Auth::user()->role != 3)

      <script type="text/javascript">
      window.location = "{{url('logout')}}";//here double curly bracket
      </script>
    @endif

<!--



 -->

<!--

 -->

 <script type="text/javascript">

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

     $(".createTeacherForSubject").click(function(e){

         e.preventDefault();

         var form = $("#createTeacherForSubject");

         $.ajax({
            type:'POST',
            url:"{{ route('createTeacherForSubject') }}",
            data:form.serialize(),
            success: function(response){
      alert("jjjj");
            }
         });

     });


 </script>

    <div class="py-12" id="createTeacherForSubject">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Assign teachers to each class according to subject
                  @if(count(\App\Models\classRoom::where('class_rooms.batchId','=',$currentBatchId)
                      ->join('sections','sections.sectionId','=','class_rooms.section')
                      ->join('grades','grades.gradeId','=','class_rooms.grade')
                      ->select('class_rooms.classroomDetailId AS classroomDetailId',
                      'class_rooms.capacity AS Capacity',
                      'grades.grade AS grade',
                      'sections.sectionName AS sectionName')->get()
                      )>0)
                    <table>
                        <thead>
                          <tr>
                            <th>Classroom Id : </th>
                            <th>Grade</th>
                            <th>Section</th>
                            <th>Capacity</th>
                            <th>Department</th>
                            <th>Semester</th>
                            <th>Subject</th>
                            <th>Choose Teacher</th>
                          </tr>
                          @foreach(($classRoomss=\App\Models\classRoom::where('class_rooms.batchId','=',$currentBatchId)
                          ->join('sections','sections.sectionId','=','class_rooms.section')
                          ->join('grades','grades.gradeId','=','class_rooms.grade')
                          ->select('class_rooms.classroomDetailId AS classroomDetailId',
                          'class_rooms.capacity AS Capacity',
                          'grades.grade AS grade',
                          'sections.sectionName AS sectionName')->get()
                          ) as $classRoom)
                          <tr>

                            <form action="{{route('createTeacherForSubject')}}" method="POST" name="createTeacherForSubject" id="createTeacherForSubject">
                            {{ csrf_field() }}{{ method_field('POST') }}
                            <td>{{$classRoom->classroomDetailId}}</td>
                            <td>{{$classRoom->grade}}</td>
                            <td>{{$classRoom->sectionName}}</td>
                            <td>{{$classRoom->Capacity}}</td>
                            <td>
                            <select name="departmentId">
                              <option value="0" selected>Select Department</option>
                              @foreach($departments=\App\Models\Department::where('departments.batchId','=',$currentBatchId)->get() as $department)
                                <option value="{{$department->departmentId}}" selected>{{$department->departmentName}}</option>
                              @endforeach
                            </select></td>
                            <td><select name="semesterId">
                                <option value="0" selected>Select Semester</option>
                                @if(count($semesters = \App\Models\semester::where('semesters.batchId','=',$currentBatchId)->get())>0)
                                @foreach(($semesters = \App\Models\semester::where('semesters.batchId','=',$currentBatchId)->get()) as  $semester)
                                <option value={{$semester->semesterId}}>{{$semester->semesterName}}</option>
                                @endforeach
                                @endif
                              </select></td>
                            <td>
                            <select name="subjectId">
                              <option value="0" selected>Select Subject : </option>
                              @foreach($subjects=\App\Models\subject::where('subjects.batchId','=',$currentBatchId)->get() as $subject)
                                <option value="{{$subject->subjectId}}" selected>{{$subject->subjectName}}</option>
                              @endforeach
                            </select></td>
                            <td>
                            <select name="teacherId">
                              <option value="0" selected>Select Teacher</option>
                              @foreach(($teachers=\App\Models\teacher::where('teachers.batchId','=',$currentBatchId)->join('details','details.userId','=','teachers.userId')
                                ->select('details.lastname AS lastName','details.firstname AS firstName','teachers.teacherId AS teacherId','teachers.userId AS teacherUserId')->get())
                                as $teacher)
                                <option value="{{$teacher->teacherId}}" selected>{{$teacher->firstName}} {{$teacher->lastName}}</option>
                              @endforeach
                            </select></td>{{Form::hidden('classroomDetailId',$classRoom->classroomDetailId)}}
                            <td>  <button class="btn btn-success btn-createTeacherForSubject">Submit</button>
                              {{Form::close()}}</td>
                          </tr>
                          @endforeach
                          </thead>
                        </table>
         @else
            <h3 style="color:red;">List is empty!</h3>
         @endif

<!--



 -->
                    </div>
                </div>
            </div>
        </div>


        <script type="text/javascript">

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".editTeacherForSubject").click(function(e){

                e.preventDefault();

                var form = $("#editTeacherForSubject");

                $.ajax({
                   type:'POST',
                   url:"{{ route('editTeacherForSubject') }}",
                   data:form.serialize(),
                   success: function(response){
             alert("jjjj");
                   }
                });

            });


        </script>


    <div class="py-12" id="editTeacherForSubject">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        View/Edit Teachers assignments
                        <br>

                        Subjects<br>
                        @if(count(\App\Models\classRoom::where('class_rooms.batchId','=',$currentBatchId)
                            ->join('sections','sections.sectionId','=','class_rooms.section')
                            ->join('grades','grades.gradeId','=','class_rooms.grade')
                            ->select('class_rooms.classroomDetailId AS classroomDetailId',
                            'class_rooms.capacity AS Capacity',
                            'grades.grade AS grade',
                            'sections.sectionName AS sectionName')->get()
                            )>0)
                          <table>
                            <thead>
                              <tr>
                                <th>Classroom Id : </th>
                                <th>Grade</th>
                                <th>Section</th>
                                <th>Capacity</th>
                                <th>Department</th>
                                <th>Semester</th>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Update</th>
                              </tr>
                                @foreach(($classRooms=\App\Models\classRoom::where('class_rooms.batchId','=',$currentBatchId)
                                    ->join('sections','sections.sectionId','=','class_rooms.section')
                                    ->join('grades','grades.gradeId','=','class_rooms.grade')
                                    ->select('class_rooms.classroomDetailId AS classroomDetailId',
                                    'class_rooms.capacity AS Capacity',
                                    'grades.grade AS grade',
                                    'sections.sectionName AS sectionName')->get()
                                    ) as $classRoom)
                                    <tr>

                                      <form action="{{route('editTeacherForSubject')}}" method="POST" name="editTeacherForSubject" id="editTeacherForSubject">
                                      {{ csrf_field() }}{{ method_field('POST') }}
                                      <td>{{$classRoom->classroomDetailId}}</td>
                                      <td>{{$classRoom->grade}}</td>
                                      <td>{{$classRoom->sectionName}}</td>
                                      <td>{{$classRoom->Capacity}}</td>
                                      <td>
                                        <select name="departmentId">
                                          @foreach($departments=\App\Models\Department::where('departments.batchId','=',$currentBatchId)->get() as $department)
                                            @if($classRoom->departmentId==$department->departmentId)
                                              <option value="{{$department->departmentId}}" selected>{{$department->departmentName}}</option>
                                            @else
                                              <option value="{{$department->departmentId}}">{{$department->departmentName}}</option>
                                            @endif
                                          @endforeach
                                        </select></td>
                                <td><select name="semesterId">
                                  <option value="0" selected>Select Semester : </option>
                                  @foreach(($semesters = \App\Models\semester::where('semesters.batchId','=',$currentBatchId)->get()) as  $semester)
                                    @if($classRoom->semesterId==$semester->semesterId)
                                      <option value="{{$semester->semesterId}}" selected>{{$semester->semesterName}}</option>
                                    @else
                                      <option value={{$semester->semesterId}}>{{$semester->semesterName}}</option>
                                    @endif
                                  @endforeach
                                </select></td>
                                <td>
                                <select name="subjectId">
                                  @foreach($subjects=\App\Models\subject::where('subjects.batchId','=',$currentBatchId)->get() as $subject)
                                    @if($classRoom->subjectId==$subject->subjectId)
                                      <option value="{{$subject->subjectId}}" selected>{{$subject->subjectName}}</option>
                                    @else
                                      <option value={{$subject->subjectId}}>{{$subject->subjectName}}</option>
                                    @endif
                                  @endforeach
                                </select></td>
                                <td>
                                <select name="teacherId">
                                  @foreach(($teachers=\App\Models\teacher::where('teachers.batchId','=',$currentBatchId)->join('details','details.userId','=','teachers.userId')
                                    ->select('details.lastname AS lastName','details.firstname AS firstName','teachers.teacherId AS teacherId')->get())
                                    as $teacher)
                                     @if($classRoom->teacherId==$teacher->teacherId)
                                      <option value="{{$teacher->teacherId}}" selected>{{$teacher->firstName}} {{$teacher->lastName}}</option>
                                     @else
                                      <option value="{{$teacher->teacherId}}">{{$teacher->firstName}} {{$teacher->lastName}}</option>
                                     @endif
                                  @endforeach
                                </select></td>{{Form::hidden('classroomDetailId',$classRoom->classroomDetailId)}}
                                <td>  <button class="btn btn-success btn-editTeacherForSubject">Update</button>
                                  {{Form::close()}}</td>
                              </tr>
                              @endforeach
                            </thead>
                          </table>
        @else
          <h3 style="color:red;">List is empty!<h3>
        @endif
                    </div>
                </div>
            </div>
        </div>
        <!--

       -->

</x-app-layout>
