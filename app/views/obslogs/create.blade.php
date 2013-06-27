@extends('layouts.scaffold')

@section('main')

<h1>Create Obslog</h1>

{{ Form::open(array('route' => 'obslogs.store')) }}
    <ul>
        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::input('number', 'user_id') }}
        </li>

        <li>
            {{ Form::label('object_id', 'Object_id:') }}
            {{ Form::input('number', 'object_id') }}
        </li>

        <li>
            {{ Form::label('program_id', 'Program_id:') }}
            {{ Form::input('number', 'program_id') }}
        </li>

        <li>
            {{ Form::label('telescope_id', 'Telescope_id:') }}
            {{ Form::input('number', 'telescope_id') }}
        </li>

        <li>
            {{ Form::label('detector_id', 'Detector_id:') }}
            {{ Form::input('number', 'detector_id') }}
        </li>

        <li>
            {{ Form::label('filter_id', 'Filter_id:') }}
            <!-- {{ Form::input('number', 'filter_id') }} -->
            {{ Form::select('filter_id', $filters) }}
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


