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
            <button class="btn btn-primary" id="menu-toggle" style="position:fixed;">Toggle Menu</button>   {{ __('Details') }}   @if(Session::has('success'))
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
          <a href="#detailsToNewUser" class="list-group-item list-group-item-action bg-light">Add details to new user</a>
          <a href="#createOrUpdateAdminDetails" class="list-group-item list-group-item-action bg-light">Create/Update admins's details</a>
          <a href="#createOrUpdateTeacherDetails" class="list-group-item list-group-item-action bg-light">Create/Update teachers's details</a>
          <a href="#createOrUpdateStudentDetails" class="list-group-item list-group-item-action bg-light">Create/Update students's details</a>
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
                          <script type="text/javascript">

                              $.ajaxSetup({
                                  headers: {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                  }
                              });

                              $(".addDetailsToNewUser").click(function(e){

                                  e.preventDefault();

                                  var form = $("#addDetailsToNewUser");

                                  $.ajax({
                                     type:'POST',
                                     url:"{{ route('addDetailsToNewUser') }}",
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

                               $(".createOrUpdateAdminDetails").click(function(e){

                                   e.preventDefault();

                                   var form = $("#createOrUpdateAdminDetails");

                                   $.ajax({
                                      type:'POST',
                                      url:"{{ route('createOrUpdateAdminDetails') }}",
                                      data:form.serialize(),
                                      success: function(response){
                                alert("jjjj");
                                      }
                                   });

                               });


                           </script>
    <div class="py-12" id="detailsToNewUser">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Add details to new user
                    <br>
                    New Users<br>
                    @if(count($users=\App\Models\User::where('users.batchId','=',$currentBatchId)->where('role','=',1)->get())>0)
                      @foreach(($users=\App\Models\User::where('role','=',1)->get()) as $user)
                          <table>
                            <thead>
                              <tr>
                                <th>First name</th>
                                <th>Age</th>
                                <th>Email</th>
                                <th>Edit Details</th>
                              </tr>
                            </thead>
                            <tbody>
                          <tr>
                          <td>{{$user->name}} </td>
                          <td>{{$user->age}} </td>
                          <td>{{$user->email}}</td>
                          <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLongNewUserUserId{{$user->userId}}">
                              Add Details
                            </button></td>

                        </tr>


                      </tbody>
                      </table>


                            <div class="modal fade" id="exampleModalLongNewUserUserId{{$user->userId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exasmpleModalLongTitle">Name : {{$user->name}}</h5>
                                      <h5 class="modal-title" id="exampleModalLonsgTitle">Email : {{$user->email}}</h5>
                                    <h5 class="modal-title" id="exampleModaslLongTitle">Phone : {{$user->phone}}</h5>
                                    <h5 class="modal-title" id="exampleModalLsongTitle">New users</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="{{route('addDetailsToNewUser')}}" method="POST" name="addDetailsToNewUser" id="addDetailsToNewUser">
                                    {{ csrf_field() }}{{ method_field('POST') }}
                                      <table><tr>
                                        <th>First name</th>{{Form::hidden('userId',$user->userId)}}
                                      <td>{{Form::text('firstName',NULL,array('placeholder'=>'Enter first name'))}} </td>
                                      </tr>
                                      <tr>
                                        <th>Last name</th>
                                      <td>{{Form::text('lastName',NULL,array('placeholder'=>'Enter last name'))}} </td></tr>
                                        <tr>
                                        <th>Age</th>
                                      <td>{{Form::text('age',NULL,array('placeholder'=>'Enter age'))}}</td></tr>
                                        <tr>
                                        <th>Date of birth</th>
                                      <td>{{Form::date('dob',NULL,array('placeholder'=>'Enter date of birth'))}}</td></tr>
                                        <tr>
                                          {{Form::hidden('userId',$user->userId)}}
                                          <th>Contact Number</th>
                                          <td>{{Form::text('contactNumber',NULL,array('placeholder'=>'Enter contact Number'))}}</td></tr>
                                          <tr>
                                            <th>Alternate Contact Number</th>
                                            <td>{{Form::text('alternateContactNumber',NULL,array('placeholder'=>'Enter Alternate Contact Number'))}}</td></tr>
                                            <tr>
                                        <th>Current Role</th>
                                      <td><select name="roleId">
                                        @if(count($roles = \App\Models\role::all())>0)
                                          @foreach(($roles = \App\Models\role::all()) as  $role)
                                            @if($role->roleId==1)
                                              <option value={{$role->roleId}} selected>{{$role->roleName}}</option>
                                            @else
                                              <option value={{$role->roleId}}>{{$role->roleName}}</option>
                                            @endif
                                          @endforeach
                                        @endif
                                        </select></td></tr>
                                      <tr>
                                          <th>Address</th>
                                          <td>{{Form::text('address',NULL,array('placeholder'=>'Enter Address'))}}</td></tr>
                                          <tr>
                                            <th>Blood group</th>
                                            <td>{{Form::text('bloodGroup',NULL,array('placeholder'=>'Enter Blood Group'))}}</td></tr>
                                            <tr>
                                              <th>Identification Mark</th>
                                              <td>{{Form::text('identificationMark',NULL,array('placeholder'=>'Enter identification mark'))}}</td></tr>
                                              <tr>
                                                <th>Parent's Number</th>
                                                  <td>{{Form::text('parentNumber',NULL,array('placeholder'=>"Enter parent's number"))}}</td></tr>
                                                  <tr>
                                                    <th>Home Phone Number</th>
                                                    <td>{{Form::text('homePhoneNumber',NULL,array('placeholder'=>'Enter Home Phone Number'))}}</td></tr>
                                                    <tr>
                                                      <th>Father's/Spouse's Name</th>
                                                      <td>{{Form::text('fatherSpouseName',NULL,array('placeholder'=>"Enter Father's/Spouse's Name"))}}</td></tr>
                                                      <tr>
                                                        <th>Mother's Name</th>
                                                        <td>{{Form::text('motherName',NULL,array('placeholder'=>"Enter mother's name"))}}</td></tr>
                                                        <tr>
                                                          <th>Guardian's Name</th>
                                                          <td>{{Form::text('guardianName',NULL,array('placeholder'=>"Enter Guardian's Name"))}}</td></tr>

                                                        </table>
                                                      </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button class="btn btn-success btn-addDetailsToNewUser">Submit</button>

                                                          {{Form::close()}}
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


 <div class="py-12" id="createOrUpdateAdminDetails">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900">
                     View/Edit details
                     <br>
                     Admins<br>
                     @if(count($admins = (\App\Models\detail::where('details.batchId','=',$currentBatchId->batchId)->where('roleId','=',3))->get())>0)
                       @foreach(($admins = (\App\Models\detail::where('details.batchId','=',$currentBatchId->batchId)->where('roleId','=',3))->get()) as $admin)
                       <div class="modal fade" id="exampleModalLongAdminAdminUserId{{$admin->userId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
               <div class="modal-dialog" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLongTitle">Name : {{$admin->firstname}} {{$admin->lastname}}</h5>
                       <h5 class="modal-title" id="exampleModalLongTitle">Role : Admin</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                                   <table>
                                     <thead>


                                       <form action="{{route('createOrUpdateAdminDetails')}}" method="POST" name="createOrUpdateAdminDetails" id="createOrUpdateAdminDetails">
                                       {{ csrf_field() }}{{ method_field('POST') }}
                                       {{Form::hidden('detailId',$admin->detailId)}}{{Form::hidden('userId',$admin->userId)}}
                                       <tr>
                                         <th>First name</th>
                                       <td>{{Form::text('firstName',$admin->firstname,array('placeholder'=>'Enter first name'))}} </td>
                                              </tr>
                                              <tr>
                                         <th>Last name</th>
                                                  <td>{{Form::text('lastName',$admin->lastname,array('placeholder'=>'Enter last name'))}} </td></tr>
                                                  <tr>
                                         <th>Age</th>
                                       <td>{{Form::text('age',$admin->age,array('placeholder'=>'Enter age'))}}</td></tr>
                                                <tr>
                                         <th>Date of birth : {{$admin->dob}}</th>
                                       <td>{{Form::date('dob',$admin->dob,array('placeholder'=>'Enter date of birth'))}}</td></tr>
                                                <tr>
                                      {{Form::hidden('userId',$admin->userId)}}
                                         <th>Contact Number</th>
                                       <td>{{Form::text('contactNumber',$admin->contactNumber,array('placeholder'=>'Enter contact Number'))}}</td></tr>
                                                <tr>
                                         <th>Alternate Contact Number</th>
                                       <td>{{Form::text('alternateContactNumber',$admin->alternateContactNumber,array('placeholder'=>'Enter Alternate Contact Number'))}}</td></tr>
                                                <tr>
                                         <th>Current Role</th>
                                       <td>Admin</td></tr>
                                        <tr>
                                         <th>Address</th>
                                       <td>{{Form::text('address',$admin->address,array('placeholder'=>'Enter Address'))}}</td></tr>
                                        <tr>
                                         <th>Blood group</th>
                                       <td>{{Form::text('bloodGroup',$admin->bloodGroup,array('placeholder'=>'Enter Blood Group'))}}</td></tr>
                                        <tr>
                                         <th>Identification Mark</th>
                                       <td>{{Form::text('identificationMark',$admin->identificationMark,array('placeholder'=>'Enter identification mark'))}}</td></tr>
                                        <tr>
                                         <th>Parent's Number</th>
                                       <td>{{Form::text('parentNumber',$admin->parentNumber,array('placeholder'=>"Enter parent's number"))}}</td></tr>
                                        <tr>
                                         <th>Home Phone Number</th>
                                       <td>{{Form::text('homePhoneNumber',$admin->homePhoneNumber,array('placeholder'=>'Enter Home Phone Number'))}}</td></tr>
                                        <tr>
                                         <th>Father's/Spouse's Name</th>
                                       <td>{{Form::text('fatherSpouseName',$admin->fatherSpouseName,array('placeholder'=>"Enter Father's/Spouse's Name"))}}</td></tr>
                                        <tr>
                                         <th>Mother's Name</th>
                                       <td>{{Form::text('motherName',$admin->motherName,array('placeholder'=>"Enter mother's name"))}}</td></tr>
                                        <tr>
                                         <th>Guardian's Name</th>
                                       <td>{{Form::text('guardianName',$admin->guardianName,array('placeholder'=>"Enter Guardian's Name"))}}</td></tr>
                                        <tr>
                                          </tr>
                                        </thead>
                                      </table>
                                        </table></div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button class="btn btn-success btn-createOrUpdateAdminDetails">Submit</button>{{Form::close()}}
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                       <table>
                         <thead>
                           <tr>
                             <th>First name</th>
                             <th>Last name</th>
                             <th>Age</th>
                             <th>Edit Details</th>
                           </tr>
                         </thead>
                         <tbody>
                           <tr>
                           <td>{{$admin->firstname}} </td>
                           <td>{{$admin->lastname}} </td>
                           <td>{{$admin->age}}</td>
                           <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLongAdminAdminUserId{{$admin->userId}}">
                               View/Edit Details
                             </button></td>

                         </tr>


                       </tbody>
                       </table>
                @endforeach
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

      $(".createOrUpdateTeacherDetails").click(function(e){

          e.preventDefault();

          var form = $("#createOrUpdateTeacherDetails");

          $.ajax({
             type:'POST',
             url:"{{ route('createOrUpdateTeacherDetails') }}",
             data:form.serialize(),
             success: function(response){
       alert("jjjj");
             }
          });

      });


  </script>

     <div class="py-12" id="createOrUpdateTeacherDetails">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900">
                     View/Edit details
                     <br>
                     Teachers<br>
                     @if(count($teachers = (\App\Models\detail::where('details.batchId','=',$currentBatchId->batchId)->where('roleId','=',2))->get())>0)
                       @foreach(($teachers = (\App\Models\detail::where('details.batchId','=',$currentBatchId->batchId)->where('roleId','=',2))->get()) as $teacher)
                       <div class="modal fade" id="exampleModalLongTeacherTeacherUserId{{$teacher->userId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Name : {{$teacher->firstname}} {{$teacher->lastname}}</h5>
                                  <h5 class="modal-title" id="exampleModalLongTitle">Role : Teacher</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                              <table>
                                                <thead>

                                                  <form action="{{route('createOrUpdateTeacherDetails')}}" method="POST" name="createOrUpdateTeacherDetails" id="createOrUpdateTeacherDetails">
                                                  {{ csrf_field() }}{{ method_field('POST') }}
                                                  {{Form::hidden('detailId',$teacher->detailId)}}
                                                  {{Form::hidden('userId',$teacher->userId)}}
                                                  <tr>
                                                    <th>First name</th>
                                                  <td>{{Form::text('firstName',$teacher->firstname,array('placeholder'=>'Enter first name'))}} </td>
                                                </tr>
                                                <tr>
                                                    <th>Last name</th>
                                                  <td>{{Form::text('lastName',$teacher->lastname,array('placeholder'=>'Enter last name'))}} </td></tr>
                                                  <tr>
                                                    <th>Age</th>
                                                  <td>{{Form::text('age',$teacher->age,array('placeholder'=>'Enter age'))}}</td></tr>
                                                  <tr>
                                                    <th>Date of birth : {{$teacher->dob}}</th>
                                                  <td>{{Form::date('dob',$teacher->dob,array('placeholder'=>'Enter date of birth'))}}</td></tr>
                                                  <tr>
                                                      {{Form::hidden('userId',$teacher->userId)}}
                                                    <th>Contact Number</th>
                                                  <td>{{Form::text('contactNumber',$teacher->contactNumber,array('placeholder'=>'Enter contact Number'))}}</td></tr>
                                                  <tr>
                                                    <th>Alternate Contact Number</th>
                                                  <td>{{Form::text('alternateContactNumber',$teacher->alternateContactNumber,array('placeholder'=>'Enter Alternate Contact Number'))}}</td></tr>
                                                  <tr>
                                                    <th>Current Role</th>
                                                  <td>Teacher</td></tr>
                                                    <tr>
                                                    <th>Address</th>
                                                  <td>{{Form::text('address',$teacher->address,array('placeholder'=>'Enter Address'))}}</td></tr>
                                                    <tr>
                                                    <th>Blood group</th>
                                                  <td>{{Form::text('bloodGroup',$teacher->bloodGroup,array('placeholder'=>'Enter Blood Group'))}}</td></tr>
                                                    <tr>
                                                    <th>Identification Mark</th>
                                                  <td>{{Form::text('identificationMark',$teacher->identificationMark,array('placeholder'=>'Enter identification mark'))}}</td></tr>
                                                    <tr>
                                                    <th>Parent's Number</th>
                                                  <td>{{Form::text('parentNumber',$teacher->parentNumber,array('placeholder'=>"Enter parent's number"))}}</td></tr>
                                                    <tr>
                                                    <th>Home Phone Number</th>
                                                  <td>{{Form::text('homePhoneNumber',$teacher->homePhoneNumber,array('placeholder'=>'Enter Home Phone Number'))}}</td></tr>
                                                    <tr>
                                                    <th>Father's/Spouse's Name</th>
                                                  <td>{{Form::text('fatherSpouseName',$teacher->fatherSpouseName,array('placeholder'=>"Enter Father's/Spouse's Name"))}}</td></tr>
                                                    <tr>
                                                        <th>Mother's Name</th>
                                                        <td>{{Form::text('motherName',$teacher->motherName,array('placeholder'=>"Enter mother's name"))}}</td></tr>
                                                        <tr>
                                                          <th>Guardian's Name</th>
                                                          <td>{{Form::text('guardianName',$teacher->guardianName,array('placeholder'=>"Enter Guardian's Name"))}}</td></tr>
                                                          <tr>
                                                          </tr>
                                                        </table>  <button class="btn btn-success btn-createOrUpdateTeacherDetails">Submit</button>{{Form::close()}}</div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                       <table>
                         <thead>
                           <tr>
                             <th>First name</th>
                             <th>Last name</th>
                             <th>Age</th>
                             <th>Edit Details</th>
                           </tr>
                         </thead>
                         <tbody>
                           <tr>
                           <td>{{$teacher->firstname}} </td>
                           <td>{{$teacher->lastname}} </td>
                           <td>{{$teacher->age}}</td>
                           <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLongTeacherTeacherUserId{{$teacher->userId}}">
                               View/Edit Details
                             </button></td>

                         </tr>


                       </tbody>
                       </table>


                         {{Form::close()}}
                       @endforeach
                    @else
                       <h3 style="color:red">List is empty</h3>
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

      $(".createOrUpdateStudentDetails").click(function(e){

          e.preventDefault();

          var form = $("#createOrUpdateStudentDetails");

          $.ajax({
             type:'POST',
             url:"{{ route('createOrUpdateStudentDetails') }}",
             data:form.serialize(),
             success: function(response){
       alert("jjjj");
             }
          });

      });


  </script>

                  <div class="py-12" id="createOrUpdateStudentDetails">
                      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                      View/Edit details
                      <br>
                      Students<br>
                      @if(count($students = (\App\Models\detail::where('details.batchId','=',$currentBatchId->batchId)->where('roleId','=',4))->get())>0)
                        @foreach(($students = (\App\Models\detail::where('details.batchId','=',$currentBatchId->batchId)->where('roleId','=',4))->get()) as $student)
                        <div class="modal fade" id="exampleModalLongStudentStudentUserId{{$student->userId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Name : {{$student->firstname}} {{$student->lastname}}</h5>
                        <h5 class="modal-title" id="exampleModalLongTitle">Role : Student</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="{{route('createOrUpdateStudentDetails')}}" method="POST" name="createOrUpdateStudentDetails" id="createOrUpdateStudentDetails">
                      {{ csrf_field() }}{{ method_field('POST') }}

                                    <table>
                                      <thead>

                                        <tr>
                                          <th>First name</th>
                                        <td>{{Form::text('firstName',$student->firstname,array('placeholder'=>'Enter first name'))}}
                                        {{Form::hidden('detailId',$student->detailId)}} </td>{{Form::hidden('userId',$student->userId)}}
                                        </tr>
                                        <tr>
                                          <th>Last name</th>
                                        <td>{{Form::text('lastName',$student->lastname,array('placeholder'=>'Enter last name'))}} </td></tr>
                                          <tr>
                                          <th>Age</th>
                                        <td>{{Form::text('age',$student->age,array('placeholder'=>'Enter age'))}}</td></tr>
                                          <tr>
                                          <th>Date of birth : {{$student->dob}}</th>
                                        <td>{{Form::date('dob',$student->dob,array('placeholder'=>'Enter date of birth'))}}</td></tr>
                                          <tr>
                                            {{Form::hidden('userId',$student->userId)}}
                                          <th>Contact Number</th>
                                        <td>{{Form::text('contactNumber',$student->contactNumber,array('placeholder'=>'Enter contact Number'))}}</td></tr>
                                          <tr>
                                          <th>Alternate Contact Number</th>
                                        <td>{{Form::text('alternateContactNumber',$student->alternateContactNumber,array('placeholder'=>'Enter Alternate Contact Number'))}}</td></tr>
                                          <tr>
                                          <th>Current Role</th>
                                        <td>Student</td></tr>
                                          <tr>
                                          <th>Address</th>
                                        <td>{{Form::text('address',$student->address,array('placeholder'=>'Enter Address'))}}</td></tr>
                                          <tr>
                                          <th>Blood group</th>
                                        <td>{{Form::text('bloodGroup',$student->bloodGroup,array('placeholder'=>'Enter Blood Group'))}}</td></tr>
                                          <tr>
                                          <th>Identification Mark</th>
                                        <td>{{Form::text('identificationMark',$student->identificationMark,array('placeholder'=>'Enter identification mark'))}}</td></tr>
                                          <tr>
                                          <th>Parent's Number</th>
                                        <td>{{Form::text('parentNumber',$student->parentNumber,array('placeholder'=>"Enter parent's number"))}}</td></tr>
                                          <tr>
                                          <th>Home Phone Number</th>
                                        <td>{{Form::text('homePhoneNumber',$student->homePhoneNumber,array('placeholder'=>'Enter Home Phone Number'))}}</td></tr>
                                          <tr>
                                          <th>Father's/Spouse's Name</th>
                                        <td>{{Form::text('fatherSpouseName',$student->fatherSpouseName,array('placeholder'=>"Enter Father's/Spouse's Name"))}}</td></tr>
                                          <tr>
                                          <th>Mother's Name</th>
                                            <td>{{Form::text('motherName',$student->motherName,array('placeholder'=>"Enter mother's name"))}}</td></tr>
                                            <tr>
                                              <th>Guardian's Name</th>
                                              <td>{{Form::text('guardianName',$student->guardianName,array('placeholder'=>"Enter Guardian's Name"))}}</td></tr>
                                              <tr>
                                              </tr>
                                            </table>

                                          </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                               <button class="btn btn-success btn-createOrUpdateStudentDetails">Submit</button>
                                 {{Form::close()}}
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                          {{Form::hidden('detailId',$student->detailId)}}
                        <table>
                          <thead>
                            <tr>
                              <th>First name</th>
                              <th>Last name</th>
                              <th>Age</th>
                              <th>Edit Details</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                            <td>{{$student->firstname}} </td>
                            <td>{{$student->lastname}} </td>
                            <td>{{$student->age}}</td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLongStudentStudentUserId{{$student->userId}}">
                                View/Edit Details
                                </button></td>

                          </tr>


                        </tbody>
                        </table>



                        @endforeach
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








</x-app-layout>
