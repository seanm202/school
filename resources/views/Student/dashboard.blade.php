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
            {{ __('Dashboard') }}
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

        @if ( Auth::user()->role != 2)

            <script type="text/javascript">
            window.location = "{{url('logout')}}";//here double curly bracket
            </script>
          @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You'red logged in") }} {{ Auth::user()->name }}!
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

         $(".markAttendance").click(function(e){

             e.preventDefault();

             var form = $("#markAttendance");

             $.ajax({
                type:'POST',
                url:"{{ route('markAttendance') }}",
                data:form.serialize(),
                success: function(response){
          alert("jjjj");
                }
             });

         });


     </script>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">   @if(Session::has('success'))
        <div class="alert alert-success" style="position: fixed;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif
                      @if(($att = \App\Models\attendence::where('userId','=',Auth()->user()->userId)->where('attendences.batchId','=',$currentBatchId)->where('todaysDate','=',date('Y-m-d'))->first())==NULL)
                      <form action="{{route('markAttendance')}}" method="POST" name="markAttendance" id="markAttendance">
                      {{ csrf_field() }}{{ method_field('POST') }}
                        {{Form::label('inOrOut', 'Present')}}{{Form::radio('inOrOut', 1)}}
                        <br>
                        {{Form::hidden('userRole',4)}}
                        {{Form::label('inOrOut', 'Absent')}}{{Form::radio('inOrOut', 0,'checked')}}
                        <br>
                        <button class="btn btn-success btn-addAdminAdmin">Mark Attendance</button>
                        {{ Form::close() }}
                      @elseif(($att = \App\Models\attendence::where('userId','=',Auth()->user()->userId)->where('attendences.batchId','=',$currentBatchId)->where('todaysDate','=',date('Y-m-d'))->first())->dailyReg==0)
                      <form action="{{route('markAttendance')}}" method="POST" name="markAttendance" id="markAttendance">
                      {{ csrf_field() }}{{ method_field('POST') }}
                        {{Form::label('inOrOut', 'Present')}}{{Form::radio('inOrOut', 1)}}
                        <br>
                        {{Form::hidden('userRole',4)}}}}
                        {{Form::label('inOrOut', 'Absent')}}{{Form::radio('inOrOut', 0,'checked')}}
                        <br>
                        <button class="btn btn-success btn-addAdminAdmin">Mark Attendance</button>
                        {{ Form::close() }}
                      @else
                        {{ Form::open() }}
                        {{ Form::label('attendance', 'Attendance Marked ? ');}}<input type="checkbox" name="loggedInOrOut" checked="checked;" disabled="false"/>
                        {{ Form::close() }}
                      @endif
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
