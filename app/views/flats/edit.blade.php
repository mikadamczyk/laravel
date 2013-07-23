@extends('layouts.scaffold')

@section('main')

<h1>Edit Flat</h1>
{{ Form::model($flat, array('method' => 'PATCH', 'route' => array('flats.update', $flat->id))) }}
    <ul>
        <li>
            {{ Form::label('deleted', 'Deleted:') }}
            <!-- {{ Form::input('number', 'deleted') }} -->
            {{ Form::checkbox('deleted', '1') }}
        </li>

        <li>
            {{ Form::label('hidden', 'Hidden:') }}
            <!-- {{ Form::input('number', 'hidden') }} -->
            {{ Form::checkbox('hidden', '1') }}
        </li>

        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('flats.show', 'Cancel', $flat->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop