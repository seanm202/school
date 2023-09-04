<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Show today's absentees
                    {{Form::open(array('route' => 'showTodaysAbsentees')) }}
                    {{Form::submit('Show');}}
                    {{ Form::close() }}
<br>

                    <hr>

                      @isset($todaysAttendences)
                        @if(count($todaysAttendences)>0)
                          <table>
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Role</th>
                                  <th>Email</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach($todaysAttendences as $todaysAttendence)
                                    <tr>
                                      <td>{{$todaysAttendence->Name}}</td>
                                      <td>{{$todaysAttendence->roleName}}</td>
                                      <td>{{$todaysAttendence->Email}}</td>
                                    </tr>
                                  @endforeach
                              </tbody>
                          </table>
                        @else
                          List is empty
                        @endif
                      @endisset

                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Show absentees on :
                    {{Form::open(array('route' => 'showAbsenteesOn')) }}
                    {{Form::date('selectedDate', 'Select date : ')}}
                    {{Form::submit('Show');}}
                    {{ Form::close() }}

                    <br>
                                        <hr>

                                      @isset($attendences)
                                          @if(count($attendences)>0)
                                            <table>
                                              <thead>
                                                <tr>
                                                  <th>Name</th>
                                                  <th>Role</th>
                                                  <th>Email</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                  @foreach($attendences as $attendence)
                                                    <tr>
                                                      <td>{{$attendence->Name}}</td>
                                                      <td>{{$attendence->roleName}}</td>
                                                      <td>{{$attendence->Email}}</td>
                                                    </tr>
                                                  @endforeach
                                              </tbody>
                                          </table>
                                        @else
                                          List is empty
                                        @endif
                                      @endisset
                  </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Show absentees between two days :
                    {{Form::open(array('route' => 'showAbsenteesBetween')) }}
                    {{Form::label('fromDate', 'From :')}}
                    {{Form::date('fromDate')}}
                    {{Form::label('tillDate','To :')}}
                    {{Form::date('tillDate')}}
                    {{Form::submit('Show')}}
                    {{ Form::close() }}
<br>
                                        <hr>

                                      @isset($attendencesBetweens)
                                        @if(count($attendencesBetweens)>0)
                                          <table>
                                              <thead>
                                                <tr>
                                                  <th>Name</th>
                                                  <th>Role</th>
                                                  <th>Email</th>
                                                  <th>Date</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                  @foreach($attendencesBetweens as $attendencesBetween)
                                                    <tr>
                                                      <td>{{$attendencesBetween->Name}}</td>
                                                      <td>{{$attendencesBetween->roleName}}</td>
                                                      <td>{{$attendencesBetween->Email}}</td>
                                                      <td>{{$attendencesBetween->todaysDate}}</td>
                                                    </tr>
                                                  @endforeach
                                              </tbody>
                                          </table>
                                        @else
                                          List is empty
                                        @endif
                                      @endisset
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
