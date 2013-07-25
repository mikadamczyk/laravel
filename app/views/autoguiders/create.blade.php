@extends('layouts.scaffold')

@section('main')

<h1>Create Autoguider</h1>

{{ Form::open(array('route' => 'autoguiders.store', 'class' => 'form-horizontal')) }}
<!--        <div class="control-group">
            {{ Form::label('deleted', 'Deleted:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::checkbox('deleted', '1') }}
            </div>
        </div>-->
        <div class="control-group">
            {{ Form::label('name', 'Name:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::text('name') }}
            </div>
        </div>  

        <div class="control-group">
            {{ Form::label('hidden', 'Hidden:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::checkbox('hidden', '1') }}
            </div>
        </div>            

        <div class="control-group">
            <div class="controls">
            {{ Form::submit('Create', array('class' => 'btn btn-info')) }}
            {{ link_to_route('autoguiders.index', 'Cancel', null, array('class' => 'btn')) }}
            </div>
        </div>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop


