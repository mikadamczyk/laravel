@extends('layouts.scaffold')

@section('main')

<h1>Edit Autoguider</h1>
{{ Form::model($autoguider, array('method' => 'PATCH', 'route' => array('autoguiders.update', $autoguider->id),'class' => 'form-horizontal')) }}
<!--        <li>
            {{ Form::label('deleted', 'Deleted:') }}
             {{ Form::input('number', 'deleted') }} 
            {{ Form::checkbox('deleted', '1') }}
        </li>-->

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
            {{ Form::submit('Edit', array('class' => 'btn btn-info')) }}
            {{ link_to_route('autoguiders.show', 'Cancel', $autoguider->id, array('class' => 'btn')) }}
            </div>
        </div>

{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop