<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<script src="{{ asset('js/sidebar.js') }}"></script>
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
            <button class="btn btn-primary" id="menu-toggle" style="position:fixed;">Toggle Menu</button>   {{ __('Assign classes') }}   @if(Session::has('success'))
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
    <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div>


    <div class="bg-light border-right" id="sidebar-wrapper" style="position: fixed;background-color:red;">
      <div class="sidebar-heading">Therichpost </div>
      <div class="list-group list-group-flush" style="max-height: 330px;overflow-y:scroll;">
        <ul>
          <li>
          <a href="#createTeacherForSubject" class="list-group-item list-group-item-action bg-light">Allot subjects to teachers</a>
          <a href="#editTeacherForSubject" class="list-group-item list-group-item-action bg-light">Edit/Change subject allotted to teachers's</a>
        </li>
          </ul>
      </div>
    </div>
  </div>

    <div>

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
                            <th>Grade</th>
                            <th>View</th
                          </tr>
                          @foreach(($classRoomss=\App\Models\classRoom::where('class_rooms.batchId','=',$currentBatchId)
                          ->join('sections','sections.sectionId','=','class_rooms.section')
                          ->join('grades','grades.gradeId','=','class_rooms.grade')
                          ->select('class_rooms.classroomDetailId AS classroomDetailId',
                          'class_rooms.capacity AS Capacity',
                          'grades.grade AS grade',
                          'sections.sectionName AS sectionName')->get()
                          ) as $classRoom)
                             <tr><td>{{$classRoom->grade}}</td>
                              <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTeacherForSubject{{$classRoom->classroomDetailId}}">View</button></td>
                            </tr>
                            <div class="modal fade" id="createTeacherForSubject{{$classRoom->classroomDetailId}}">
                               <div class="modal-dialog modal-sm">
                                 <div class="modal-content">

                                   <!-- Modal Header -->
                                   <div class="modal-header">
                                     <h4 class="modal-title">Modal Heading</h4>
                                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                                   </div>

                                   <!-- Modal body -->
                                   <div class="modal-body">

                                       <form action="{{route('createTeacherForSubject')}}" method="POST" name="createTeacherForSubject" id="createTeacherForSubject">
                                       {{ csrf_field() }}{{ method_field('POST') }}
                                     {{Form::label('grade','Grade : ')}} {{$classRoom->grade}}<br>
                                       {{Form::label('section','Section : ')}} {{$classRoom->sectionName}}<br>
                                       {{Form::label('capacity','Capacity : ')}} {{$classRoom->Capacity}}<br>
                                       {{Form::label('department','Department : ')}}
                                       <select name="departmentId">
                                         <option value="0" selected>Select Department</option>
                                         @foreach($departments=\App\Models\Department::where('departments.batchId','=',$currentBatchId)->get() as $department)
                                           <option value="{{$department->departmentId}}" selected>{{$department->departmentName}}</option>
                                         @endforeach
                                       </select><br>
                                       {{Form::label('semester','Semester : ')}}
                                       <select name="semesterId">
                                           <option value="0" selected>Select Semester</option>
                                           @if(count($semesters = \App\Models\semester::where('semesters.batchId','=',$currentBatchId)->get())>0)
                                           @foreach(($semesters = \App\Models\semester::where('semesters.batchId','=',$currentBatchId)->get()) as  $semester)
                                           <option value={{$semester->semesterId}}>{{$semester->semesterName}}</option>
                                           @endforeach
                                           @endif
                                         </select><br>
                                         {{Form::label('subject','Subject : ')}}
                                       <select name="subjectId">
                                         <option value="0" selected>Select Subject : </option>
                                         @foreach($subjects=\App\Models\subject::where('subjects.batchId','=',$currentBatchId)->get() as $subject)
                                           <option value="{{$subject->subjectId}}" selected>{{$subject->subjectName}}</option>
                                         @endforeach
                                       </select><br>
                                       {{Form::label('teacher','Teacher : ')}}
                                       <select name="teacherId">
                                         <option value="0" selected>Select Teacher</option>
                                         @foreach(($teachers=\App\Models\teacher::where('teachers.batchId','=',$currentBatchId)->join('details','details.userId','=','teachers.userId')
                                           ->select('details.lastname AS lastName','details.firstname AS firstName','teachers.teacherId AS teacherId','teachers.userId AS teacherUserId')->get())
                                           as $teacher)
                                           <option value="{{$teacher->teacherId}}" selected>{{$teacher->firstName}} {{$teacher->lastName}}</option>
                                         @endforeach
                                       </select><br>{{Form::hidden('classroomDetailId',$classRoom->classroomDetailId)}}
                                       <br><button class="btn btn-success btn-createTeacherForSubject">Submit</button>
                                         {{Form::close()}}<br>


                                   </div>

                                   <!-- Modal footer -->
                                   <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   </div>

                                 </div>
                               </div>
                              </div>
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
                                <th>Grade</th>
                                <th>View</th>
                              </tr>
                                @foreach(($classRooms=\App\Models\classRoom::where('class_rooms.batchId','=',$currentBatchId)
                                    ->join('sections','sections.sectionId','=','class_rooms.section')
                                    ->join('grades','grades.gradeId','=','class_rooms.grade')
                                    ->select('class_rooms.classroomDetailId AS classroomDetailId',
                                    'class_rooms.capacity AS Capacity',
                                    'grades.grade AS grade',
                                    'sections.sectionName AS sectionName')->get()
                                    ) as $classRoom)
                                    <tr><tr><td>{{$classRoom->grade}}</td>
                                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateTeacherForSubject{{$classRoom->classroomDetailId}}">View</button></td>
                                      </tr>

                                      <div class="modal fade" id="updateTeacherForSubject{{$classRoom->classroomDetailId}}">
                                         <div class="modal-dialog modal-sm">
                                           <div class="modal-content">

                                             <!-- Modal Header -->
                                             <div class="modal-header">
                                               <h4 class="modal-title">Modal Heading</h4>
                                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                                             </div>

                                             <!-- Modal body -->
                                             <div class="modal-body">

                                                 <form action="{{route('editTeacherForSubject')}}" method="POST" name="editTeacherForSubject" id="editTeacherForSubject">
                                                 {{ csrf_field() }}{{ method_field('POST') }}
                                               {{Form::label('grade','Grade : ')}} {{$classRoom->grade}}<br>
                                                 {{Form::label('section','Section : ')}} {{$classRoom->sectionName}}<br>
                                                 {{Form::label('capacity','Capacity : ')}} {{$classRoom->Capacity}}<br>
                                                 {{Form::label('department','Department : ')}}
                                                 <select name="departmentId">
                                                   <option value="0" selected>Select Department</option>
                                                   @foreach($departments=\App\Models\Department::where('departments.batchId','=',$currentBatchId)->get() as $department)
                                                     <option value="{{$department->departmentId}}" selected>{{$department->departmentName}}</option>
                                                   @endforeach
                                                 </select><br>
                                                 {{Form::label('semester','Semester : ')}}
                                                 <select name="semesterId">
                                                     <option value="0" selected>Select Semester</option>
                                                     @if(count($semesters = \App\Models\semester::where('semesters.batchId','=',$currentBatchId)->get())>0)
                                                     @foreach(($semesters = \App\Models\semester::where('semesters.batchId','=',$currentBatchId)->get()) as  $semester)
                                                     <option value={{$semester->semesterId}}>{{$semester->semesterName}}</option>
                                                     @endforeach
                                                     @endif
                                                   </select><br>
                                                   {{Form::label('subject','Subjevt : ')}}
                                                 <select name="subjectId">
                                                   <option value="0" selected>Select Subject : </option>
                                                   @foreach($subjects=\App\Models\subject::where('subjects.batchId','=',$currentBatchId)->get() as $subject)
                                                     <option value="{{$subject->subjectId}}" selected>{{$subject->subjectName}}</option>
                                                   @endforeach
                                                 </select><br>
                                                 {{Form::label('teacher','Teacher : ')}}
                                                 <select name="teacherId">
                                                   <option value="0" selected>Select Teacher</option>
                                                   @foreach(($teachers=\App\Models\teacher::where('teachers.batchId','=',$currentBatchId)->join('details','details.userId','=','teachers.userId')
                                                     ->select('details.lastname AS lastName','details.firstname AS firstName','teachers.teacherId AS teacherId','teachers.userId AS teacherUserId')->get())
                                                     as $teacher)
                                                     <option value="{{$teacher->teacherId}}" selected>{{$teacher->firstName}} {{$teacher->lastName}}</option>
                                                   @endforeach
                                                 </select><br>{{Form::hidden('classroomDetailId',$classRoom->classroomDetailId)}}
                                                 <br><button class="btn btn-success btn-createTeacherForSubject">Submit</button>
                                                   {{Form::close()}}<br>


                                             </div>

                                             <!-- Modal footer -->
                                             <div class="modal-footer">
                                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             </div>

                                           </div>
                                         </div>
                                        </div>
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
    </div>
</div>
</div>

        <!--

       -->

</x-app-layout>
