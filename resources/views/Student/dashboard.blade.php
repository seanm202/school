<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You'red logged in") }} {{ Auth::user()->name }}!
                </div>
            </div>
        </div>
    </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                      @if(($att = \App\Models\attendence::where('userId','=',Auth()->user()->userId)->where('todaysDate','=',date('Y-m-d'))->first())==NULL)
                        {{ Form::open(array('route' => 'markAttendance')) }}
                        {{Form::label('inOrOut', 'Present')}}{{Form::radio('inOrOut', 1)}}
                        <br>
                        {{Form::hidden('userRole',4)}}}}
                        {{Form::label('inOrOut', 'Absent')}}{{Form::radio('inOrOut', 0,'checked')}}
                        <br>
                        {{Form::submit('Mark Attendance');}}
                        {{ Form::close() }}
                      @elseif(($att = \App\Models\attendence::where('userId','=',Auth()->user()->userId)->where('todaysDate','=',date('Y-m-d'))->first())->dailyReg==0)
                        {{ Form::open(array('route' => 'markAttendance')) }}
                        {{Form::label('inOrOut', 'Present')}}{{Form::radio('inOrOut', 1)}}
                        <br>
                        {{Form::hidden('userRole',4)}}}}
                        {{Form::label('inOrOut', 'Absent')}}{{Form::radio('inOrOut', 0,'checked')}}
                        <br>
                        {{Form::submit('Mark Attendance');}}
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
