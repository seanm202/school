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
          <button class="btn btn-primary" id="menu-toggle" style="position:fixed;">Toggle Menu</button>     {{ __('Students') }}   @if(Session::has('success'))
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
          <a href="#adminStudentAddStudent" class="list-group-item list-group-item-action bg-light">Add Student</a>
          <a href="#createMarkEntry" class="list-group-item list-group-item-action bg-light">Create Mark Entry</a>
          <a href="#assignClassRoomToStudents" class="list-group-item list-group-item-action bg-light">Assign classroom to students</a>
          <a href="#adminStudentAddStudentMarks" class="list-group-item list-group-item-action bg-light">Add students's Marks</a>
        </li>
          </ul>
      </div>
    </div>
  </div>

    <div>

    <!--

   -->  @if ( Auth::user()->role != 3)

       <script type="text/javascript">
       window.location = "{{url('logout')}}";//here double curly bracket
       </script>
     @endif

   <script type="text/javascript">

       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });

       $(".addStudentAdmin").click(function(e){

           e.preventDefault();

           var form = $("#addStudentAdmin");

           $.ajax({
              type:'POST',
              url:"{{ route('addStudentAdmin') }}",
              data:form.serialize(),
              success: function(response){
        alert("jjjj");
              }
           });

       });


   </script>

    <div class="py-12" id="adminStudentAddStudent">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  Add Students

                  <form action="{{route('addStudentAdmin')}}" method="POST" name="addStudentAdmin" id="addStudentAdmin">
                  {{ csrf_field() }}{{ method_field('POST') }}
                    <table>
                  <thead>
                    <tr>
                      <th>First Name</th>
                    <td>{{Form::text('firstName',NULL,array('placeholder'=>'Enter first name'))}} </td>
                    </tr>
                    <tr>
                      <th>Last name</th>
                    <td>{{Form::text('lastName',NULL,array('placeholder'=>'Enter last name'))}} </td></tr>
                    <tr>
                      <th>Email</th>
                    <td>{{Form::text('email',NULL,array('placeholder'=>'Enter Email Id'))}} </td></tr>
                    <tr>
                      <th>Phone</th>
                    <td>{{Form::text('phone',NULL,array('placeholder'=>'Enter Phone Number'))}} </td></tr>
                      <tr>
                      <th>Age</th>{{Form::hidden('password',(\App\Models\ConstantController::where('constantName','defaultPassword')->select('constantValue')->first()))}}
                    <td>{{Form::text('age',NULL,array('placeholder'=>'Enter age'))}}</td></tr>
                      <tr>
                      <th>Date of birth</th>
                    <td>{{Form::date('dob',NULL,array('placeholder'=>'Enter date of birth'))}}</td></tr>
                      <tr>
                        <th>Contact Number</th>
                        <td>{{Form::text('contactNumber',NULL,array('placeholder'=>'Enter contact Number'))}}</td></tr>
                        <tr>
                          <th>Alternate Contact Number</th>
                          <td>{{Form::text('alternateContactNumber',NULL,array('placeholder'=>'Enter Alternate Contact Number'))}}</td></tr>
                    <tr>
                        <th>Address</th>
                        <td>{{Form::text('address',NULL,array('placeholder'=>'Enter Address'))}}</td>
                      </tr>

                    <tr>
                    <th>Blood Group</th>
                    <td>{{Form::text('bloodGroup',NULL,array('placeholder'=>'Enter Blood Group'))}}</td>
                    </tr>


                    <tr>
                    <th>Identification Mark</th>
                    <td>{{Form::text('identificationMark',NULL,array('placeholder'=>'Enter Identification Mark'))}}</td>
                    </tr>
                    <tr>
                    <th>Parent's Number</th>
                    <td>{{Form::text('parentNumber',NULL,array('placeholder'=>'Enter Parent\'s Number'))}}</td>
                    </tr>
                    <tr>
                    <th>Home Phone Number</th>
                    <td>{{Form::text('homePhoneNumber',NULL,array('placeholder'=>'Home Phone Number'))}}</td>
                    </tr>
                    <tr>
                    <th>Father's / Spouse's Name</th>
                    <td>{{Form::text('fatherSpouseName',NULL,array('placeholder'=>'Father\'s/Spouse\'s Name'))}}</td>
                    </tr>
                    <tr>
                    <th>Mother's Name</th>
                    <td>{{Form::text('motherName',NULL,array('placeholder'=>'Mother\'s Name'))}}</td>
                    </tr>
                    <tr>
                    <th>Guardian Name</th>
                    <td>{{Form::text('guardianName',NULL,array('placeholder'=>'Guardian Name'))}}</td>
                    </tr>
                    </thead>
                  </table>
                  <button class="btn btn-success btn-addStudentAdmin">Submit</button>

                                        {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
<!--
Add students to class_rooms

 -->
 <div class="py-12" id="createMarkEntry">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
               Create mark entry for all the students

               <form action="{{route('createMarkEntry')}}" method="POST" name="createMarkEntry" id="createMarkEntry">
               {{ csrf_field() }}{{ method_field('POST') }}
                <input type="submit" name="createMarkEntry" value="Submit"></input>
              </form>
                                     {{Form::close()}}
             </div>
         </div>
     </div>
 </div>

<!--
Create Mark table for all the students

 -->
 <script type="text/javascript">

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

     $(".assignClassRoomToStudents").click(function(e){

         e.preventDefault();

         var form = $("#assignClassRoomToStudents");

         $.ajax({
            type:'POST',
            url:"{{ route('assignClassRoomToStudents') }}",
            data:form.serialize(),
            success: function(response){
      alert("jjjj");
            }
         });

     });


 </script>





<!--



 -->
 <div class="py-12" id="assignClassRoomToStudents">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
                 Assign students to classes
                 <br>
                 New Users<br>
                 @if(count($studentsNotAssignedToClasses=\App\Models\student::where('students.status','=',3)->join('details','details.userId','=','students.userId')->join('users','users.userId','=','students.userId')
                                ->select('details.firstname AS firstName','details.lastname AS lastName','users.email AS Email','users.phone AS Phone','students.studentId AS studentId')
                                ->get())>0)
                                @foreach(($studentsNotAssignedToClasses=\App\Models\student::where('students.status','=',3)->join('details','details.userId','=','students.userId')->join('users','users.userId','=','students.userId')
                                ->select('details.firstname AS firstName','details.lastname AS lastName','users.email AS Email','users.phone AS Phone','students.studentId AS studentId')
                                ->get()) as $studentsNotAssignedToClass)
                                <table>
                                  <thead>
                                          <tr>
                                            <th>First name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Select</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>{{$studentsNotAssignedToClass->firstName}} </td>
                                            <td>{{$studentsNotAssignedToClass->lastName}} </td>
                                            <td>{{$studentsNotAssignedToClass->Email}}</td>
                                            <td>{{$studentsNotAssignedToClass->Phone}}</td>
                                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#assignStudentsToClasses{{$studentsNotAssignedToClass->studentId}}">
                                              Select classroom
                                            </button></td>

                                          </tr>


                                        </tbody>
                                      </table>

                   <script type="text/javascript">

                       $.ajaxSetup({
                           headers: {
                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                           }
                       });

                       $(".assignClassRoomToStudents").click(function(e){

                           e.preventDefault();

                           var form = $("#assignClassRoomToStudents");

                           $.ajax({
                              type:'POST',
                              url:"{{ route('assignClassRoomToStudents') }}",
                              data:form.serialize(),
                              success: function(response){
                        alert("jjjj");
                              }
                           });

                       });


                   </script>

                         <div class="modal fade" id="assignStudentsToClasses{{$studentsNotAssignedToClass->studentId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                             <div class="modal-content">
                               <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLongTitle">Name : {{$studentsNotAssignedToClass->firstName}} {{$studentsNotAssignedToClass->lastName}}</h5>
                                   <h5 class="modal-title" id="exampleModalLongTitle">Email : {{$studentsNotAssignedToClass->Email}}</h5>
                                 <h5 class="modal-title" id="exampleModalLongTitle">Phone : {{$studentsNotAssignedToClass->Phone}}</h5>
                                 <h5 class="modal-title" id="exampleModalLongTitle">New users</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                 </button>
                               </div>
                               <div class="modal-body">
                                 <table>
                                   <thead><tr>
                                     <th>Grade</th>
                                       <th>Section</th>
                                       <th>Room Number</th>
                                       <th>Department</th>
                                         <th>Semester</th>
                                           <th>Class Teacher</th>
                                             <th>Capacity</th>
                                                <th>Select</th></tr>
                                     <tr>
                                     </thead>
                                       <tbody>
                                 @foreach($classRooms=\App\Models\classRoom::join('teachers','teachers.teacherId','=','class_rooms.classTeacher')
                                 ->join('details','details.userId','=','teachers.userId')
                                 ->join('grades','grades.gradeId','=','class_rooms.grade')
                                 ->join('sections','sections.sectionId','=','class_rooms.section')
                                 ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                                 ->join('semesters','semesters.semesterId','=','class_rooms.semester')
                                 ->select('details.firstname AS firstName',
                                 'details.lastname AS lastName',
                                 'grades.grade AS grade',
                                 'sections.sectionName AS sectionName',
                                 'departments.departmentName AS departmentName',
                                 'semesters.semesterName AS semesterName',
                                 'class_rooms.capacity AS Capacity',
                                 'class_rooms.roomNo AS roomNo')->get() as $classRoom)

                                 <form action="{{route('assignClassRoomToStudents')}}" method="POST" name="assignClassRoomToStudents" id="assignClassRoomToStudents">
                                 {{ csrf_field() }}{{ method_field('POST') }}

                        <td>{{$classRoom->grade}}</td>
                        <td>{{$classRoom->sectionName}}</td>
                                   <td>{{$classRoom->roomNo}}</td>
                                   <td>{{$classRoom->departmentName}}</td>
                                   <td>{{$classRoom->semesterName}}</td>
                                   <td>{{$classRoom->firstName}} {{$classRoom->lastName}}</td>
                                   <td>{{$classRoom->Capacity}}</td>
                                   <td><button class="btn btn-success btn-assignClassRoomToStudents">Select</button>{{Form::close()}}</td></tr>


                                                         @endforeach
                                                       </tbody>
                                                     </table>
                                                   </div>
                                                     <div class="modal-footer">
                                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                     </div>
                                                   </div>
                                                 </div>
                                               </div>

                               @endforeach
                         @else
                           <h3 style="color:red;">List is empty!</h3>
                         @endif

             </div>
           </div>
         </div>
       </div>
<!--




 -->

 <script type="text/javascript">

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

     $(".createStudentSubjectMarks").click(function(e){

         e.preventDefault();

         var form = $("#createStudentSubjectMarks");

         $.ajax({
            type:'POST',
            url:"{{ route('createStudentSubjectMarks') }}",
            data:form.serialize(),
            success: function(response){
      alert("jjjj");
            }
         });

     });


 </script>

    <div class="py-12" id="adminStudentAddStudentMarks">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <h2>Add student Marks</h2>
                  @if(count(($studentDetails = \App\Models\student::where('students.batchId','=',$currentBatchId)
                                ->join('details','details.detailId','=','students.studentDetailsId')
                                ->join('semesters','semesters.semesterId','=','students.studentSemester')
                                ->join('class_rooms','class_rooms.classroomDetailId','=','students.studentClassroom')
                                ->join('student_marks','student_marks.studentId','=','students.studentId')
                                ->join('subjects','subjects.subjectId','=','student_marks.subjectId')
                                ->join('departments','departments.departmentId','=','students.studentDepartmentId')
                                ->join('grades','grades.gradeId','=','class_rooms.grade')
                                ->join('sections','sections.sectionId','=','class_rooms.section')
                                ->select('student_marks.marks AS marks',
                                'semesters.semesterName AS semesterName',
                                'details.firstname AS firstName',
                                'students.studentDepartmentId AS studentDepartmentId',
                                'students.studentId AS studentId',
                                'details.lastname AS lastName',
                                'class_rooms.grade AS gradeName',
                                'sections.sectionName AS sectionName',
                                'subjects.subjectName AS subjectName',
                                'semesters.semesterId AS semesterId',
                                'grades.grade AS gradeName',
                                )->get()
                                ))>0)
                                <table>
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Grade</th>
                        <th>Section</th>
                        <th>Semester</th>
                        <th>Add Marks</th>
                        <th>View Details</th>
                      </tr>

              @foreach(($studentDetails = \App\Models\student::where('students.batchId','=',$currentBatchId)
                            ->join('details','details.detailId','=','students.studentDetailsId')
                            ->join('semesters','semesters.semesterId','=','students.studentSemester')
                            ->join('class_rooms','class_rooms.classroomDetailId','=','students.studentClassroom')
                            ->join('student_marks','student_marks.studentId','=','students.studentId')
                            ->join('departments','departments.departmentId','=','students.studentDepartmentId')
                            ->join('grades','grades.gradeId','=','class_rooms.grade')
                            ->join('sections','sections.sectionId','=','class_rooms.section')
                            ->select('semesters.semesterName AS semesterName',
                            'details.firstname AS firstName',
                            'students.studentDepartmentId AS studentDepartmentId',
                            'students.studentId AS studentId',
                            'details.lastname AS lastName',
                            'class_rooms.grade AS gradeName',
                            'sections.sectionName AS sectionName',
                            'semesters.semesterId AS semesterId',
                            'grades.grade AS gradeName',
                            'grades.gradeId AS gradeId',
                            'class_rooms.classroomDetailId AS classroomDetailId'
                            )
                            ->groupBy('students.studentId')
                            ->get()
                            ) as  $studentDetail)
                    <tr>
                      <td>{{$studentDetail->firstName}} {{$studentDetail->lastName}}</td>
                      <td>{{$studentDetail->gradeName}}</td>
                      <td>{{$studentDetail->sectionName}}</td>
                      <td>{{$studentDetail->semesterName}}</td>
                      <td><button type="button" name="submitMarkDetailsCreation{{$studentDetail->studentId}}" class="btn btn-primary" data-toggle="modal" data-target="#submitMarkDetailsCreation{{$studentDetail->studentId}}">Add</button></td>
                      <!-- <td><button type="button" name="editDeleteMarksDetailsUpdation{{$studentDetail->studentId}}" id="editDeleteMarksDetailsUpdation{{$studentDetail->studentId}}" class="btn btn-primary" data-toggle="modal" data-target="#editDeleteMarksDetailsUpdation{{$studentDetail->studentId}}">View</button></td> -->
                    </tr>
                          </thead>
                        </table>

                    <!--
Create Marks
                   -->

                   <!--

                   For creation
                   -->
                   <div class="modal fade" id="submitMarkDetailsCreation{{$studentDetail->studentId}}" id="adminStudentStudentMarksCreation"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add marks of {{$studentDetail->firstName}} {{$studentDetail->lastName}}</h5>

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body" id="subjectsList">


                            <h2>Grade : {{$studentDetail->gradeName}}</h2>
                            <h2>Subject Name : </h2>
                            <table>
                              <thead>
                                <tr>
                                  <th>Subject Name</th>
                                  <th>Mark</th>
                                  <th>Subject Maximum Mark</th>
                                </tr>
                              </thead>
                                <tbody>
                                  <form action="{{route('createStudentSubjectMarks')}}" method="POST" name="createStudentSubjectMarks" id="createStudentSubjectMarks">
                                  {{ csrf_field() }}{{ method_field('POST')}}
                              @foreach(($studentMarks = \App\Models\studentMarks::join('subjects','subjects.subjectId','=','student_marks.subjectId')
                                                ->where('student_marks.batchId','=',$currentBatchId)
                                                ->where('student_marks.studentId','=',$studentDetail->studentId)
                                                ->where('subjects.semesterId','=',$studentDetail->semesterId)
                                                ->where('subjects.departmentId','=',$studentDetail->studentDepartmentId)
                                                ->select('subjects.subjectName AS subjectName','subjects.subjectMaxMarks as subjectMaxMarks','student_marks.marks AS marks','student_marks.student_marksId  AS student_marksId')
                                                ->get()) as  $subject)

                                                  <tr>
                                                    <td>{{$subject->subjectName}}</td>
                                                    <td><input type="hidden" name="student_marksId[]" value="{{$subject->student_marksId}}"></input>
                                                    <input type="number" name="subjectMark[]" value="{{$subject->marks}}"></input></td>
                                                    <td>{{$subject->subjectMaxMarks}}</td>
                                                  </tr>
                              @endforeach
                            </tbody>
                          </table>
                            <button class="btn btn-success btn-createStudentSubjectMarks">Submit</button>{{Form::close()}}
                                                                          </div>
                         <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         </div>

                                            </div>
                                          </div>
                                        </div>
                    @endforeach
              @else
                <h2 style="color:red;">List is empty</h2>
              @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


    <!--
Marks Creation
   -->



</x-app-layout>
