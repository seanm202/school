<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
  <style>

  /* Media Query for Mobile Devices */
         @media (max-width: 480px) {
              #withoutModal {
       display:none;
     }
     #withModal {
       display:show;
     }
         }

         /* Media Query for low resolution  Tablets, Ipads */
         @media (min-width: 481px) and (max-width: 767px) {
               #withoutModal {
       display:show;
     }
     #withModal {
       display:none;
     }
         }

         /* Media Query for Tablets Ipads portrait mode */
         @media (min-width: 768px) and (max-width: 1024px){
                   #withoutModal {
       display:show;
     }
     #withModal {
       display:none;
     }
         }

         /* Media Query for Laptops and Desktops */
         @media (min-width: 1025px) and (max-width: 1280px){
           #withoutModal {
display:show;
}
#withModal {
display:none;
}
         }

         /* Media Query for Large screens */
         @media (min-width: 1281px) {
                    #withoutModal {
       display:show;
     }
     #withModal {
       display:none;
     }
         }
  </style>
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Class Room') }}
           <br>
           <button class="btn btn-primary" id="menu-toggle" style="position:fixed;background-color: white;color:black;">Menu</button>
              @if(Session::has('success'))
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
                                <div id="withoutModal">
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
                        <tbody>
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
                              <td><select name="teacherId" class="form-control" id="teacherId">
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
                              <td><button type="submit" class="btn btn-primary form-control">Submit</button>
                              {{ Form::close()}}</td>
                              <form action="{{route('classRoom.destroyclassRoom')}}" method="POST" name="deleteClassRoom" id="deleteClassRoom">
                                {{ csrf_field() }}{{ method_field('POST') }}

                                {{Form::hidden('classroomId',$classRoom->classroomDetailId,array('id'=>'classroomId'))}}
                                <td><button type="submit" class="btn btn-primary form-control">Delete</button>
                              {{ Form::close()}}</td>
                              </tr>
                        @endforeach
                      </tbody>
                       </table>
                     </div>
                     <div id="withModal">
                       <table>
                         <thead>
                          <tr>
                           <th>Grade</th>
                           <th>Section</th>
                           <th>View</th>
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
                           <tr>
                             <td>{{$classRoom->grade}} </td>
                             <td>{{$classRoom->sectionName}} </td>
                             <td><button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#viewClasses{{$classRoom->classroomDetailId}}">View</button></td>
                             </tr>

                             <div class="modal fade" id="viewClasses{{$classRoom->classroomDetailId}}">
                                <div class="modal-dialog modal-sm">
                                  <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4 class="modal-title">Classroom Details</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                      <form action="{{route('classRoom.updateClassroomTeacher')}}" method="POST"  enctype="multipart/form-data"  name="updateBatches" id="updateBatches">

                                        <div style="display:flex;"><h3>Grade : {{$classRoom->grade}}</h3><h3>Room No : {{$classRoom->grade}}</h3><h3>Section : {{$classRoom->grade}}</h3></div>
                                        <div style="display:flex;"><h3>Department : {{$classRoom->grade}}</h3><h3>Semester : {{$classRoom->grade}}</h3></div>
                                        <div style="display:flex;"><h3>Class Teacher : </h3>
                                          <select name="teacherId" class="form-control" id="teacherId">
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
                                      @endforeach
                                    </select>
                                        </div>{{Form::hidden('classroomId',$classRoom->classroomDetailId,array('id'=>'classroomId'))}}
                                        <div style="display:flex;"><h3>Description : {{$classRoom->grade}}</h3><h3>Capacity : {{$classRoom->grade}}</h3></div>
                                        <button type="submit" class="btn btn-primary form-control">Update</button>{{Form::close()}}
                                       <form action="{{route('classRoom.destroyclassRoom')}}" method="POST"   enctype="multipart/form-data" name="currentBatch" id="currentBatch">
                                        {{ csrf_field() }}{{ method_field('POST') }}{{Form::hidden('classroomId',$classRoom->classroomDetailId,array('id'=>'classroomId'))}}
                                       <button type="submit" class="btn btn-primary form-control">Assign</button>{{Form::close()}}

                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>

                                  </div>
                                </div>
                               </div>
                       @endforeach
                       </table>
                        </div>
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
                  <select name="departmentId" class="form-control">
                    @if(count($departments = \App\Models\Department::where('departments.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->get())>0)
                      @foreach(($departments = \App\Models\Department::where('departments.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->get()) as $department)
                        <option value="{{$department->departmentId}}">{{$department->departmentName}}</option>
                      @endforeach
                    @endif
                  </select>
                  <br>
                  <br>
                  {{Form::label('semesters','Semester')}}
                  <select name="semesterId" class="form-control">
                    @if(count($semesters = \App\Models\semester::where('semesters.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->get())>0)
                      @foreach($semesters = \App\Models\semester::where('semesters.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->get() as $semester)
                        <option value="{{$semester->semesterId}}">{{$semester->semesterName}}</option>
                      @endforeach
                    @endif
                  </select>
                  <br>
                  <br>
                  {{Form::label('classTeacher','Class Teacher')}}
                  <select name="classTeacher" class="form-control">
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
                  <select name="grade" class="form-control">
                    @if(count($grades = \App\Models\grade::where('grades.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->get())>0)
                      @foreach(($grades = \App\Models\grade::where('grades.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->get()) as $graded)
                        <option value="{{$graded->gradeId}}">{{$graded->grade}}</option>
                        @endforeach
                    @endif
                  </select>
                  <br>
                  {{Form::label('roomNo','Room Number : ')}}
                  {{Form::text('roomNo',null,array('placeholder'=>'Enter Room Number','class'=>'form-control'))}}
                  <br>
                  {{Form::label('sectionName','Section Name : ')}}
                  <select name="section" class="form-control">
                    @if(count($sections = \App\Models\section::where('sections.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->get())>0)
                      @foreach(($sections = \App\Models\section::where('sections.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->get()) as $section)
                        <option value="{{$section->sectionId}}">{{$section->sectionName}}</option>
                      @endforeach
                    @endif
                  </select>
                  <br>
                  {{Form::label('description','Class Description')}}
                  {{Form::text('classDescription',null,array('placeholder'=>'Class description','class'=>'form-control'))}}
                  <br>
                  {{Form::label('Capacity','Class Capacity')}}
                  {{Form::number('classCapacity',null,array('placeholder'=>'Class Capacity','class'=>'form-control'))}}
                  <br>
                  @isset($classTimeTables)
                    {{Form::label('classTimeTableId','Class TimeTable Id')}}
                    <select name="classTimeTableId" class="form-control">
                      @foreach($classTimeTables as $classTimeTable)
                        <option value="{{$classTimeTable->classTimeTableId}}">{{$classTimeTable->classTimeTableName}}</option>
                      @endforeach
                    </select>
                  @endisset
                  <br><button type="submit" class="btn btn-primary form-control">Create Classroom</button>
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
