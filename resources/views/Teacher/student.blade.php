<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

<!--




 -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <h2>Add student Marks</h2>
                  <table>
                    <thead>
                      <tr>
                        <th>Name : </th>
                        <th>Grade : </th>
                        <th>Section : </th>
                        <th>Semester : </th>
                        <th>Add Marks : </th>
                        <th>View Details</th>
                      </tr>
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
                   <div class="modal fade" id="submitMarkDetailsCreation{{$studentDetail->studentId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                               <div class="modal fade" id="submitMarkDetailsUpdation{{$studentDetail->studentId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                                              </div>
                                                                  @endforeach

                                                                                                                    </div>
                                                                                                                  </div>
                                                                                                                </div>
                                                                                                              </div>

                @endforeach
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
