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
            {{ __('Students') }} @if ($errors->any())
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

Add students
 -->

 <script type="text/javascript">

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

     $(".btn-submit").click(function(e){

         e.preventDefault();

         var form = $("#formIdNow");

         $.ajax({
            type:'POST',
            url:"{{route('addStudentTeacher')}}",
            data:form.serialize(),
            success: function(response){
      alert("jjjj");
            }
         });

     });


 </script>
 <div class="py-12" id="teacherStudentAddStudent">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
               Add Students

        @if(Session::has('success'))
        <div class="alert alert-success" style="position: fixed;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif

               <form action="{{route('addStudentTeacher')}}" method="POST" name="formIdNow" id="formIdNow">
              {{ csrf_field() }}{{ method_field('POST') }}
                 <table>
               <thead>

                 <tr>
                   <th>First Name</th>
                 <td>{{Form::text('firstName',NULL,array('placeholder'=>'Enter first name','id'=>'firstName'))}} </td>
                 </tr>
                 <tr>
                   <th>Last name</th>
                 <td>{{Form::text('lastName',NULL,array('placeholder'=>'Enter last name','id'=>'lastName'))}} </td></tr>
                 <tr>
                   <th>Email</th>
                 <td>{{Form::text('email',NULL,array('placeholder'=>'Enter Email Id','id'=>'email'))}} </td></tr>
                 <tr>
                   <th>Phone</th>
                 <td>{{Form::text('phone',NULL,array('placeholder'=>'Enter Phone Number','id'=>'phone'))}} </td></tr>{{Form::hidden('password',"abcd1234")}}
                   <tr>
                   <th>Age</th>
                 <td>{{Form::text('age',NULL,array('placeholder'=>'Enter age','id'=>'age'))}}</td></tr>
                   <tr>
                   <th>Date of birth</th>
                 <td>{{Form::date('dob',NULL,array('placeholder'=>'Enter date of birth','id'=>'dob'))}}</td></tr>
                   <tr>
                     <th>Contact Number</th>
                     <td>{{Form::text('contactNumber',NULL,array('placeholder'=>'Enter contact Number','id'=>'contactNumber'))}}</td></tr>
                     <tr>
                       <th>Alternate Contact Number</th>
                       <td>{{Form::text('alternateContactNumber',NULL,array('placeholder'=>'Enter Alternate Contact Number','id'=>'alternateContactNumber'))}}</td></tr>
                 <tr>
                     <th>Address</th>
                     <td>{{Form::text('address',NULL,array('placeholder'=>'Enter Address','id'=>'address'))}}</td>
                   </tr>
                   <tr>
                     <th>Blood Group</th>
                     <td>{{Form::text('bloodGroup',NULL,array('placeholder'=>'Enter bloodGroup','id'=>'bloodGroup'))}}</td></tr>
               <tr>
                 <th>Identification Mark</th>
                 <td>{{Form::text('identificationMark',NULL,array('placeholder'=>'Enter Identification Mark','id'=>'identificationMark'))}}</td></tr>
           <tr>
             <th>Parent Number</th>
             <td>{{Form::text('parentNumber',NULL,array('placeholder'=>'Enter Parent Number','id'=>'parentNumber'))}}</td></tr>
       <tr>
         <th>Home Phone Number</th>
         <td>{{Form::text('homePhoneNumber',NULL,array('placeholder'=>'Home Phone Number','id'=>'homePhoneNumber'))}}</td></tr>
   <tr>
     <th>Father/Spouse Name</th>
     <td>{{Form::text('fatherSpouseName',NULL,array('placeholder'=>'Enter Father/Spouse Name','id'=>'fatherSpouseName'))}}</td></tr>
<tr>
  <th>Mother Name</th>
  <td>{{Form::text('motherName',NULL,array('placeholder'=>'Enter Mother Name','id'=>'motherName'))}}</td></tr>
<tr>
  <th>Guardian Name</th>
  <td>{{Form::text('guardianName',NULL,array('placeholder'=>'Enter Guardian Name','id'=>'guardianName'))}}</td></tr>
  <tr>
      <th>Status</th>
      <td><select name="statusId">
        @foreach($statuses=\App\Models\Status::where('statusForRoles','=',3) as $status)
        {{$status->statusName}}
      @endforeach
    </select>
      </td>
    </tr>
                 </thead>
               </table>
               <!-- {{Form::submit('Save',array('class'=>'btn btn-primary'))}} -->
<button class="btn btn-success btn-submit">Submit</button>
                                     {{Form::close()}}
             </div>
         </div>
     </div>
 </div>

<!--
Edit student details
 -->

 <div class="py-12" id="teacherStudentAddStudent">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
               Edit student details

             </div>
         </div>
     </div>
 </div>

<!--
Edit student details
 -->

  <script type="text/javascript">

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $(".updateMarksTeacher").click(function(e){

          e.preventDefault();

          var form = $("#updateMarksTeacher");

          $.ajax({
             type:'POST',
             url:"{{ route('updateMarksTeacher') }}",
             data:form.serialize(),
             success: function(response){
       alert("jjjj");
             }
          });

      });


  </script>

     <div class="py-12" id="teacherStudentAddStudentMarks">
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
                                 ->join('subject_teacher_for_each_sections','subject_teacher_for_each_sections.classRoomId','=','class_rooms.classroomDetailId')
                                 ->join('teachers','teachers.teacherId','=','subject_teacher_for_each_sections.teacherId')
                                 ->where('teachers.teacherId','=',(\App\Models\teacher::where('teachers.userId','=',Auth::user()->userId)->select('teacherId')->first())->teacherId)
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
                             ->join('subject_teacher_for_each_sections','subject_teacher_for_each_sections.classRoomId','=','class_rooms.classroomDetailId')
                             ->join('teachers','teachers.teacherId','=','subject_teacher_for_each_sections.teacherId')
                             ->where('teachers.teacherId','=',(\App\Models\teacher::where('teachers.userId','=',Auth::user()->userId)->select('teacherId')->first())->teacherId)
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
                             'teachers.teacherId AS teacherId',
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


                             <table>
                               <thead>
                                 <tr>
                                   <th>Subject Name</th>
                                   <th>Mark</th>
                                   <th>Subject Maximum Mark</th>
                                 </tr>
                               </thead>
                                 <tbody>
                                   <form action="{{route('updateMarksTeacher')}}" method="POST" name="updateMarksTeacher" id="updateMarksTeacher">
                                   {{ csrf_field() }}{{ method_field('POST')}}
                               @foreach(($studentMarks = \App\Models\studentMarks::join('subjects','subjects.subjectId','=','student_marks.subjectId')
                                                 ->join('subject_teacher_for_each_sections','subject_teacher_for_each_sections.classRoomId','=','student_marks.classRoomId')
                                                 ->join('teachers','teachers.teacherId','=','subject_teacher_for_each_sections.teacherId')
                                                 ->where('teachers.teacherId','=',$studentDetail->teacherId)
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
                             <button class="btn btn-success btn-updateMarksTeacher">Submit</button>{{Form::close()}}
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


    <!--
Marks Creation
   -->



</x-app-layout>
