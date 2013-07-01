@extends('layouts.scaffold')

@section('main')

<h1>Edit Message</h1>
{{ Form::model($message, array('method' => 'PATCH', 'route' => array('messages.update', $message->id))) }}
    <ul>
        <li>
            {{ Form::label('user_id', 'User:') }}
            <!-- {{ Form::input('number', 'user_id') }} -->
            {{ Form::select('user_id', $users, Auth::user()->id) }}
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
            {{ Form::label('sticky', 'Sticky:') }}
            <!-- {{ Form::input('number', 'sticky') }} -->
            {{ Form::select('sticky', array('0'=>'No', '1'=>'Yes'), 1) }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('messages.show', 'Cancel', $message->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop