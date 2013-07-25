@extends('layouts.scaffold')

@section('main')
{{ HTML::script('assets/js/ed2jd.js') }}
<h1>Edit Techlog</h1>
{{ Form::model($techlog, array('method' => 'PATCH', 'route' => array('techlogs.update', $techlog->id), 'class' => 'form-horizontal')) }}
        <div class="control-group">
            {{ Form::label('ed', 'Evening date:', array('class'=>'control-label')) }}
            <div class="controls">
            {{ Form::text('ed', $techlog['ed'] ,array('class'=>'datepicker')) }}
            </div>
        </div>
        <div class="control-group">
            {{ Form::label('jd', 'JD:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::input('number', 'jd') }}
            </div>
        </div>    
        <div class="control-group">
            {{ Form::label('user_id', 'User:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::select('user_id', $users, Auth::user()->id) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('device_id', 'Device:', array('class'=>'control-label')) }}
            <div class="controls">
            {{ Form::select('device_id', $devices) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('type_id', 'Type:', array('class'=>'control-label')) }}
            <div class="controls">
            {{ Form::select('type_id', $types) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('title', 'Title:', array('class'=>'control-label')) }}
            <div class="controls">
            {{ Form::text('title') }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('description', 'Description:', array('class'=>'control-label')) }}
            <div class="controls">
            {{ Form::textarea('description') }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('try_to_fix', 'Try_to_fix:', array('class'=>'control-label')) }}
            <div class="controls">
            {{ Form::textarea('try_to_fix') }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('remarks', 'Remarks:', array('class'=>'control-label')) }}
            <div class="controls">
            {{ Form::textarea('remarks') }}
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('techlogs.show', 'Cancel', $techlog->id, array('class' => 'btn')) }}
            </div>
        </div>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop