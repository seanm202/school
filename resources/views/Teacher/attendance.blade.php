<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  Create timetable for the hour
                  <table>
                    <thead>
                      <tr>
                        <th>Department</th>
                        <th>Grade</th>
                        <th>Semester</th>
                        <th>Section</th>
                        <th>Subject Name</th>
                        <th>Created</th>
                        <th>Not crated</th>
                        <th>Submit</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($classRoomsThatITeachs = \App\Models\SubjectTeacherForEachSections::
                                                  where('classRoomId','=',(\App\Models\SubjectTeacherForEachSections::where('teacherId','=',(\App\Models\teacher::where('userId','=',Auth::User()->userId)->select('teacherId')->first()))->select('classRoomId')->get()))
                                                  ->join('sections','sections.sectionId','=','class_rooms.section')
                                                  ->join('class_rooms','class_rooms.classroomDetailId','=','subject_teacher_for_each_sections.classRoomId')
                                                  ->join('grades','grades.gradeId','=','class_rooms.grade')
                                                  ->join('semesters','semesters.semesterId','class_rooms.semester')
                                                  ->join('subjects','subjects.subjectId','=','subject_teacher_for_each_sections.subjectId')
                                                  ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                                                  ->select('grades.grade AS grade',
                                                  'sections.sectionName AS sectionName',
                                                  'semesters.semesterName AS semesterName',
                                                  'departments.departmentName AS departmentName',
                                                  'subjects.subjectName AS subjectName',
                                                  'subject_teacher_for_each_sections.classRoomId AS classRoomId',
                                                  'semesters.semesterId AS semesterId',
                                                  'class_rooms.classroomDetailId AS classRoomId',
                                                  'subjects.subjectId AS subjectId',
                                                  'sections.sectionId AS sectionId',
                                                  'grades.gradeId as  gradeId',
                                                  'departments.departmentId AS departmentId'
                                                  )->get() as $classRoomsThatITeach)
                                                  <tr>
                                                    <td>{{$classRoomsThatITeach->departmentName}}</td>
                                                    <td>{{$classRoomsThatITeach->grade}}</tdh>
                                                    <td>{{$classRoomsThatITeach->semesterName}}</td>
                                                    <td>{{$classRoomsThatITeach->sectionName}}</td>
                                                    <td>{{$classRoomsThatITeach->subjectName}}</td>
                                                    {{Form::open(array('route' => 'createTeacherTimetableForTheParticularHour')) }}
                                                    {{Form::hidden('classRoomId',$classRoomsThatITeach->classRoomId)}}
                                                      {{Form::hidden('subjectId',$classRoomsThatITeach->subjectId)}}
                                                      {{Form::hidden('sectionId',$classRoomsThatITeach->sectionId)}}
                                                      {{Form::hidden('gradeId',$classRoomsThatITeach->gradeId)}}
                                                      {{Form::hidden('teacherId',(\App\Models\teacher::where('userId','=',Auth::User()->userId)->select('teacherId')->first()))}}
                                                      {{Form::hidden('departmentId',$classRoomsThatITeach->departmentId)}}
                                                      <td>
                                                        @if(count(\App\Models\studentSubjectAttendance::
                                                            where('classRoomId','=',(\App\Models\SubjectTeacherForEachSections::where('teacherId','=',$classRoomsThatITeach->classRoomId)
                                                            ->where('dayId','=',\App\Models\days::where('daysDate','=',date('Y-m-d'))->select('dayId')->first())
                                                            ->where('subjectId','=',$classRoomsThatITeach->subjectId)
                                                            ->where('hourId','=',$classRoomsThatITeach->hourId)
                                                            ->where('teacherId','=',(\App\Models\teacher::where('userId','=',Auth::User()->userId)->select('teacherId')->first()))
                                                            ->get())>0)
                                                            ))
                                                            <input type="checkbox" name="createClassAttendanceTable" value="1" checked disabled></input>
                                                        @else
                                                            <input type="checkbox" name="createClassAttendanceTable" value="1" disabled></input>
                                                        @endif
                                                      </td>
                                                      <td>
                                                      @if(count(\App\Models\studentSubjectAttendance::
                                                                where('classRoomId','=',(\App\Models\SubjectTeacherForEachSections::where('teacherId','=',$classRoomsThatITeach->classRoomId)
                                                                ->where('dayId','=',\App\Models\days::where('daysDate','=',date('Y-m-d'))->select('dayId')->first())
                                                                ->where('subjectId','=',$classRoomsThatITeach->subjectId)
                                                                ->where('hourId','=',$classRoomsThatITeach->hourId)
                                                                ->where('teacherId','=',(\App\Models\teacher::where('userId','=',Auth::User()->userId)->select('teacherId')->first()))
                                                                ->get())>0)
                                                                ))
                                                          <input type="checkbox" name="createClassAttendanceTable" value="0" disabled></input>
                                                      @else
                                                          <input type="checkbox" name="createClassAttendanceTable" value="0" checked disabled></input>
                                                      @endif</td>
                                                      <td>{{Form::submit('Create',array('class'=>'btn btn-primary'))}}</td>
                                                    {{Form::close()}}
                                                  </tr>

                    @endforeach
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                  <table>
                    <thead>
                      <tr>
                        <th>Department</th>
                        <th>Grade</th>
                        <th>Semester</th>
                        <th>Section</th>
                        <th>Subject Name</th>
                        <th>View List</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($classRoomsThatITeachs = \App\Models\SubjectTeacherForEachSections::
                                                  where('classRoomId','=',(\App\Models\SubjectTeacherForEachSections::where('teacherId','=',(\App\Models\teacher::where('userId','=',Auth::User()->userId)->select('teacherId')->first()))->select('classRoomId')->get()))
                                                  ->join('sections','sections.sectionId','=','class_rooms.section')
                                                  ->join('class_rooms','class_rooms.classroomDetailId','=','subject_teacher_for_each_sections.classRoomId')
                                                  ->join('grades','grades.gradeId','=','class_rooms.grade')
                                                  ->join('semesters','semesters.semesterId','class_rooms.semester')
                                                  ->join('subjects','subjects.subjectId','=','subject_teacher_for_each_sections.subjectId')
                                                  ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                                                  ->select('grades.grade AS grade',
                                                  'sections.sectionName AS sectionName',
                                                  'semesters.semesterName AS semesterName',
                                                  'departments.departmentName AS departmentName',
                                                  'subjects.subjectName AS subjectName',
                                                  'subject_teacher_for_each_sections.classRoomId AS classRoomId',
                                                  )->get() as $classRoomsThatITeach)
                                                  <tr>
                                                    <td>{{$classRoomsThatITeach->departmentName}}</td>
                                                    <td>{{$classRoomsThatITeach->grade}}</tdh>
                                                    <td>{{$classRoomsThatITeach->semesterName}}</td>
                                                    <td>{{$classRoomsThatITeach->sectionName}}</td>
                                                    <td>{{$classRoomsThatITeach->subjectName}}</td>
                                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#getSelectedClassStudentList{{$classRoomsThatITeach->classRoomId}}">
                                                        View
                                                      </button></td>
                                                  </tr>
                                                  <div class="modal fade" id="getSelectedClassStudentList{{$classRoomsThatITeach->classRoomId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLongTitle">Department : {{$classRoomsThatITeach->departmentName}}</h5>
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Grade : {{$classRoomsThatITeach->grade}}</h5>
                                                          <h5 class="modal-title" id="exampleModalLongTitle">Semester : {{$classRoomsThatITeach->semesterName}}</h5>
                                                          <h5 class="modal-title" id="exampleModalLongTitle">Section : {{$classRoomsThatITeach->sectionName}}</h5>
                                                          <h5 class="modal-title" id="exampleModalLongTitle">Subject : {{$classRoomsThatITeach->subjectName}}</h5>
                                                          <h5 class="modal-title" id="exampleModalLongTitle">Student List</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <table>
                                                        <thead>

                                                          <tr>
                                                            <th>Name of the student</th>
                                                              <th>Present</th>
                                                              <th>Absent</th>
                                                              <th>Submit</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                          {{Form::open(array('route' => 'submitClasswiseAttendence')) }}
                                                      @foreach(($students=\App\Models\student_subject_attendances::where('classRoomId','=',$classRoomsThatITeach->classRoomId)
                                                                                ->join('details','details.userId','=','students.studentId')
                                                                                ->join('students','students.studentId','=','student_subject_attendances.studentId')
                                                                                ->select('details.firstname AS firstName',
                                                                                'details.lastname AS lastName',
                                                                                'student_subject_attendances.studentId AS studentId',
                                                                                'student_subject_attendances.classRoomId AS classRoomId',
                                                                                'student_subject_attendances.teacherId AS teacherId',
                                                                                'student_subject_attendances.subjectId AS subjectId',
                                                                                'student_subject_attendances.dayId AS dayId',
                                                                                'student_subject_attendances.hourId AS hourId')
                                                                                ->get()) as $student)


                                                            {{Form::hidden('classRoomId',$student->classRoomId)}}
                                                            {{Form::hidden('studentId',$student->studentId)}}
                                                            {{Form::hidden('teacherId',$student->teacherId)}}
                                                            {{Form::hidden('subjectId',$student->subjectId)}}
                                                            {{Form::hidden('dayId',$user->dayId)}}
                                                            {{Form::hidden('hourId',$student->hourId)}}
                                                                <tr>
                                                                  <td>{{$student->firstName}} {{$student->lastName}}</td><input type="hidden" name="studentId[]" value='{{$student->studentId}}'></input>
                                                                  <td><input type="checkbox" name="presentOrAbsent[]" value='1'>Present</input></td>
                                                                  <td><input type="checkbox" name="presentOrAbsent[]" value='0' checked>Absent</input></td>
                                                                  </tr>
                                                      @endforeach
                                                              </tbody>
                                                            </table>
                                                            {{Form::submit('Save',array('class'=>'btn btn-primary'))}}
                                                            {{Form::close()}}
                                                                            </div>
                                                                              <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                  </div>
                                                                            </div>
                                                                          </div>
                                                                        </div>

                    @endforeach
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
