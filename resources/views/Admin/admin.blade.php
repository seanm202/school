
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
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
        </h2>
    </x-slot>

    @if ( Auth::user()->role != 3)

      <script type="text/javascript">
      window.location = "{{url('logout')}}";//here double curly bracket
      </script>
    @endif
<!--

 -->



 <script type="text/javascript">

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

     $(".addAdminAdmin").click(function(e){

         e.preventDefault();

         var form = $("#addAdminAdmin");

         $.ajax({
            type:'POST',
            url:"{{ route('addAdminAdmin') }}",
            data:form.serialize(),
            success: function(response){
      alert("jjjj");
            }
         });

     });


 </script>

    <div class="py-12" id="createTheAdmin">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  Add Admin   @if(Session::has('success'))
        <div class="alert alert-success" style="position: fixed;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif
                  <form action="{{route('addAdminAdmin')}}" method="POST" name="addAdminAdmin" id="addAdminAdmin">
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
                  </table><button class="btn btn-success btn-addAdminAdmin">Save</button>

                                        {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
<!-- Add batches

 -->

    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#createBatches').submit(function (event) {
           event.preventDefault();
           $.ajax({
              type: "POST",
              url: "{{ route('createBatches') }}",
              data: $(this).serialize(),
               success: function (data) {
                 console.log("hi");
               // $('.result').html(data);
              }
            });
        });

//         $("createBatches").click(function(e){
//
//             e.preventDefault();
//
//             var form = $("#createBatches");
//
//             $.ajax({
//                type:'POST',
//                url:"{{ route('createBatches') }}",
//                data:form.serialize(),
//                success: function(response){
//          alert("jjjj");
//                }
//             });
// return false;
//         });


    </script>


 <div class="py-12" id="createTheBatches">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
               Add Batches
               <form action="{{route('createBatches')}}" method="post" name="createBatches" id="createBatches">
               {{ csrf_field() }}{{ method_field('POST') }}

                       <div style="display:flex;">
                         <div>{{Form::label('Batch Name','Batch Name')}}</div>
                       <div>{{Form::text('batchName',NULL,array('placeholder'=>'Enter Batch Name : ','id'=>'batchName'))}}</div><div style="padding:20px;"></div>
                       <div>{{Form::label('Batch StartingYear','Batch Starting Year')}}</div>
                       <div>{{Form::text('batchStartingYear',NULL,array('placeholder'=>'Enter Starting Year','id'=>'batchStartingYear'))}}</div><div style="padding:20px;"></div>
                      <div> {{Form::label('Batch Ending Year','Batch Ending Year')}}</div>
                       <div>{{Form::text('batchEndingYear',NULL,array('placeholder'=>'Enter Ending Year','id'=>'batchEndingYear'))}}</div><div style="padding:20px;"></div>
                       <div><button type="submit" onsubmit="submitBatch()" class="btn btn-success btn-createBatches">Create</button></div></div>
                       {{Form::close()}}
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

         $(".updateBatches").click(function(e){

             e.preventDefault();

             var form = $("#updateBatches");

             $.ajax({
                type:'POST',
                url:"{{ route('updateBatches') }}",
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

        $(".deleteBatches").click(function(e){

            e.preventDefault();

            var form = $("#deleteBatches");

            $.ajax({
               type:'POST',
               url:"{{ route('deleteBatches') }}",
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

             $(".currentBatch").click(function(e){

                 e.preventDefault();

                 var form = $("#currentBatch");

                 $.ajax({
                    type:'POST',
                    url:"{{ route('currentBatch') }}",
                    data:form.serialize(),
                    success: function(response){
              alert("jjjj");
                    }
                 });

             });


         </script>
 <div class="py-12" id="updateTheBatches">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
              @if(count($batches = \App\Models\batch::all())>0)
               Update Batch Details / Delete Batch
               <table>
               <thead>
               <th>Batch Id</th>
               <th>Batch Name</th>
               <th>Starting Year</th>
               <th>Ending Year</th>
               <th>Update</th>
               <th>Assign</th>
               </thead>
               <tbody>
               @foreach(($batches = \App\Models\batch::all()) as $batch)
                    @if($batch->status!=1)
                        <tr><form action="{{route('updateBatches')}}" method="POST" name="updateBatches" id="updateBatches">{{ csrf_field() }}{{ method_field('POST') }}{{Form::hidden('batchId',$batch->batchId)}}
                      <td>{{$batch->batchId}}</td>
                      <td>{{Form::text('batchName',$batch->batchName)}}</td>
                      <td>{{Form::text('batchStartingYear',$batch->batchStartingYear)}}</td>
                      <td>{{Form::text('batchEndingYear',$batch->batchEndingYear)}}</td>
                      <td><button class="btn btn-success btn-updateBatches">Update</button>{{Form::close()}}</td><form action="{{route('currentBatch')}}" method="POST" name="updateBatches" id="currentBatch">{{ csrf_field() }}{{ method_field('POST') }}
                    {{Form::hidden('batchId',$batch->batchId)}}{{Form::hidden('currentBatchId',(\App\Models\batch::where('status',1)->select('batchId')->first())->batchId)}}
                      <td><button class="btn btn-success btn-currentBatch">Assign</button>{{Form::close()}}</td>
                      </tr>
                    @else
                      <tr style="background:green;color:white;"><form action="{{route('updateBatches')}}" method="POST" name="updateBatches" id="updateBatches">{{ csrf_field() }}{{ method_field('POST') }}{{Form::hidden('batchId',$batch->batchId)}}
                      <td>{{$batch->batchId}}</td>
                      <td>{{Form::text('batchName',$batch->batchName)}}</td>
                        <td>{{Form::text('batchStartingYear',$batch->batchStartingYear)}}</td>
                        <td>{{Form::text('batchEndingYear',$batch->batchEndingYear)}}</td>
                        <td><button class="btn btn-success btn-updateBatches">Update</button>{{Form::close()}}</td><form action="{{route('currentBatch')}}" method="POST" name="updateBatches" id="currentBatch">{{ csrf_field() }}{{ method_field('POST') }}
                          {{Form::hidden('batchId',$batch->batchId)}}{{Form::hidden('currentBatchId',(\App\Models\batch::where('status',1)->select('batchId')->first())->batchId)}}
                          <td><button class="btn btn-success btn-currentBatch">Assign</button>{{Form::close()}}</td>
                      </tr>
                   @endif
              @endforeach
             </tbody>
              </table>
          @else
            <h3 style="color:red;">List is empty<h3>
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

       $(".createDepartment").click(function(e){

           e.preventDefault();

           var form = $("#createDepartment");

           $.ajax({
              type:'POST',
              url:"{{ route('createDepartment') }}",
              data:form.serialize(),
              success: function(response){
        alert("jjjj");
              }
           });

       });


   </script>

    <div class="py-12" id="addTheDepartments">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  Add Departments
                  <form action="{{route('createDepartment')}}" method="POST" name="createDepartment" id="createDepartment">
                  {{ csrf_field() }}{{ method_field('POST') }}
                    {{Form::label('departmentName','Department Name : ')}}
                          {{Form::text('departmentName',NULL,array('placeholder'=>'Enter Department Name : '))}}<br><br><hr><br>
                          <button class="btn btn-success btn-createDepartment">Create</button>
                          {{Form::close()}}
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

       $(".updateDepartment").click(function(e){

           e.preventDefault();

           var form = $("#updateDepartment");

           $.ajax({
              type:'POST',
              url:"{{ route('updateDepartment') }}",
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

          $(".deleteDepartment").click(function(e){

              e.preventDefault();

              var form = $("#deleteDepartment");

              $.ajax({
                 type:'POST',
                 url:"{{ route('deleteDepartment') }}",
                 data:form.serialize(),
                 success: function(response){
           alert("jjjj");
                 }
              });

          });


      </script>
    <div class="py-12" id="deleteTheDepartments">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                      Edit / Delete Departments
                      @if(count($departments = (\App\Models\Department::where('departments.batchId','=',(\App\Models\batch::where('status',1)->select('batchId')->first())->batchId)->get()))>0)
                       <table>
                         <thead>
                           <tr>
                             <th>Department Id</th>
                             <th>Department Name</th>
                             <th>Update</th>
                             <th>Delete</th>
                           </tr>
                         </thead>
                         <tbody>
                        @foreach(($departments = (\App\Models\Department::where('departments.batchId','=',$currentBatchId)->get())) as $department)
                          <tr>  <form action="{{route('updateDepartment')}}" method="POST" name="updateDepartment" id="updateDepartment">
                              {{ csrf_field() }}{{ method_field('POST') }}{{Form::hidden('departmentId',$department->departmentId)}}
                              <td>{{Form::label('departmentId',$department->departmentId)}}</td>
                              <td>{{Form::text('departmentName',$department->departmentName,array('placeholder'=>'Enter Department Name : '))}}</td>
                              <td><button class="btn btn-success btn-updateDepartment">Update</button></td>
                              {{Form::close()}}
                              <form action="{{route('deleteDepartment')}}" method="POST" name="deleteDepartment" id="deleteDepartment">
                                  {{ csrf_field() }}{{ method_field('POST') }}{{Form::hidden('departmentId',$department->departmentId)}}
                                  <td><button class="btn btn-success btn-deleteDepartment">Delete</button>
                                  {{Form::close()}}
                                </td>
                            </tr>
                        @endforeach
                         </tbody>
                       </table>
                  @else
                     <h3 style="color:red;">List is empty<h3>
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

     $(".createSemester").click(function(e){

         e.preventDefault();

         var form = $("#createSemester");

         $.ajax({
            type:'POST',
            url:"{{ route('createSemester') }}",
            data:form.serialize(),
            success: function(response){
      alert("jjjj");
            }
         });

     });


 </script>
    <div class="py-12" id="addTheSemesters">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Add Semester

                    <form action="{{route('createSemester')}}" method="POST" name="createSemester" id="createSemester">
                    {{ csrf_field() }}{{ method_field('POST') }}
                          {{Form::label('semesterName','Semester Name : ')}}
                          {{Form::text('semesterName',NULL,array('placeholder'=>'Enter Semester Name'))}}<br><br><hr><br>
                          <button class="btn btn-success btn-createSemester">Create</button>
                          {{Form::close()}}
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

        $(".updateSemester").click(function(e){

            e.preventDefault();

            var form = $("#updateSemester");

            $.ajax({
               type:'POST',
               url:"{{ route('updateSemester') }}",
               data:form.serialize(),
               success: function(response){
         alert("jjjj");
               }
            });

        });


    </script>
    <div class="py-12"  id="editTheSemesters">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                      Edit Semesters

                   @if(count(\App\Models\semester::where('semesters.batchId','=',$currentBatchId)->get())>0)
                    <table>
                      <thead>
                      <tr>
                        <th>Semester Name</th>
                        <th>Update</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach(($semesters = (\App\Models\semester::all())) as $semester)
                          <form action="{{route('updateSemester')}}" method="POST" name="updateSemester" id="updateSemester">
                            {{ csrf_field() }}{{ method_field('POST') }}

                            {{Form::hidden('semesterId',$semester->semesterId)}}
                            <tr><td>{{Form::text('semesterName',$semester->semesterName,array('placeholder'=>'Enter Semester Name : '))}}</td>
                              <td><button class="btn btn-success btn-updateSemester">Update</button></td></tr>
                          {{Form::close()}}
                        @endforeach
                      </body>
                        </table>
                    @else
                      <h3 style="color:red;">List is empty<h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
<!--
Day creation and updation
 -->


 <script type="text/javascript">

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

     $(".updateDayDetails").click(function(e){

         e.preventDefault();

         var form = $("#updateDayDetails");

         $.ajax({
            type:'POST',
            url:"{{ route('updateDayDetails') }}",
            data:form.serialize(),
            success: function(response){
      alert("jjjj");
            }
         });

     });


 </script>
 <div class="py-12" id="editDayName">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
               Edit Day Name
               <table>
               <thead>
                 <tr>
                   <th>Day ID</th>
                   <th>Day Name </th>
                   <th>Update</th>
                 </tr>
               </thead>
             <tbody>
                 @foreach(($days=(\App\Models\days::all())) as $day)
                 <tr>
                 <form action="{{route('updateDayDetails')}}" method="POST" name="updateDayDetails" id="updateDayDetails">
                 {{ csrf_field() }}{{ method_field('POST') }}
                   <td>{{$day->dayId}}</td>{{Form::hidden('dayId',$day->dayId)}}
                 <td>{{Form::text('dayName',$day->dayName,array('placeholder'=>'Enter Day Name'))}} </td>
                 <td><button class="btn btn-success btn-updateDayDetails">Save</button>
                   {{Form::close()}}</td>
               </tr>
                 @endforeach
             </tbody>
               </table>
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

        $(".createDay").click(function(e){

            e.preventDefault();

            var form = $("#createDay");

            $.ajax({
               type:'POST',
               url:"{{ route('createDay') }}",
               data:form.serialize(),
               success: function(response){
         alert("jjjj");
               }
            });

        });


    </script>

   <div class="py-12" id="addTheDay">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900">
                 Add Day
                   <div>Day Name : <form action="{{route('createDay')}}" method="POST" name="createDay" id="createDay">
                     {{ csrf_field() }}{{ method_field('POST') }}
                   {{Form::text('dayName',NULL,array('placeholder'=>'Enter day name'))}}<br><br><hr><br>
                   <button class="btn btn-success btn-createDay">Submit</button>
                     {{Form::close()}}
                   </div>
               </div>
           </div>
       </div>
   </div>

   <!--
Hour creation
  -->

<!--

-->

    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".updateHourDetails").click(function(e){

            e.preventDefault();

            var form = $("#updateHourDetails");

            $.ajax({
               type:'POST',
               url:"{{ route('updateHourDetails') }}",
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

        $(".deleteHour").click(function(e){

            e.preventDefault();

            var form = $("#deleteHour");

            $.ajax({
               type:'POST',
               url:"{{ route('deleteHour') }}",
               data:form.serialize(),
               success: function(response){
         alert("jjjj");
               }
            });

        });


    </script>

<div class="py-12" id="editTheHourName">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
           <div class="p-6 text-gray-900">
             Edit Hour Name

          @if(count($hours=(\App\Models\hours::all()))>0)
               <table>
             <thead>

               <tr>
                 <th>Hour ID</th>
                 <th>Hour Name </th>
                 <th>Hour Starting Time</th>
                 <th>Update</th>
                 <th>Delete</th>
               </tr>
             </thead>
           <tbody>
               @foreach(($hours=(\App\Models\hours::all())) as $hour)
               <tr><form action="{{route('updateHourDetails')}}" method="POST" name="updateHourDetails" id="updateHourDetails">
               {{ csrf_field() }}{{ method_field('POST') }}
                 <td>{{$hour->hourId}}</td>{{Form::hidden('hourId',$hour->hourId)}}
               <td>{{Form::text('hourName',$hour->hourName,array('placeholder'=>'Enter Day Name'))}}</td>
               <td>{{Form::time('hourStartingTime',$hour->hourStartingTime)}}</td>
               <td><button class="btn btn-success btn-updateHourDetails">Save</button></td>{{Form::close()}}
             <form action="{{route('deleteHour')}}" method="POST" name="deleteHour" id="deleteHour">
               {{ csrf_field() }}{{ method_field('POST') }}{{Form::hidden('hourId',$hour->hourId)}}
               <td><button class="btn btn-success btn-deleteHour">Delete</button>
                   {{Form::close()}}</td>
             </tr>
               @endforeach
           </tbody>
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


     <script type="text/javascript">

         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

         $(".createHour").click(function(e){

             e.preventDefault();

             var form = $("#createHour");

             $.ajax({
                type:'POST',
                url:"{{ route('createHour') }}",
                data:form.serialize(),
                success: function(response){
          alert("jjjj");
                }
             });

         });


     </script>
 <div class="py-12" id="addTheHour">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
               Add Hour
                 <div><form action="{{route('createHour')}}" method="POST" name="createHour" id="createHour">
                   {{ csrf_field() }}{{ method_field('POST') }}{{Form::label('Hour Name : ','Hour Name : ')}} {{Form::text('houryName',NULL,array('placeholder'=>'Enter first name'))}}
                 {{Form::label('Pick Hour Starting Time : ','Pick Hour Starting Time : ')}}{{Form::time('hourStarTime',NULL)}}<br><br><hr><br>
                 <button class="btn btn-success btn-createHour">Add</button>{{Form::close()}}
                </div>
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

     $(".createDailyAttendance").click(function(e){

         e.preventDefault();

         var form = $("#createDailyAttendance");

         $.ajax({
            type:'POST',
            url:"{{ route('createDailyAttendance') }}",
            data:form.serialize(),
            success: function(response){
      alert("jjjj");
            }
         });

     });


 </script>
 <div class="py-12" id="generateAttendanceForTeachers">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
               Generate students teacher enabled daily attendance
               <form action="{{route('createDailyAttendance')}}" method="POST" name="createDailyAttendance" id="createDailyAttendance">
               {{ csrf_field() }}{{ method_field('POST') }}
                {{Form::label('Select date to generate attendance : ') }}
                {{Form::date('dateSelected') }}<br><br><hr><br>
                <button class="btn btn-success btn-createDailyAttendance">Generate</button>{{Form::close()}}

             </div>
         </div>
     </div>
 </div>



      <div class="py-12" id="updateTheStatus">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 text-gray-900">
                    View Status
                    <table>
                      <thead><tr>
                        <th>Status Id</th>
                        <th>Status Name</th>
                        <th>Status for </th>
                        <th>Update</th>
                        <th>Delete</th></tr>
                      </thead>
                    @foreach($statuses=\App\Models\Status::all() as $status)

                    <tbody>
                      <tr>
                      <form action="{{route('updateStatusDetails')}}" method="POST" name="updateStatusDetails" id="updateStatusDetails">
                      {{ csrf_field() }}{{ method_field('POST') }}
                       <td>{{$status->statusId}}</td>
                       <td>{{Form::text('statusName',$status->statusName,array('placeholder'=>'Enter Status Name'))}}</td>
                        <td><select name="roleForStatus">
                        @foreach(($roles=\App\Models\role::all()) as $role)
                         <option value="{{$role->roleId}}">{{$role->roleName}}</option>
                          @endforeach
                        </select></td>
                        <td><button class="btn btn-success btn-updateStatusDetails">Update</button>
                       {{Form::hidden('statusId',$status->statusId)}}
                        {{Form::close()}}</td><form action="{{route('deleteStatusDetails')}}" method="POST" name="deleteStatusDetails" id="deleteStatusDetails">
                        <td><button class="btn btn-success btn-deleteStatusDetails">Delete</button></td>
                          {{ csrf_field() }}{{ method_field('POST') }}
                       {{Form::hidden('statusId',$status->statusId)}}
                        {{Form::close()}}
                      </tr>
                        </tbody>
                    @endforeach
                  </table>
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

      $(".statusAddAdmin").click(function(e){

          e.preventDefault();

          var form = $("#statusAddAdmin");

          $.ajax({
             type:'POST',
             url:"{{ route('statusAddAdmin') }}",
             data:form.serialize(),
             success: function(response){
       alert("jjjj");
             }
          });

      });


  </script>

     <div class="py-12" id="createTheStatus">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900">
                   Add Status
                   <form action="{{route('statusAddAdmin')}}" method="POST" name="statusAddAdmin" id="statusAddAdmin">
                   {{ csrf_field() }}{{ method_field('POST') }}
                     <table>
                   <thead>

                     <tr>
                       <th>Status Name</th>
                     <td>{{Form::text('statusName',NULL,array('placeholder'=>'Enter Status Name'))}} </td>
                     </tr>
                     <tr>
                       <th>Status for role </th>
                     <td>
                       <select name="roleForStatus">
                       @foreach(($roles=\App\Models\role::all()) as $role)
                        <option value="{{$role->roleId}}">{{$role->roleName}}</option>
                         @endforeach
                       </select>
                      </td></tr>
                     </thead>
                   </table><button class="btn btn-success btn-statusAddAdmin">Save</button>

                                         {{Form::close()}}
                 </div>
             </div>
         </div>
     </div>

</x-app-layout>
