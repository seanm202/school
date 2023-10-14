<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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
            {{ __('Assignment') }}
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

    @if ( Auth::user()->role != 4)

        <script type="text/javascript">
        window.location = "{{url('logout')}}";//here double curly bracket
        </script>
      @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  View Contact Details of School Staff
              @if(count($staffDetails = \App\Models\detail::where('details.roleId','=',2)->orWhere('details.roleId','=',3)
                     ->where('details.batchId','=',1)
                     ->join('users','users.userId','=','details.userId')
                     ->select('details.firstname AS firstName',
                     'details.lastname AS lastName',
                     'details.contactNumber AS contactNumber',
                     'details.alternateContactNumber AS alternateContactNumber',
                     'users.userId AS userId',
                     'details.detailId AS detailId'
                      )
                     ->get())>0)
                     <table class="table">
                   <thead>
                       <tr>
                         <th>User Id</th>
                       <th>First Name</th>
                       <th>Last Name</th>
                       <th>Contact Number</th>
                       <th>Alternate Contact Number</th>
                       </tr>
                     </thead>
                   <tbody>
                  @foreach(($staffDetails = \App\Models\detail::where('details.roleId','=',2)->orWhere('details.roleId','=',3)
                         ->where('details.batchId','=',$currentBatchId)
                         ->join('users','users.userId','=','details.userId')
                         ->select('details.firstname AS firstName',
                         'details.lastname AS lastName',
                         'details.contactNumber AS contactNumber',
                         'details.alternateContactNumber AS alternateContactNumber',
                         'users.userId AS userId',
                         'details.detailId AS detailId'
                          )
                         ->get()) as $staffDetail)

                           <tr>
                             <td>{{$staffDetail->userId}}</td>
                           <td>{{$staffDetail->firstName}}</td>
                           <td>{{$staffDetail->lastName}}</td>
                           <td>{{$staffDetail->contactNumber}}</td>
                           <td>{{$staffDetail->alternateContactNumber}}</td>
                           </tr>
                  @endforeach
                </tbody>
              </table>

              @else
                <h3 style="color:red;">List is empty!</h3>
              @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
