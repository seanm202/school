

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
            {{ __('Assign classes') }}
        </h2>
    </x-slot>
<!--



 -->

<!--

 -->
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Assign teachers to each class according to subject
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
                          @foreach(($classRooms=\App\Models\classRoom::
                          join('sections','sections.sectionId','=','class_rooms.section')
                          ->join('grades','grades.gradeId','=','class_rooms.grade')
                          ->select('class_rooms.classroomDetailId AS classroomDetailId',
                          'class_rooms.capacity AS Capacity',
                          'grades.grade AS grade',
                          'sections.sectionName AS sectionName')
                          ) as $classRoom)
                          <tr>
                            {{Form::open(array('route' => 'createTeacherForSubject'))}}
                            <td>{{classRoom->classroomDetailId}}></td>
                            <td>{{classRoom->grade}}</td>
                            <td>{{classRoom->sectionName}}</td>
                            <td>{{classRoom->Capacity}}</td>
                            <td>
                            <select name="departmentId">
                              <option value="0" selected>Select Department</option>
                              @foreach($departments=\App\Models\Department::all() as $department)
                                <option value="{{$department->departmentId}}" selected>{{$department->departmentName}}</option>
                              @endforeach
                            </select></td>
                            <td><select name="semesterId">
    <option value="0" selected>Select Semester</option>
   @if(count($semesters = \App\Models\semester::all())>0)
     @foreach(($semesters = \App\Models\semester::all()) as  $semester)
      <option value={{$semester->semesterId}}>{{$semester->semesterName}}</option>
     @endforeach
   @endif
   </select></td>
                            <td>
                            <select name="subjectId">
                              <option value="0" selected>Select Subject : </option>
                              @foreach($subjects=\App\Models\subject::all() as $subject)
                                <option value="{{$subjects->subjectId}}" selected>{{$subject->subjectName}}</option>
                              @endforeach
                            </select></td>
                            <td>
                            <select name="teacherId">
                              <option value="0" selected>Select Teacher</option>
                              @foreach(($teachers=\App\Models\teacher::join('details','details.userId','=','teachers.userId')
                                ->select('details.lastname AS lastName','details.firstname AS firstName','teacher.teacherId AS teacherId','teachers.userId AS teacherUserId')->get())
                                as $teacher)
                                <option value="{{$teacher->teacherId}}" selected>{{$teacher->firstName}} {{$teacher->lastName}}</option>
                              @endforeach
                            </select></td>{{Form::hidden('classroomDetailId',classRoom->classroomDetailId)}}
                            <td>  {{Form::submit('Submit',array('class'=>'btn btn-primary'))}}
                              {{Form::close()}}</td>
                          </tr>
                          @endforeach
    </thead>
         </table>


<!--



 -->
                    </div>
                </div>
            </div>
        </div>


    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        View/Edit Teachers assignments
                        <br>

                        Subjects<br>
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
                                @foreach(($SubjectTeacherForEachSections=\App\Models\SubjectTeacherForEachSections::
                                  join('sections','sections.sectionId','=','class_rooms.sectionId')
                                  ->join('grades','grades.gradeId','=','class_rooms.gradeId')
                                  ->select('class_rooms.classroomDetailId AS classroomDetailId',
                                  'class_rooms.capacity AS Capacity',
                                  'grades.grade AS grade',
                                  'sections.sectionName AS sectionName')
                                  ) as $SubjectTeacherForEachSection)
                                    <tr>
                                      {{Form::open(array('route' => 'createTeacherForSubject'))}}
                                      <td>{{SubjectTeacherForEachSection->classroomDetailId}}></td>
                                      <td>{{SubjectTeacherForEachSection->grade}}</td>
                                      <td>{{SubjectTeacherForEachSection->sectionName}}</td>
                                      <td>{{SubjectTeacherForEachSection->Capacity}}</td>
                                      <td>
                                        <select name="departmentId">
                                          @foreach($departments=\App\Models\Department::all() as $department)
                                            @if($SubjectTeacherForEachSection->departmentId==$department->departmentId)
                                              <option value="{{$department->departmentId}}" selected>{{$department->departmentName}}</option>
                                            @else
                                              <option value="{{$department->departmentId}}">{{$department->departmentName}}</option>
                                            @endif
                                          @endforeach
                                        </select></td>
                                <td><select name="semesterId">
                                  <option value="0" selected>Select Semester : </option>
                                  @foreach(($semesters = \App\Models\semester::all()) as  $semester)
                                    @if($SubjectTeacherForEachSection->semesterId==$semester->semesterId)
                                      <option value="{{$semester->semesterId}}" selected>{{$semester->semesterName}}</option>
                                    @else
                                      <option value={{$semester->semesterId}}>{{$semester->semesterName}}</option>
                                    @endif
                                  @endforeach
                                </select></td>
                                <td>
                                <select name="subjectId">
                                  @foreach($subjects=\App\Models\subject::all() as $subject)
                                    @if($SubjectTeacherForEachSection->subjectId==$subject->subjectId)
                                      <option value="{{$subject->subjectId}}" selected>{{$subject->subjectName}}</option>
                                    @else
                                      <option value={{$subject->subjectId}}>{{$subject->subjectName}}</option>
                                    @endif
                                  @endforeach
                                </select></td>
                                <td>
                                <select name="teacherId">
                                  @foreach(($teachers=\App\Models\teacher::join('details','details.userId','=','teachers.userId')
                                    ->select('details.lastname AS lastName','details.firstname AS firstName','teacher.teacherId AS teacherId')->get())
                                    as $teacher)
                                     @if($SubjectTeacherForEachSection->teacherId==$teacher->teacherId)
                                      <option value="{{$teacher->teacherId}}" selected>{{$teacher->firstName}} {{$teacher->lastName}}</option>
                                     @else
                                      <option value="{{$teacher->teacherId}}">{{$teacher->firstName}} {{$teacher->lastName}}</option>
                                     @endif
                                  @endforeach
                                </select></td>{{Form::hidden('classroomDetailId',SubjectTeacherForEachSection->classroomDetailId)}}
                                <td>  {{Form::submit('Update',array('class'=>'btn btn-primary'))}}
                                  {{Form::close()}}</td>
                              </tr>
                              @endforeach
          </thead>
             </table>
                    </div>
                </div>
            </div>
        </div>
        <!--

       -->

</x-app-layout>
