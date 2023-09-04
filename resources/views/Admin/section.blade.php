<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Section') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Create sections
                    {{Form::open(array('route' => 'createSectionByAdmin')) }}
                    {{Form::label('sectionName', 'Enter section name :')}}
                    {{Form::text('sectionName',NULL,array('placeholder'=>'Name of the section'))}}
                    {{Form::submit('Create section')}}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Update sections
                    <table>
                        <thead>
                          <tr>
                            <th>Section</th>
                            <th>Update</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach(App\Models\section::all() as $section)
                          <tr>
                            <td>{{$section->sectionName}}</td>
                            <td>{{Form::open(array('route' => 'updateSectionByAdmin')) }}
                            {{Form::text('sectionName',$section->sectionName)}}
                            {{Form::hidden('roleId',$section->sectionId)}}
                            {{Form::submit('Update Section')}}
                            {{ Form::close() }}</td>
                            <td>{{Form::open(array('route' => 'deleteSectionByAdmin')) }}
                            {{Form::hidden('sectionId',$section->sectionId)}}
                            {{Form::submit('Delete section')}}
                            {{ Form::close()}}</td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
