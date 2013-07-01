@extends('layouts.scaffold')

@section('main')
<h1>Edit Techlog</h1>
{{ Form::model($techlog, array('method' => 'PATCH', 'route' => array('techlogs.update', $techlog->id))) }}
    <ul>
        <li>
            {{ Form::label('ed', 'Evening date:') }}
            {{ Form::text('ed', $techlog['ed'] ,array('class'=>'datepicker')) }}
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
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('techlogs.show', 'Cancel', $techlog->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop