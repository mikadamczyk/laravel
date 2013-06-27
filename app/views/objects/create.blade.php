@extends('layouts.scaffold')

@section('main')

<h1>Create Object</h1>

{{ Form::open(array('route' => 'objects.store')) }}
    <ul>
        <li>
            {{ Form::label('deleted', 'Deleted:') }}
            {{ Form::input('number', 'deleted') }}
        </li>

        <li>
            {{ Form::label('hidden', 'Hidden:') }}
            {{ Form::input('number', 'hidden') }}
        </li>

        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
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


