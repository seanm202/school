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
          <button class="btn btn-primary" id="menu-toggle" style="position:fixed;">Toggle Menu</button>     {{ __('Section') }}    @if(Session::has('success'))
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
          <a href="#createSectionByAdmin" class="list-group-item list-group-item-action bg-light">Add Sections</a>
          <a href="#updateSectionByAdmin" class="list-group-item list-group-item-action bg-light">Update Sections</a>
        </li>
          </ul>
      </div>
    </div>
  </div>

    <div>

<!--

 -->
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

     $(".createSectionByAdmin").click(function(e){

         e.preventDefault();

         var form = $("#createSectionByAdmin");

         $.ajax({
            type:'POST',
            url:"{{ route('createSectionByAdmin') }}",
            data:form.serialize(),
            success: function(response){
      alert("jjjj");
            }
         });

     });


 </script>

    <div class="py-12" id="createSectionByAdmin">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Create sections

                    <form action="{{route('createSectionByAdmin')}}" method="POST" name="createSectionByAdmin" id="createSectionByAdmin">
                    {{ csrf_field() }}{{ method_field('POST') }}
                    {{Form::label('sectionName', 'Enter section name :')}}
                    {{Form::text('sectionName',NULL,array('placeholder'=>'Name of the section'))}}<br>
                    <button class="btn btn-success btn-createSectionByAdmin">Submit</button>
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

        $(".updateSectionByAdmin").click(function(e){

            e.preventDefault();

            var form = $("#updateSectionByAdmin");

            $.ajax({
               type:'POST',
               url:"{{ route('updateSectionByAdmin') }}",
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

        $(".deleteSectionByAdmin").click(function(e){

            e.preventDefault();

            var form = $("#deleteSectionByAdmin");

            $.ajax({
               type:'POST',
               url:"{{ route('deleteSectionByAdmin') }}",
               data:form.serialize(),
               success: function(response){
         alert("jjjj");
               }
            });

        });


    </script>
    <div class="py-12" id="updateSectionByAdmin">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Update sections
                  @if(count($sections=App\Models\section::where('sections.batchId','=',$currentBatchId)->get())>0)
                    <table>
                        <thead>
                          <tr>
                            <th>Section</th>
                            <th>Update</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach(($sections=App\Models\section::where('batchId','=',$currentBatchId)->get()) as $section)
                          <tr>
                            <form action="{{route('updateSectionByAdmin')}}" method="POST" name="updateSectionByAdmin" id="updateSectionByAdmin">
                            {{ csrf_field() }}{{ method_field('POST') }}
                            <td>{{Form::text('sectionName',$section->sectionName,array('placeholder'=>'Section Name'))}}</td>
                            {{Form::hidden('sectionId',$section->sectionId)}}
                            <td><button class="btn btn-success btn-updateSectionByAdmin">Update</button></td>
                            {{ Form::close() }}
                            <form action="{{route('deleteSectionByAdmin')}}" method="POST" name="deleteSectionByAdmin" id="deleteSectionByAdmin">
                            {{ csrf_field() }}{{ method_field('POST') }}
                            {{Form::hidden('sectionId',$section->sectionId)}}
                            <td><button class="btn btn-success btn-deleteSectionByAdmin">Delete</button></td>
                            {{ Form::close()}}
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
</div>
</div>
</div>

</x-app-layout>
