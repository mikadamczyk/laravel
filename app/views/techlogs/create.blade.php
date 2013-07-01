@extends('layouts.scaffold')

@section('main')
<script type="text/javascript">
$(document).ready(function() {
    $('.datepicker').datepicker()
});
</script>
<h1>Create Techlog</h1>

{{ Form::open(array('route' => 'techlogs.store')) }}
    <ul>
        <li>
            {{ Form::label('ed', 'Evening date:') }}
            {{ Form::text('ed', '' ,array('class'=>'datepicker')) }}
        </li>
        <li>
            {{ Form::label('jd', 'JD:') }}
            {{ Form::input('number', 'jd') }}
        </li>
        <li>
            {{ Form::label('user_id', 'User:') }}
            <!-- {{ Form::input('number', 'user_id') }} -->
            {{ Form::select('user_id', $users, Auth::user()->id) }}
        </li>

        <li>
            {{ Form::label('device_id', 'Device:') }}
            <!-- {{ Form::input('number', 'device_id') }} -->
            {{ Form::select('device_id', $devices) }}
        </li>

        <li>
            {{ Form::label('type_id', 'Type:') }}
            <!-- {{ Form::input('number', 'type_id') }} -->
            {{ Form::select('type_id', $types) }}
        </li>

        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title') }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description') }}
        </li>

        <li>
            {{ Form::label('try_to_fix', 'Try_to_fix:') }}
            {{ Form::textarea('try_to_fix') }}
        </li>

        <li>
            {{ Form::label('remarks', 'Remarks:') }}
            {{ Form::textarea('remarks') }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop


