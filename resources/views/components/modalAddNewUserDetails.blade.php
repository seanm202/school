<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <table>
        <thead>
          <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Age</th>
            <th>Date of birth</th>
            <th>Contact Number</th>
            <th>Alternate Contact Number</th>
            <th>Current Role</th>
            <th>Address</th>
            <th>Blood group</th>
            <th>Identification Mark</th>
            <th>Parent's Number</th>
            <th>Home Phone Number</th>
            <th>Father's/Spouse's Name</th>
            <th>Mother's Name</th>
            <th>Guardian's Name</th>
          </tr>
        </thead>
        <tbody>

          {{Form::open(array('route' => 'addDetailsToNewUser')) }}
        <tr>
          <td>{{Form::text('firstName',NULL,array('placeholder'=>'Enter first name'))}} </td>
          <td>{{Form::text('lastName',NULL,array('placeholder'=>'Enter last name'))}} </td>
          <td>{{Form::text('age',NULL,array('placeholder'=>'Enter age'))}}</td>
          <td>{{Form::text('dob',NULL,array('placeholder'=>'Enter date of birth'))}}</td>
          <td>{{Form::text('contactNumber',NULL,array('placeholder'=>'Enter contact Number'))}}</td>
          <td>{{Form::text('alternateContactNumber',NULL,array('placeholder'=>'Enter Alternate Contact Number'))}}</td>
          <td>{{Form::text('address',NULL,array('placeholder'=>'Enter Address'))}}</td>
          <td><select name="roleId">
            @if(count($roles = \App\Models\role::all())>0)
              @foreach($roles as  $role)
                @if($role->roleId==1)
                  <option value="$role->roleId" selected>{{$role->roleName}}</option>
                @else
                  <option value="$role->roleId">{{$role->roleName}}</option>
                @endif
              @endforeach
            @endif
          </select></td>
          <td>{{Form::text('bloodGroup',NULL,array('placeholder'=>'Enter Blood Group'))}}</td>
          <td>{{Form::text('identificationMark',NULL,array('placeholder'=>'Enter identification mark'))}}</td>
          <td>{{Form::text('parentNumber',NULL,array('placeholder'=>"Enter parent's number"))}}</td>
          <td>{{Form::text('homePhoneNumber',NULL,array('placeholder'=>'Enter Home Phone Number'))}}</td>
          <td>{{Form::text('fatherSpouseName',NULL,array('placeholder'=>"Enter Father's/Spouse's Name"))}}</td>
          <td>{{Form::text('motherName',NULL,array('placeholder'=>"Enter mother's name"))}}</td>
          <td>{{Form::text('guardianName',NULL,array('placeholder'=>"Enter Guardian's Name"))}}</td>
        </tr>
          {{Form::close()}}
      </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
