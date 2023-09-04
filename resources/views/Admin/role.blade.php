<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Create roles
                    {{Form::open(array('route' => 'createRoleByAdmin')) }}
                    {{Form::label('roleName', 'Enter role name :')}}
                    {{Form::text('roleName',NULL,array('placeholder'=>'Name of the role'))}}
                    {{Form::submit('Create Role')}}
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
                            <th>Role Name</th>
                            <th>Update</th>
                            <!-- <th>Delete</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          @foreach(App\Models\role::all() as $role)
                          <tr>
                            <td>{{$role->roleName}}</td>
                            <td>{{Form::open(array('route' => 'updateRoleByAdmin')) }}
                            {{Form::text('roleName',$role->roleName)}}
                            {{Form::hidden('roleId',$role->roleId)}}
                            {{Form::submit('Update Role')}}
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
