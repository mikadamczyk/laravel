@extends('layouts.scaffold')

@section('main')

<h1>Edit Obslog</h1>
{{ Form::model($obslog, array('method' => 'PATCH', 'route' => array('obslogs.update', $obslog->id))) }}
    <ul>
        <li>
            {{ Form::label('object_id', 'Object:') }}
            <!-- {{ Form::input('number', 'object_id') }} -->
            {{ Form::select('object_id', $objects) }}
        </li>

        <li>
            {{ Form::label('program_id', 'Program:') }}
            <!-- {{ Form::input('number', 'program_id') }} -->
            {{ Form::select('program_id', $programs) }}
        </li>

        <li>
            {{ Form::label('telescope_id', 'Telescope:') }}
            <!-- {{ Form::input('number', 'telescope_id') }} -->
            {{ Form::select('telescope_id', $telescopes) }}
        </li>

        <li>
            {{ Form::label('detector_id', 'Detector:') }}
            <!-- {{ Form::input('number', 'detector_id') }} -->
            {{ Form::select('detector_id', $detectors) }}
        </li>

        <li>
            {{ Form::label('filter_id', 'Filter:') }}
            <!-- {{ Form::input('number', 'filter_id') }} -->
            {{ Form::select('filter_id', $filters) }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('obslogs.show', 'Cancel', $obslog->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop