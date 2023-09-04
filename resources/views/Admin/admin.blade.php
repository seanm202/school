<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  Add Admin
                  {{Form::open(array('route' => 'addAdminAdmin')) }}
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
                    </thead>
                  </table>{{Form::submit('Save',array('class'=>'btn btn-primary'))}}

                                        {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  Add Departments
                          {{Form::open(array('route' => 'createDepartment')) }}
                          {{Form::label('departmentName','Department Name : ')}}
                          {{Form::text('departmentName',NULL,array('placeholder'=>'Enter Department Name : '))}}
                          {{Form::submit('Create',array('class'=>'btn btn-primary'))}}
                          {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12" id="deleteDepartments">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                      Edit / Delete Departments
                      @if(count($departments = (\App\Models\Department::all()))>0)
                        @foreach(($departments = (\App\Models\Department::all())) as $department)
                          {{Form::open(array('route' => 'updateDepartment')) }}
                          {{Form::label('Department','Department Name : ')}}
                          {{Form::hidden('departmentId',$department->departmentId)}}
                          {{Form::text('departmentName',$department->departmentName,array('placeholder'=>'Enter Department Name : '))}}
                          {{Form::submit('Update',array('class'=>'btn btn-primary'))}}
                          {{Form::close()}}
                        @endforeach
                      @endif
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Add Semester
                          {{Form::open(array('route' => 'createSemester')) }}
                          {{Form::label('semesterName','Semester Name : ')}}
                          {{Form::text('semesterName',NULL,array('placeholder'=>'Enter Semester Name'))}}
                          {{Form::submit('Create',array('class'=>'btn btn-primary'))}}
                          {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                      Edit / Delete Semesters

                      @if(count($semesters = (\App\Models\semester::all()))>0)
                        @foreach(($semesters = (\App\Models\semester::all())) as $semester)
                          {{Form::open(array('route' => 'updateSemester')) }}
                          {{Form::label('semester','Semester Name : ')}}
                          {{Form::hidden('semesterId',$semester->semesterId)}}
                          {{Form::text('semesterName',$semester->semesterName,array('placeholder'=>'Enter Semester Name : '))}}
                          {{Form::submit('Update',array('class'=>'btn btn-primary'))}}
                          {{Form::close()}}
                        @endforeach
                      @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
