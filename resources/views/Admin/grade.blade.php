<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Create grade
                    {{Form::open(array('route' => 'createGradeByAdmin')) }}
                    {{Form::label('gradeName', 'Enter grade name :')}}
                    {{Form::text('gradeName',NULL,array('placeholder'=>'Name of the grade'))}}
                    {{Form::submit('Create Grade')}}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Update roles
                    <table>
                        <thead>
                          <tr>
                            <th>Grade Name</th>
                            <th>Update</th>
                            <!-- <th>Delete</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          @foreach(App\Models\grade::all() as $grade)
                          <tr>
                            <td>{{$grade->grade}}</td>
                            <td>{{Form::open(array('route' => 'updateGradeByAdmin')) }}
                            {{Form::text('gradeName',$grade->grade)}}
                            {{Form::hidden('gradeId',$grade->gradeId)}}
                            {{Form::submit('Update Grade')}}
                            {{ Form::close() }}</td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
