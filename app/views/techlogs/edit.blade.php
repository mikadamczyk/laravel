@extends('layouts.scaffold')

@section('main')

<h1>Edit Techlog</h1>
{{ Form::model($techlog, array('method' => 'PATCH', 'route' => array('techlogs.update', $techlog->id))) }}
    <ul>
        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::input('number', 'user_id') }}
        </li>

        <li>
            {{ Form::label('device_id', 'Device_id:') }}
            {{ Form::input('number', 'device_id') }}
        </li>

        <li>
            {{ Form::label('type_id', 'Type_id:') }}
            {{ Form::input('number', 'type_id') }}
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