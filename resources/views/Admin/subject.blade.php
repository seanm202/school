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
          <button class="btn btn-primary" id="menu-toggle" style="position:fixed;">Toggle Menu</button>     {{ __('Subjects') }}   @if(Session::has('success'))
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
          <a href="#createSubject" class="list-group-item list-group-item-action bg-light">Add Subjects</a>
          <a href="#updateSubject" class="list-group-item list-group-item-action bg-light">Update Subjects</a>
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

     $(".createSubject").click(function(e){

         e.preventDefault();

         var form = $("#createSubject");

         $.ajax({
            type:'POST',
            url:"{{ route('createSubject') }}",
            data:form.serialize(),
            success: function(response){
      alert("jjjj");
            }
         });

     });


 </script>

    <div class="py-12" id="createSubject">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Add Subject
                        <br>

 <form action="{{route('createSubject')}}" method="POST" name="createSubject" id="createSubject">
 {{ csrf_field() }}{{ method_field('POST') }}

   <table>
 <thead>
<tr>
<th>Grade : </th>
<td><select name="subjectGrade">
    <option value="0" selected>Select Grade : </option>
@if(count($grades = \App\Models\grade::where('grades.batchId','=',$currentBatchId)->get())>0)
 @foreach(($grades = \App\Models\grade::where('grades.batchId','=',$currentBatchId)->get()) as  $grade)
     <option value={{$grade->gradeId}}>{{$grade->grade}}</option>
 @endforeach
@endif
</select></td></tr>
   <tr>
<th>Department : </th>
<td><select name="departmentId">
    <option value="0" selected>Select Department : </option>
@if(count($departments = \App\Models\Department::where('departments.batchId','=',$currentBatchId)->get())>0)
 @foreach(($departments = \App\Models\Department::where('departments.batchId','=',$currentBatchId)->get()) as  $department)
    <option value={{$department->departmentId}}>{{$department->departmentName}}</option>
 @endforeach
@endif
</select></td></tr>

         <tr>
     <th>Semester : </th>
   <td><select name="semesterId">
      <option value="0" selected>Select Semester : </option>
     @if(count($semesters = \App\Models\semester::where('semesters.batchId','=',$currentBatchId)->get())>0)
       @foreach(($semesters = \App\Models\semester::where('semesters.batchId','=',$currentBatchId)->get()) as  $semester)
        <option value={{$semester->semesterId}}>{{$semester->semesterName}}</option>
       @endforeach
     @endif
     </select></td></tr>
   <tr>
       <th>Subject Name : </th>
       <td>{{Form::text('subjectName',NULL,array('placeholder'=>'Enter Subject Name '))}}</td></tr>
       <tr>
         <th>Subject Maximum Marks : </th>
         <td>{{Form::number('subjectMaxMarks',NULL,array('placeholder'=>'Subject Maximum Marks'))}}</td></tr>
         <tr>
           <th>Subject Text Name : </th>
           <td>{{Form::text('subjectTextName',NULL,array('placeholder'=>'Textbook Name'))}}</td></tr>
           <tr>
             <th>Submit</th>
             <td><button class="btn btn-success btn-createSubject">Submit</button></td></tr>


           {{Form::close()}}

         </thead>
         </table>


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

            $(".updateSubject").click(function(e){

                e.preventDefault();

                var form = $("#updateSubject");

                $.ajax({
                   type:'POST',
                   url:"{{ route('updateSubject') }}",
                   data:form.serialize(),
                   success: function(response){
             alert("jjjj");
                   }
                });

            });


        </script>
                <script type="text/javascript">

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $(".deleteSubject").click(function(e){

                        e.preventDefault();

                        var form = $("#deleteSubject");

                        $.ajax({
                           type:'POST',
                           url:"{{ route('deleteSubject') }}",
                           data:form.serialize(),
                           success: function(response){
                     alert("jjjj");
                           }
                        });

                    });


                </script>

    <div class="py-12" id="updateSubject">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        View/Edit Subjects
                        <br>

                        Subjects<br>
              @if(count($subjects = \App\Models\subject::where('subjects.batchId','=',$currentBatchId)->get())>0)
                <table>
                  <thead>
                    <tr>
                      <th>Grade : </th>
                      <th>Department : </th>
                      <th>Semester : </th>
                      <th>View List</th>
                    </tr>
                  @foreach(($subjects = \App\Models\subject::where('subjects.batchId','=',$currentBatchId)->join('semesters','semesters.semesterId','=','subjects.semesterId')
                    ->join('grades','grades.gradeId','=','subjects.subjectGrade')
                    ->join('departments','departments.departmentId','=','subjects.departmentId')
                    ->orderBy('gradeId','DESC')
                    ->orderBy('semesters.semesterId','ASC')
                    ->groupBy('departmentId')
                    ->select('semesters.semesterId AS semesterId',
                    'semesters.semesterName AS semesterName',
                    'departments.departmentId AS departmentId',
                    'departments.departmentName as departmentName',
                    'grades.gradeId AS gradeId',
                    'grades.grade AS gradeName',
                    'subjects.subjectId AS subjectId',
                    'subjects.subjectName AS subjectName',
                    'subjects.subjectMaxMarks AS subjectMaxMarks',
                    'subjects.subjectTextName AS subjectTextName'
                    )->get()) as  $subject)

                         <tr style="padding:5px;padding-left:20px;padding-right:20px;">
                          <td style="padding:5px;padding-left:20px;padding-right:20px;">{{$subject->gradeName}}
                          </td>
                            <td style="padding:5px;padding-left:20px;padding-right:20px;">{{$subject->departmentName}}
                           </td>
                      <td style="padding:5px;padding-left:20px;padding-right:20px;">{{$subject->semesterName}}
                         </td>
                         <td style="padding:5px;padding-left:20px;padding-right:20px;"><button type="button" name="submitSelectedSubjectDetails{{$subject->subjectId}}" id="submitSelectedSubjectDetail{{$subject->subjectId}}" class="btn btn-primary" data-toggle="modal" data-target="#submitSelectedSubjectDetails{{$subject->subjectId}}">View</button></td>
                    </tr>
                            <!--

                            -->
                            <div class="modal fade" id="submitSelectedSubjectDetails{{$subject->subjectId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                          <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Subject List</h5>

                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                              </div>
                                                              <div class="modal-body" id="subjectsList">

                                                                <form action="{{route('updateSubject')}}" method="POST" name="updateSubject" id="updateSubject">
                                                                {{ csrf_field() }}{{ method_field('POST') }}
                                      {{Form::hidden('subjectId',$subject->subjectId)}}
                                         <h2>Subject Name : </h2>
                                      {{Form::text('subjectName',$subject->subjectName,array('placeholder'=>'Enter Subject Name '))}}<h2>Subject Grade : </h2><select name="subjectGrade">
                                        @foreach(($grades = \App\Models\grade::where('grades.batchId','=',$currentBatchId)) as  $grade)
                                         @if($grade->gradeId==$subject->gradeId)
                                          <option value="{{$grade->gradeId}}" selected>{{$grade->grade}}</option>
                                         @else
                                          <option value="{{$grade->gradeId}}">{{$grade->grade}}</option>
                                         @endif
                                        @endforeach
                                      </select>
                                      <h2>Department : </h2>
                                      <select name="departmentId">
                                          <option value="0">Select Department : </option>
                                      @if(count($departments = \App\Models\Department::where('departments.batchId','=',$currentBatchId)->get())>0)
                                       @foreach(($departments = \App\Models\Department::where('departments.batchId','=',$currentBatchId)->get()) as  $department)
                                        @if($department->departmentId==$subject->departmentId)
                                          <option value={{$department->departmentId}} selected>{{$department->departmentName}}</option>
                                         @else
                                          <option value="{{$department->departmentId}}">{{$department->departmentName}}</option>
                                         @endif
                                       @endforeach
                                      @endif
                                      </select>
                                      <h2>Semester : </h2><select name="semesterId">
                                         <option value="0">Select Semester : </option>
                                        @if(count($semesters = \App\Models\semester::where('semesters.batchId','=',$currentBatchId)->get())>0)
                                          @foreach(($semesters = \App\Models\semester::where('semesters.batchId','=',$currentBatchId)->get()) as  $semester)
                                            @if($semester->semesterId==$subject->semesterId)
                                              <option value={{$semester->semesterId}} selected>{{$semester->semesterName}}</option>
                                              @else
                                              <option value={{$semester->semesterId}}>{{$semester->semesterName}}</option>
                                              @endif
                                          @endforeach
                                        @endif
                                        </select><br>
                                     <h2>Subject Maximum Marks : </h2>
                                      {{Form::number('subjectMaxMarks',$subject->subjectMaxMarks,array('placeholder'=>'Subject Maximum Marks'))}}<br>
                                     <h2>Subject Textbook Name : </h2>
                                     {{Form::text('subjectTextName',$subject->subjectTextName,array('placeholder'=>'Textbook Name'))}}<br>
                                    <h2>Update Subject : </h2>{{Form::submit('Save',array('class'=>'btn btn-primary'))}}<br>
                                        {{Form::close()}}<br>
                                     <h2>Delete</h2>
                                      {{Form::open(array('route' => 'deleteSubject')) }}
                                      {{Form::hidden('subjectId',$subject->subjectId)}}
                                      <button class="btn btn-success btn-updateSubject">Submit</button>
                                        {{Form::close()}}<br>
                                     <hr><hr>
                                     <form action="{{route('deleteSubject')}}" method="POST" name="deleteSubject" id="deleteSubject">
                                     {{ csrf_field() }}{{ method_field('POST') }}
           {{Form::hidden('subjectId',$subject->subjectId)}}  <button class="btn btn-success btn-deleteSubject">Delete</button>
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

                           -->
                   @endforeach
                    </thead>
                    </table>
                @else
                   <h3 style="color:red;">List is empty</h3>
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
