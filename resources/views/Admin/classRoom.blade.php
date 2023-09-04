<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Class Room') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  View Classroom details<br>

@if ($errors->any())
   <div class="alert alert-danger">
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif
                    @if(count(($classRooms=\App\Models\classRoom::join('grades','grades.gradeId','=','class_rooms.grade')
                                          ->join('sections','sections.sectionId','=','class_rooms.section')
                                          ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                                          ->join('semesters','semesters.semesterId','=','class_rooms.semester')
                                          ->join('teachers','teachers.teacherId','=','class_rooms.classTeacher')
                                          ->join('details','details.userId','=','teachers.userId')
                                          ->select('grades.grade AS grade',
                                          'sections.sectionName AS sectionName',
                                          'departments.departmentName AS departmentName',
                                          'semesters.semesterName as semesterName',
                                          'details.firstname AS firstName',
                                          'details.lastname AS lastName',
                                          'class_rooms.capacity AS capacity',
                                          'class_rooms.roomNo AS roomNo',
                                          'class_rooms.description AS description',
                                          'class_rooms.classTimeTableId AS classTimeTableId','class_rooms.classroomDetailId AS classroomDetailId'
                                          )
                                          )->get())>0)
                        <table>
                          <thead>
                           <tr>
                            <th>Grade</th>
                            <th>Room No</th>
                            <th>Section</th>
                            <th>Department</th>
                            <th>Semester</th>
                            <th>Class Teacher</th>
                            <th>Class Teacher Subject</th>
                            <th>Description</th>
                            <th>Capacity</th>
                            <th>View Class TimeTable</th>
                            <th>Update Class Room</th>
                            <th>Delete Class Room</th>
                           </tr>
                          </thead>
                        @foreach(($classRooms=\App\Models\classRoom::join('grades','grades.gradeId','=','class_rooms.grade')
                                              ->join('sections','sections.sectionId','=','class_rooms.section')
                                              ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                                              ->join('semesters','semesters.semesterId','=','class_rooms.semester')
                                              ->join('details','details.userId','=','teachers.userId')
                                              ->join('teachers','users.teacherId','=','class_rooms.classTeacher')
                                              ->select('grades.grade AS grade',
                                              'sections.sectionName AS sectionName',
                                              'departments.departmentName AS departmentName',
                                              'semesters.semesterName as semesterName',
                                              'details.firstname AS firstName',
                                              'details.lastname AS lastName',
                                              'class_rooms.capacity AS capacity',
                                              'class_rooms.roomNo AS roomNo',
                                              'class_rooms.description AS description',
                                              'class_rooms.classTimeTableId AS classTimeTableId',
                                              'class_rooms.classroomDetailId AS classroomDetailId'
                                              )
                                              )->get() as $classRoom)
                        {{Form::open(array('route' => 'updateClassRoom')) }}
                            <tr>
                              <td>{{$classRoom->grade}} </td>
                              <td>{{$classRoom->roomNo}} </td>
                              <td>{{$classRoom->section}} </td>
                              <td>{{$classRoom->departmentId}} </td>
                              <td>{{$classRoom->semesterName}} </td>
                              <td><select name="teacherId">
                                @foreach(($teachers=\App\Models\teacher::all()) as $teacher)
                                  @if($classRoom->classTeacher==$teacher->teacherId)
                                    <option value="{{$teacher->teacherId}}" selected>{{$teacher->teacherName}}</option>
                                  @else
                                    <option value="{{$teacher->teacherId}}">{{$teacher->teacherName}}</option>
                                  @endif
                                @endforeach</td>
                              <td>{{$classRoom->classTeacherSubject}} </td>
                              <td>{{$classRoom->description}} </td>
                              <td>{{$classRoom->capacity}} </td>
                              <td>{{$classRoom->classTimeTableId}}</td>
                              <td>
                              {{Form::hidden('classroomId',$classRoom->classroomDetailId)}}
                              {{Form::submit('Update')}}
                              {{ Form::close()}}</td>
                              <td>{{Form::open(array('route' => 'deleteClassRoom')) }}
                              {{Form::hidden('classroomId',$classRoom->classroomDetailId)}}
                              {{Form::submit('Delete')}}
                              {{ Form::close()}}</td>
                              </tr>
                        @endforeach
                       </table>
                      @else
                        List is empty
                      @endif

                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  Create classroom
                  {{Form::open(array('route' => 'createClassRoom')) }}
                  {{Form::label('grade','Grade ')}}
                  <select name="grade">
                    @if(count($grades = \App\Models\grade::all())>0)
                      @foreach($grades as $grade)
                        <option value="$grade->gradeId">{{$grade->grade}}</option>
                        @endforeach
                    @endif
                  </select>
                  <br>
                  {{Form::label('roomnO','Room Number ')}}
                  {{Form::text('roomNo',null,array('placeholder'=>'Enter Room Number'))}}
                  <br>
                  {{Form::label('sectionName','Section Name ')}}
                  <select name="section">
                    @if(count($sections = \App\Models\section::all())>0)
                      @foreach($sections as $section)
                        <option value="$section->sectionId">{{$section->sectionName}}</option>
                      @endforeach
                    @endif
                  </select>
                  <br>
                  {{Form::label('classTeacher','Class Teacher')}}
                  <select name="classTeacher">
                    @if(count($teachers = \App\Models\teacher::all())>0)
                      @foreach($teachers as $teacher)
                        <option value="$teacher->teacherId">{{$teacher->$teacherName}}</option>
                      @endforeach
                    @endif
                  </select>
                  <br>
                  {{Form::label('classTeacherSubject','Class Teacher Subject')}}
                  <select name="classTeacherSubject">
                    @if(count($subjects = \App\Models\subject::all())>0)
                      @foreach($subjects as $subject)
                        <option value="$subject->subjectId">{{$subject->subjectName}}</option>
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
                        <option value="$classTimeTable->classTimeTableId">{{$classTimeTable->classTimeTableName}}</option>
                      @endforeach
                    </select>
                  @endisset
                  <br>
                  {{Form::submit('Create Classroom');}}
                  {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
