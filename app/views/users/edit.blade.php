@extends('layouts.scaffold')

@section('main')

<h1>Edit User</h1>
{{ Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id))) }}
    <ul>
        <li>
            {{ Form::label('real_name', 'Name:') }}
            {{ Form::text('real_name') }}
        </li>
    
        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::email('email') }}
        </li>
        
        <li>
            {{ Form::label('password', 'Password:') }}
            {{ Form::input('password', 'password') }}
        </li>
        
        <li>
            {{ Form::label('password_confirmation', 'Password confirmation:') }}
            {{ Form::input('password', 'password_confirmation') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('users.show', 'Cancel', $user->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop