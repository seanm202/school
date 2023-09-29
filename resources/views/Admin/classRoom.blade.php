<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
  <script src="https://malsup.github.io/jquery.form.js"></script>
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
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <button class="btn btn-primary" id="menu-toggle" style="position:fixed;background-color: white;color:black;">Menu</button>  {{ __('Class Room') }}    @if(Session::has('success'))
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
      <div class="sidebar-heading">MySchool </div>
      <div class="list-group list-group-flush" style="max-height: 330px;overflow-y:scroll;">
        <ul>
          <li>
          <a href="#viewEditClassrooms" class="list-group-item list-group-item-action bg-light">View classrooms</a>
          <a href="#createClassRoom" class="list-group-item list-group-item-action bg-light">Create Classrooms</a>
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
    <div class="py-12" id="viewEditClassrooms">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  View Classroom details<br>



<!--

-->



          @if(count($classRooms=\App\Models\classRoom::join('grades','grades.gradeId','=','class_rooms.grade')
                                ->join('sections','sections.sectionId','=','class_rooms.section')
                                ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                                ->join('semesters','semesters.semesterId','=','class_rooms.semester')
                                ->join('teachers','teachers.teacherId','=','class_rooms.classTeacher')
                                ->join('details','details.detailId','=','teachers.teacherDetailId')
                                ->join('subject_teacher_for_each_sections','subject_teacher_for_each_sections.teacherId','=','teachers.teacherId')
                                ->join('subjects','subjects.subjectId','=','subject_teacher_for_each_sections.subjectId')
                                ->select('grades.grade AS grade',
                                'class_rooms.roomNo AS roomNo',
                                'sections.sectionName AS sectionName',
                                'departments.departmentName AS departmentName',
                                'semesters.semesterName as semesterName',
                                'details.firstname AS firstName',
                                'details.lastname AS lastName',
                                'subjects.subjectName AS classTeacherSubject',
                                'class_rooms.capacity AS capacity',
                                'class_rooms.roomNo AS roomNo',
                                'class_rooms.description AS description',
                                'class_rooms.classTimeTableId AS classTimeTableId',
                                'class_rooms.classroomDetailId AS classroomDetailId',
                                'class_rooms.batchId AS batchId'
                                )->where('class_rooms.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)
                                ->get())>0)
                        <table>
                          <thead>
                           <tr>
                            <th>Grade</th>
                            <th>Room No</th>
                            <th>Section</th>
                            <th>Department</th>
                            <th>Semester</th>
                            <th>Class Teacher</th>
                            <th>Description</th>
                            <th>Capacity</th>
                            <th>Update Class Room</th>
                            <th>Delete Class Room</th>
                           </tr>
                          </thead>
                        @foreach(($classRooms=\App\Models\classRoom::join('grades','grades.gradeId','=','class_rooms.grade')
                                              ->join('sections','sections.sectionId','=','class_rooms.section')
                                              ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                                              ->join('semesters','semesters.semesterId','=','class_rooms.semester')
                                              ->join('teachers','teachers.teacherId','=','class_rooms.classTeacher')
                                              ->join('details','details.detailId','=','teachers.teacherDetailId')
                                              ->select('grades.grade AS grade',
                                              'class_rooms.roomNo AS roomNo',
                                              'sections.sectionName AS sectionName',
                                              'departments.departmentName AS departmentName',
                                              'semesters.semesterName as semesterName',
                                              'details.firstname AS firstName',
                                              'details.lastname AS lastName',
                                              'class_rooms.capacity AS capacity',
                                              'class_rooms.roomNo AS roomNo',
                                              'class_rooms.description AS description',
                                              'class_rooms.classTimeTableId AS classTimeTableId',
                                              'class_rooms.classroomDetailId AS classroomDetailId',
                                              'class_rooms.batchId AS batchId',
                                              'class_rooms.classTeacher AS classTeacher'
                                              )->where('class_rooms.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)
                                              ->get()) as $classRoom)

                                              <form action="{{route('classRoom.updateClassroomTeacher')}}" method="POST" name="updateClassRoom" id="updateClassRoom">
                                              {{ csrf_field() }}{{ method_field('POST') }}
                                              {{Form::hidden('classroomId',$classRoom->classroomDetailId,array('id'=>'classroomId'))}}
                            <tr>
                              <td>{{$classRoom->grade}} </td>
                              <td>{{$classRoom->roomNo}} </td>
                              <td>{{$classRoom->sectionName}} </td>
                              <td>{{$classRoom->departmentName}} </td>
                              <td>{{$classRoom->semesterName}} </td>
                              <td><select name="teacherId" id="teacherId">
                                @foreach($teachers=\App\Models\teacher::where('teachers.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)
                                                                        ->join('details','details.detailId','=','teachers.teacherDetailId')
                                                                        ->select('details.lastname AS lastName',
                                                                        'details.firstname AS firstName',
                                                                        'teachers.teacherId AS teacherId')
                                                                        ->get() as $teacher)
                                    @if($classRoom->classTeacher==$teacher->teacherId)
                                       <option value="{{$teacher->teacherId}}" selected>{{$teacher->firstName}} {{$teacher->lastName}}</option>
                                    @else
                                       <option value="{{$teacher->teacherId}}">{{$teacher->firstName}} {{$teacher->lastName}}</option>
                                    @endif
                                @endforeach</td>
                              <td>{{$classRoom->description}}</td>
                              <td>{{$classRoom->capacity}}</td>
                              <td><button type="submit" class="btn btn-primary">Submit</button>
                              {{ Form::close()}}</td>
                              <form action="{{route('classRoom.destroyclassRoom')}}" method="POST" name="deleteClassRoom" id="deleteClassRoom">
                                {{ csrf_field() }}{{ method_field('POST') }}

                                {{Form::hidden('classroomId',$classRoom->classroomDetailId,array('id'=>'classroomId'))}}
                                <td><button type="submit" class="btn btn-primary">Delete</button>
                              {{ Form::close()}}</td>
                              </tr>
                        @endforeach
                       </table>
                      @else
                        <h3 style="color:red;">List is empty</h3>
                      @endif

                </div>
            </div>
        </div>
    </div>

    <!--

   -->

    <div class="py-12" id="createClassRoom">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  Create classroom
                  <form action="{{route('classRoom.createclassRoom')}}" method="POST" name="createClassRoom" id="createClassRoom">
                  {{ csrf_field() }}{{ method_field('POST') }}
                  {{Form::label('departments','Department')}}
                  <select name="departmentId">
                    @if(count($departments = \App\Models\Department::where('departments.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->get())>0)
                      @foreach(($departments = \App\Models\Department::where('departments.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->get()) as $department)
                        <option value="{{$department->departmentId}}">{{$department->departmentName}}</option>
                      @endforeach
                    @endif
                  </select>
                  <br>
                  <br>
                  {{Form::label('semesters','Semester')}}
                  <select name="semesterId">
                    @if(count($semesters = \App\Models\semester::where('semesters.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->get())>0)
                      @foreach($semesters = \App\Models\semester::where('semesters.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->get() as $semester)
                        <option value="{{$semester->semesterId}}">{{$semester->semesterName}}</option>
                      @endforeach
                    @endif
                  </select>
                  <br>
                  <br>
                  {{Form::label('classTeacher','Class Teacher')}}
                  <select name="classTeacher">
                    @if(count($teachers = \App\Models\teacher::where('teachers.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->get())>0)
                      @foreach(($teachers = \App\Models\teacher::join('details','details.userId','=','teachers.userId')
                                          ->select('details.firstname AS firstName','details.lastname AS lastName','teachers.teacherId AS teacherId')
                                                              ->where('teachers.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)
                                          ->get()) as $teacher)
                        <option value="{{$teacher->teacherId}}">{{$teacher->firstName}} {{$teacher->lastName}}</option>
                      @endforeach
                    @endif
                  </select>
                  <br>
                  <br>
                  {{Form::label('grade','Grade : ')}}
                  <select name="grade">
                    @if(count($grades = \App\Models\grade::where('grades.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->get())>0)
                      @foreach(($grades = \App\Models\grade::where('grades.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->get()) as $graded)
                        <option value="{{$graded->gradeId}}">{{$graded->grade}}</option>
                        @endforeach
                    @endif
                  </select>
                  <br>
                  {{Form::label('roomNo','Room Number : ')}}
                  {{Form::text('roomNo',null,array('placeholder'=>'Enter Room Number'))}}
                  <br>
                  {{Form::label('sectionName','Section Name : ')}}
                  <select name="section">
                    @if(count($sections = \App\Models\section::where('sections.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->get())>0)
                      @foreach(($sections = \App\Models\section::where('sections.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->get()) as $section)
                        <option value="{{$section->sectionId}}">{{$section->sectionName}}</option>
                      @endforeach
                    @endif
                  </select>
                  <br>
                  {{Form::label('description','Class Description')}}
                  {{Form::text('classDescription',null,array('placeholder'=>'Class description'))}}
                  <br>
                  {{Form::label('Capacity','Class Capacity')}}
                  {{Form::number('classCapacity',null,array('placeholder'=>'Class Capacity'))}}
                  <br>
                  @isset($classTimeTables)
                    {{Form::label('classTimeTableId','Class TimeTable Id')}}
                    <select name="classTimeTableId">
                      @foreach($classTimeTables as $classTimeTable)
                        <option value="{{$classTimeTable->classTimeTableId}}">{{$classTimeTable->classTimeTableName}}</option>
                      @endforeach
                    </select>
                  @endisset
                  <br><button type="submit" class="btn btn-primary">Create Classroom</button>
                  {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>


            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
            <script src="{{ asset('js/Admin/classRoom.js') }}" defer></script>
</x-app-layout>
