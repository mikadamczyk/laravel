@extends('layouts.scaffold')

@section('main')

<h1>Create Obslog</h1>

{{ Form::open(array('route' => 'obslogs.store')) }}
    <ul>
        <li>
            {{ Form::label('object_id', 'Object_id:') }}
            <!-- {{ Form::input('number', 'object_id') }} -->
            {{ Form::select('object_id', $objects) }}
        </li>

        <li>
            {{ Form::label('program_id', 'Program_id:') }}
            <!-- {{ Form::input('number', 'program_id') }} -->
            {{ Form::select('program_id', $programs) }}
        </li>

        <li>
            {{ Form::label('telescope_id', 'Telescope_id:') }}
            <!-- {{ Form::input('number', 'telescope_id') }} -->
            {{ Form::select('telescope_id', $telescopes) }}
        </li>

        <li>
            {{ Form::label('detector_id', 'Detector_id:') }}
            <!-- {{ Form::input('number', 'detector_id') }} -->
            {{ Form::select('detector_id', $detectors) }}
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


