@extends('layouts.scaffold')

@section('main')

<h1>Create Filter</h1>

{{ Form::open(array('route' => 'filters.store')) }}
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


