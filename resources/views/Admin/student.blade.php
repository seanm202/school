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
            {{ __('Students') }}
        </h2>
    </x-slot>
    <div class="py-12" id="adminStudentAddStudent">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  Add Students
                  {{Form::open(array('route' => 'addStudentAdmin')) }}
                    <table>
                  <thead>

                    <tr>
                      <th>first Name</th>
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
                    <td>{{Form::text('phone',NULL,array('placeholder'=>'Enter Phone Number'))}} </td></tr>{{Form::hidden('password',(\App\Models\ConstantController::where('constantName','defaultPassword')->select('constantValue')->first()))}}
                      <tr>
                      <th>Age</th>
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
                    </thead>
                  </table>
                  {{Form::submit('Save',array('class'=>'btn btn-primary'))}}

                                        {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
<!--
Add students to class_rooms

 -->
 <div class="py-12" id="adminStudentAssignStudent">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
               <h2>Assign classroom to students</h2>

    @if(count($studentSelecteds = \App\Models\User::where('role','=',4)
                           ->join('students','students.userId','=','users.userId')
                           ->join('details','details.detailId','=','students.studentDetailsId')
                           ->select('details.firstname AS firstName','details.lastname AS lastName','users.email AS email','users.phone AS phone','students.studentId AS studentId','students.studentGrade AS studentGrade','students.studentSection AS studentSection','students.studentClassroom AS studentClassroom')
                           ->get())>0)

           @foreach(($studentSelecteds = \App\Models\User::where('role','=',4)
                            ->join('students','students.userId','=','users.userId')
                            ->join('details','details.detailId','=','students.studentDetailsId')
                            ->select('details.firstname AS firstName','details.lastname AS lastName','users.email AS email','users.phone AS phone','students.studentId AS studentId','students.studentGrade AS studentGrade','students.studentSection AS studentSection','students.studentClassroom AS studentClassroom')
                            ->get()) as  $student)

                            <table>
                              <tr>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Phone</th>
                                  <th>View classes</th>
                                  <th>Edit</th>
                                </tr>
<tr>
                   <td>{{$student->firstName}} {{$student->lastName}}</td>
                   <td>{{$student->email}}</td>
                   <td>{{$student->phone}}</td>
                   <td><button type="button" id="selectcClassroom" class="btn btn-primary" data-toggle="modal" data-target="#selectClassroom{{$student->studentId}}">View</button></td>
                   <td><button type="button" id="changeSClassroom" class="btn btn-primary" data-toggle="modal" data-target="#changeClassroom{{$student->studentId}}">Edit</button></td>
                 </tr>
               </table>
                 <div class="modal fade" id="selectClassroom{{$student->studentId}} adminStudentAssignStudentModalSelect" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Select classroom</h5>
                                    <h5 class="modal-title" id="exampleModalLongTitle">Name : {{$student->firstName}} {{$student->lastName}}</h5>
                                      <h5 class="modal-title" id="exampleModalLongTitle">Email : {{$student->email}}</h5>
                                    <h5 class="modal-title" id="exampleModalLongTitle">Phone : {{$student->phone}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                @if(count($classRooms = \App\Models\classRoom::all())>0)
                                  @foreach(($classRooms = \App\Models\classRoom::join('grades','grades.gradeId','=','class_rooms.grade')
                                                        ->join('teachers','teachers.teacherId','=','class_rooms.classTeacher')
                                                        ->join('sections','sections.sectionId','=','class_rooms.section')
                                                        ->join('details','details.userId','=','teachers.userId')
                                                        ->select('grades.grade AS grade','details.firstname AS firstName','details.lastname AS lastName','sections.sectionName AS sectionName')
                                                        )->get() as  $classRoom)
                                      <table>

                                      <tr>
                                        <th>Classroom Id</th>
                                          <td>{{$classRoom->classroomDetailId}}</td></tr>
                                        <tr><th>Grade</th>
                                        <td>{{$classRoom->grade}}</td></tr>
					                                   <tr><th>Section</th>
                                             <td>{{$classRoom->section}}</td></tr>
					                                        <tr><th>Class Teacher</th>
                                                  <td>{{$classRoom->firstName}} {{$classRoom->lastName}}</td></tr>
						                                            <tr><th>Capacity</th>
                                                        <td>{{$classRoom->capacity}}</td></tr>
						                                                  <tr><th>Select</th>
                                                              <td>{{Form::open(array('route' => 'selectClassRoomForStudent')) }}
                                                                {{Form::hidden('classroomDetailId',$classRoom->classroomDetailId)}}
                                                                {{Form::hidden('studentId',$student->studentId)}}
                                                                {{Form::hidden('studentGrade',$student->studentGrade)}}
                                                                {{Form::hidden('studentSection',$student->studentSection)}}
                                                                {{Form::submit('Select',array('class'=>'btn btn-primary'))}}
                                                                {{Form::close()}}</td></tr>
                                                                @endforeach

							                                                            </thead>
                                                        </table>
                              @else
                                 <h2 style="color:red;size:5px;">Add classrooms</h2>
                              @endif

                                                      </div>


                                                      </div>
                                                    </div>
                                                  </div>

                                                  <!--


                                                Classroom Updation

                                               -->
                            <div class="modal fade" id="changeClassroom{{$student->studentId}} adminStudentAssignStudentModalChange" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Change Classroom</h5>
                                    <h5 class="modal-title" id="exampleModalLongTitle">Name : {{$student->firstName}} {{$student->lastName}}</h5>
                                      <h5 class="modal-title" id="exampleModalLongTitle">Email : {{$student->email}}</h5>
                                    <h5 class="modal-title" id="exampleModalLongTitle">Phone : {{$student->phone}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                  @if(count($studentClassroomDetails = \App\Models\classRoom::join('teachers','teachers.teacherId','class_rooms.classTeacher')
                                                                    ->join('grades','grades.gradeId','=','class_rooms.grade')
                                                                    ->join('users','users.userId','=','teachers.userId')
                                                                    ->join('sections','sections.sectionId','=','class_rooms.section')
                                                                    ->join('details','details.userId','=','teachers.userId')
                                                                    ->select('class_rooms.classroomDetailId AS classroomDetailId','class_rooms.roomNo AS roomNo','details.firstname AS firstName','details.lastname AS lastName','grades.grade AS grade','sections.sectionName AS sectionName','class_rooms.capacity AS capacity')
                                                                    ->where('classroomDetailId','=',$student->studentClassroom)
                                                                                                    ->get())>0)
                                    <table>
                                    @foreach($studentClassroomDetails = \App\Models\classRoom::where('classroomDetailId','=',$student->studentClassroom)
                                                                      ->join('teachers','teachers.teacherId','class_rooms.classTeacher')
                                                                      ->join('grades','grades.gradeId','=','class_rooms.grade')
                                                                      ->join('users','users.userId','=','teachers.userId')
                                                                      ->join('sections','sections.sectionId','=','class_rooms.section')
                                                                      ->select('class_rooms.classroomDetailId AS classroomDetailId','class_rooms.roomNo AS roomNo','details.firstname AS firstName','details.lastname AS lastName','grades.grade AS grade','sections.sectionName AS sectionName','class_rooms.capacity AS capacity')
                                                                      as $studentClassroomDetail)

                                                                          <tr>
                                        <th>Classroom Id</th>
                                        <td>{{$studentClassroomDetail->classroomDetailId}}</td>
                                      </tr>
                                        <tr>
                                          <th>Room No</th>
                                          <td>{{$studentClassroomDetail->roomNo}}</td>
                                        </tr>
                                        <tr>
                                          <th>Grade</th>
                                          <td>{{$studentClassroomDetail->grade}}</td>
                                        </tr>
                                          <tr>
                                            <th>Section</th>
                                            <td>{{$studentClassroomDetail->sectionName}}</td>
                                          </tr>
                                            <tr>
                                              <th>Class Teacher</th>
                                              <td>{{$studentClassroomDetail->firstName}} {{$studentClassroomDetail->lastName}}</td>
                                            </tr>
                                              <tr>
                                                <th>Capacity</th>
                                                <td>{{$studentClassroomDetail->capacity}}</td>
                                              </tr>
                                  @endforeach
                                </table>
                        @else
                            <h2 style="color:red;">Classroom not selected</h2>
                        @endif

<!--

Update classroom for students

 -->

                        <table><tr>
                      <th>Classroom Id</th>
                                  <th>Grade</th>
                                    <th>Section</th>
                                      <th>Class Teacher</th>
                                        <th>Capacity</th>
                                        <th>Department</th>
                                        <th>Semester</th>
                       <th>Select</th></tr>
                            @foreach(($classRooms = \App\Models\classRoom::all()) as  $classRoom)
                              <tr>
                                <td>{{$classRoom->classroomDetailId}}</td>
                                <td>{{$classRoom->grade}}</td>
                                <td>{{$classRoom->section}}</td>
                                <td>{{$classRoom->classTeacher}}</td>
                                <td>{{$classRoom->capacity}}</td>
                                <td><select name="studentDepartmentId">
                                @foreach(($departments= \App\Models\Department::all()) as $department)
                                  <option value="{{$department->departmentId}}">{{$department->departmentName}}</option>
                                @endforeach
                                </select></td>
                                <td><select name="studentSemester">
                                @foreach(($semesters= \App\Models\semester::all()) as $semester)
                                  <option value="{{$semester->semesterId}}">{{$semester->semesterName}}</option>
                                @endforeach
                                </select></td>
                                <td>{{Form::open(array('route' => 'updateClassRoomForStudent')) }}
                                  {{Form::hidden('classroomDetailId',$classRoom->classroomDetailId)}}
                                  {{Form::hidden('studentId',$student->studentId)}}
                                  {{Form::hidden('studentGrade',$student->studentGrade)}}
                                  {{Form::hidden('studentSection',$student->studentSection)}}
                                  {{Form::submit('Select',array('class'=>'btn btn-primary'))}}
                                  {{Form::close()}}</td>
                                </tr>
                           @endforeach

                                   </table>


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




 -->

    <div class="py-12" id="adminStudentAddStudentMarks">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <h2>Add student Marks</h2>
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
            @if(count(($studentDetails = \App\Models\student::
                          join('details','details.detailId','=','students.studentDetailsId')
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
              @foreach((($studentDetails = \App\Models\student::
                            join('details','details.detailId','=','students.studentDetailsId')
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
                            )) as  $studentDetail)
                    <tr>
                      <td>{{$studentDetail->firstName}} {{$studentDetail->lastName}}</td>
                      <td>Grade : {{$studentDetail->gradeName}}</td>
                      <td>Section :  {{$studentDetail->sectionName}}</td>
                      <td>{{$studentDetail->semesterName}}</td>
                      <td><button type="button" name="submitMarkDetailsCreation{{$studentDetail->studentId}}" id="submitMarkDetailsCreation{{$studentDetail->studentId}}" class="btn btn-primary" data-toggle="modal" data-target="#submitMarkDetailsCreation{{$studentDetail->studentId}}">Add</button></td>
                      <td><button type="button" name="editDeleteMarksDetailsUpdation{{$studentDetail->studentId}}" id="editDeleteMarksDetailsUpdation{{$studentDetail->studentId}}" class="btn btn-primary" data-toggle="modal" data-target="#editDeleteMarksDetailsUpdation{{$studentDetail->studentId}}">Update</button></td>
                    </tr>

                    <!--
Create Marks
                   -->

                   <!--

                   For creation
                   -->
                   <div class="modal fade" id="submitMarkDetailsCreation{{$studentDetail->studentId}} adminStudentStudentMarksCreation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add marks of {{$studentDetail->firstName}} {{$studentDetail->lastName}}</h5>

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body" id="subjectsList">

                                                       {{Form::open(array('route' => 'createStudentMarks')) }}

                            @foreach(($grades = \App\Models\grade::all()) as  $grade)
                             @if($grade->gradeId==$studentDetail->subjectGrade)
                              <option value="{{$grade->gradeId}}" selected>{{$grade->grade}}</option>
                             @else
                              <option value="{{$grade->gradeId}}">{{$grade->grade}}</option>
                             @endif
                            @endforeach
                          </select><h2>Subject Name : </h2>
                          <select name="subjectId">
                              <option value="0">Select subject</option>
                              @foreach(($subjects = \App\Models\subject::all()) as  $subject)
                                  <option value="{{$subject->subjectId}}">{{$subject->subjectName}}</option>
                              @endforeach
                            </select>
                            <input type="hidden" name="departmentId" value="{{$studentDetail->studentDepartmentId}}"></input>
                            <input type="hidden" name="departmentId" value="{{$studentDetail->semesterId}}"></input>

                         <br>
                         <h2>Subject Marks : </h2>
                          {{Form::number('subjectMarks',NULL,array('placeholder'=>'Subject Maximum Marks'))}}<br>
                        <h2>Update Subject : </h2>{{Form::submit('Save',array('class'=>'btn btn-primary'))}}<br>
                            {{Form::close()}}<br>
                         <h2>Delete</h2>
                          {{Form::open(array('route' => 'deleteStudentMarks')) }}
                          {{Form::hidden('studentId',$studentDetail->studentId)}}
                          {{Form::submit('Delete',array('class'=>'btn btn-primary'))}}
                            {{Form::close()}}<br>
                         <hr><hr>
                         <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                         </div>

                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                  </div>


                                                                  <!--


                                                                Updation
                                                               -->
                                                               <div class="modal fade" id="submitMarkDetailsUpdation{{$studentDetail->studentId}} adminStudentStudentMarksUpdation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                                                          <div class="modal-dialog" role="document">
                                                                                            <div class="modal-content">
                                                                                              <div class="modal-header">
                                                                                                <h5 class="modal-title" id="exampleModalLongTitle">Subject List</h5>

                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                  <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                              </div>
                                                                                              <div class="modal-body" id="subjectsList">

                                                                  @foreach(($studentMarksDetailss = \App\Models\studentMarks::where('studentSemester','=',$studentDetail->studentSemester)
                                                                                 ->where('gradeId','=',$studentDetail->gradeId)
                                                                                 ->where('studentId','=',$studentDetail->studentId)
                                                                                 ->get()) as  $studentMarksDetails)
                                                                                  <select name="gradeId" >
                                                                      @foreach(($grades = \App\Models\grade::all()) as  $grade)
                                                                        {{Form::open(array('route' => 'updateStudentMarks')) }}
                                                                         @if($grade->gradeId==$studentMarksDetails->subjectGrade)
                                                                          <option value="{{$grade->gradeId}}" selected>{{$grade->grade}}</option>
                                                                         @else
                                                                          <option value="{{$grade->gradeId}}">{{$grade->grade}}</option>
                                                                         @endif
                                                                      @endforeach
                                                                        </select>
                                                                        <h2>Subject Name : </h2>
                                                                        <select name="subjectId">
                                                                            <option value="0">Select subject</option>
                                                                            @foreach(($subjects = \App\Models\subject::all()) as  $subject)
                                                                              @if($subject->subjectId==$studentMarksDetails->subjectId)
                                                                                <option value="{{$subject->subjectId}}">{{$subject->subjectName}}</option>
                                                                              @else
                                                                                <option value="{{$grade->gradeId}}">{{$grade->grade}}</option>
                                                                              @endif
                                                                            @endforeach
                                                                              </select>
                                                                              <input type="hidden" name="departmentId" value="{{$studentMarksDetails->studentDepartmentId}}"></input>
                                                                              <input type="hidden" name="departmentId" value="{{$studentMarksDetails->studentSemester}}"></input>

                                                                              <br>
                                                                              <h2>Subject Marks : </h2>
                                                                              {{Form::number('subjectMaxMarks',$studentMarksDetails->marks,array('placeholder'=>'Subject Maximum Marks'))}}<br>
                                                                              <h2>Update Subject : </h2>{{Form::submit('Save',array('class'=>'btn btn-primary'))}}<br>
                                                                              {{Form::close()}}<br>
                                                                              <h2>Delete</h2>
                                                                              {{Form::open(array('route' => 'deleteStudentMarks')) }}
                                                                              {{Form::hidden('student_marksId',$studentMarksDetails->student_marksId)}}
                                                                              {{Form::submit('Delete',array('class'=>'btn btn-primary'))}}
                                                                              {{Form::close()}}<br>
                                                                              <hr><hr>
                                                                              <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cloase</button>

                                                                              </div>
                                                          @endforeach

                                                                                                                    </div>
                                                                                                                  </div>
                                                                                                                </div>
                                                                                                              </div>

                @endforeach
              @else
                List is empty
              @endif
                    </thead>
                  </table>
                </div>
            </div>
        </div>
    </div>

    <!--
Marks Creation
   -->



</x-app-layout>
