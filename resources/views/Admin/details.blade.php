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
            {{ __('Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Add details to new user
                    <br>
                    New Users<br>
                    @if(count($users=\App\Models\User::where('role','=',1)->get())>0)
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
                                    <h5 class="modal-title" id="exampleModalLongTitle">Name : {{$user->name}}</h5>
                                      <h5 class="modal-title" id="exampleModalLongTitle">Email : {{$user->email}}</h5>
                                    <h5 class="modal-title" id="exampleModalLongTitle">Phone : {{$user->phone}}</h5>
                                    <h5 class="modal-title" id="exampleModalLongTitle">New users</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    {{Form::open(array('route' => 'addDetailsToNewUser')) }}
                                      <table>
                                    <thead>

                                      <tr>
                                        <th>First name</th>
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
                                                          <tr>
                                                          </tr>
                                                        </table>
                                                      </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                          {{Form::submit('Save',array('class'=>'btn btn-primary'))}}

                                                          {{Form::close()}}
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>

                                  @endforeach
                            @endif

                </div>
              </div>
            </div>
          </div>
<!--


 -->
 <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900">
                     View/Edit details
                     <br>
                     Admins<br>
                     @if(count($admins = (\App\Models\detail::where('roleId','=',3))->get())>0)
                       @foreach(($admins = (\App\Models\detail::where('roleId','=',3))->get()) as $admin)
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

                                       {{Form::open(array('route' => 'createOrUpdateAdminDetails')) }}
                                       {{Form::hidden('detailId',$admin->detailId)}}
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
                                       <td><select name="roleId">
                                         @if(count($roles = \App\Models\role::all())>0)
                                           @foreach(($roles = \App\Models\role::all()) as  $role)
                                             @if($role->roleId==3)
                                               <option value={{$role->roleId}} selected>{{$role->roleName}}</option>
                                             @else
                                               <option value={{$role->roleId}}>{{$role->roleName}}</option>
                                             @endif
                                           @endforeach
                                         @endif
                                       </select></td></tr>
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
                                          {{Form::submit('Update',array('class'=>'btn btn-primary'))}}{{Form::close()}}
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
                List is empty
              @endif

                 </div>
             </div>
         </div>
     </div>
 <!--





  -->
     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900">
                     View/Edit details
                     <br>
                     Teachers<br>
                     @if(count($teachers = (\App\Models\detail::where('roleId','=',2))->get())>0)
                       @foreach(($teachers = (\App\Models\detail::where('roleId','=',2))->get()) as $teacher)
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
                                                  {{Form::open(array('route' => 'createOrUpdateTeacherDetails')) }}
                                                  {{Form::hidden('detailId',$teacher->detailId)}}
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
                                                  <td><select name="roleId">
                                                    @if(count($roles = \App\Models\role::all())>0)
                                                      @foreach(($roles = \App\Models\role::all()) as  $role)
                                                        @if($role->roleId==2)
                                                          <option value={{$role->roleId}} selected>{{$role->roleName}}</option>
                                                        @else
                                                          <option value={{$role->roleId}}>{{$role->roleName}}</option>
                                                        @endif
                                                      @endforeach
                                                    @endif
                                                  </select></td></tr>
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
                                                        </table></div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                          {{Form::submit('Update',array('class'=>'btn btn-primary'))}}
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
                       List is empty
                    @endif

                 </div>
             </div>
         </div>
     </div>
 <!--


  -->
                  <div class="py-12">
                      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                      View/Edit details
                      <br>
                      Students<br>
                      @if(count($students = (\App\Models\detail::where('roleId','=',4))->get())>0)
                        @foreach(($students = (\App\Models\detail::where('roleId','=',4))->get()) as $student)
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
                      {{Form::open(array('route' => 'createOrUpdateStudentDetails')) }}
                                    <table>
                                      <thead>

                                        <tr>
                                          <th>First name</th>
                                        <td>{{Form::text('firstName',$student->firstname,array('placeholder'=>'Enter first name'))}}
                                        {{Form::hidden('detailId',$student->detailId)}} </td>
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
                                        <td><select name="roleId">
                                          @if(count($roles = \App\Models\role::all())>0)
                                            @foreach(($roles = \App\Models\role::all()) as  $role)
                                              @if($role->roleId==4)
                                                <option value={{$role->roleId}} selected>{{$role->roleName}}</option>
                                              @else
                                                <option value={{$role->roleId}}>{{$role->roleName}}</option>
                                              @endif
                                            @endforeach
                                          @endif
                                        </select></td></tr>
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
                                               {{Form::submit('Update',array('class'=>'btn btn-primary'))}}
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
                        List is empty
                     @endif

                  </div>
              </div>
          </div>
      </div>









</x-app-layout>
