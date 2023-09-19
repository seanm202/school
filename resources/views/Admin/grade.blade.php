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
            <button class="btn btn-primary" id="menu-toggle" style="position:fixed;">Toggle Menu</button>   {{ __('Grade') }}   @if(Session::has('success'))
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
          <a href="#createGradeByAdmin" class="list-group-item list-group-item-action bg-light">Add Grade</a>
          <a href="#updateGradeByAdmin" class="list-group-item list-group-item-action bg-light">Edit / Delete Grade</a>
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


 <script type="text/javascript">

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

     $(".createGradeByAdmin").click(function(e){

         e.preventDefault();

         var form = $("#createGradeByAdmin");

         $.ajax({
            type:'POST',
            url:"{{ route('createGradeByAdmin') }}",
            data:form.serialize(),
            success: function(response){
      alert("jjjj");
            }
         });

     });


 </script>

    <div class="py-12" id="createGradeByAdmin">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Create grade
                    <form action="{{route('createGradeByAdmin')}}" method="POST" name="createGradeByAdmin" id="createGradeByAdmin">
                    {{ csrf_field() }}{{ method_field('POST') }}
                    {{Form::label('gradeName', 'Enter grade name :')}}
                    {{Form::text('gradeName',NULL,array('placeholder'=>'Name of the grade'))}}

                    <button class="btn btn-success btn-createGradeByAdmin">Submit</button>
                    {{ Form::close() }}
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

         $(".updateGradeByAdmin").click(function(e){

             e.preventDefault();

             var form = $("#updateGradeByAdmin");

             $.ajax({
                type:'POST',
                url:"{{ route('updateGradeByAdmin') }}",
                data:form.serialize(),
                success: function(response){
          alert("jjjj");
                }
             });

         });


     </script>

    <div class="py-12" id="updateGradeByAdmin">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Update roles
                    @if(count(App\Models\grade::where('grades.batchId','=',$currentBatchId)->get())>0)<table>
                        <thead>
                          <tr>
                            <th>Grade Name</th>
                            <th>Update</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach(App\Models\grade::where('grades.batchId','=',$currentBatchId)->get() as $grade)
                          <tr>
                            <form action="{{route('updateGradeByAdmin')}}" method="POST" name="updateGradeByAdmin" id="updateGradeByAdmin">
                            {{ csrf_field() }}{{ method_field('POST') }}
                            <td>{{Form::text('gradeName',$grade->grade)}}</td>
                            {{Form::hidden('gradeId',$grade->gradeId)}}

                              <td><button class="btn btn-success btn-updateGradeByAdmin">Submit</button>

                            {{ Form::close() }}</td>
                            <form action="{{route('deleteGradeByAdmin')}}" method="POST" name="deleteGradeByAdmin" id="deleteGradeByAdmin">
                            {{ csrf_field() }}{{ method_field('POST') }}
                            {{Form::hidden('gradeId',$grade->gradeId)}}
                            <td><button class="btn btn-success btn-deleteGradeByAdmin">Delete</button>
                            {{ Form::close() }}</td>
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
</div>
</div>
</div>

</x-app-layout>
