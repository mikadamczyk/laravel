@extends('layouts.scaffold')

@section('main')

<h1>Create User</h1>

{{ Form::open(array('route' => 'users.store')) }}
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


