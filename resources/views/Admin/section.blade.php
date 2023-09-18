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
            {{ __('Section') }}    @if(Session::has('success'))
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
                    {{Form::text('sectionName',NULL,array('placeholder'=>'Name of the section'))}}
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
                  @if(count($sections=App\Models\section::where('sections.batchId','=',$currentBatchId->batchId)->get())>0)
                    <table>
                        <thead>
                          <tr>
                            <th>Section</th>
                            <th>Update</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach(($sections=App\Models\section::where('batchId','=',$currentBatchId->batchId)->get()) as $section)
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
</x-app-layout>
