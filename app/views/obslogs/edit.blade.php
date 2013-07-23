@extends('layouts.scaffold')

@section('main')
{{ HTML::script('assets/js/ed2jd.js') }}

<h1>Edit Obslog</h1>
{{ Form::model($obslog, array('method' => 'PATCH', 'route' => array('obslogs.update', $obslog->id), 'class' => 'form-horizontal')) }}
        <div class="control-group">
            {{ Form::label('ed', 'Evening date:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::text('ed', $obslog['ed'] ,array('class'=>'datepicker')) }}
            </div>
        </div>
        
        <div class="control-group">
            {{ Form::label('jd', 'JD:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::input('number', 'jd', null, array('disabled' => 'disabled')) }}
            </div>
        </div>
        
        <div class="control-group">
            {{ Form::label('tech_problem', 'Technical problem:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::select('tech_problem', array(0=>'No', 1=>'Yes'), 0) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('user_id', 'User:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::select('user_id', $users, Auth::user()->id) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('first_half', 'I Half of night:', array('class'=>'control-label')) }}
            <!-- {{ Form::input('number', 'filter_id') }} -->
            <div class="controls">
                {{ Form::select('first_half', $conditions) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('second_half', 'II Half of night:', array('class'=>'control-label')) }}
            <!-- {{ Form::input('number', 'filter_id') }} -->
            <div class="controls">
                {{ Form::select('second_half', $conditions) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('obs_hours', 'Total Observing Hours at Night:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::text('obs_hours') }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('object_id', 'Object:', array('class'=>'control-label')) }}
            <!-- {{ Form::input('number', 'object_id') }} -->
            <div class="controls">
                {{ Form::select('object_id', $objects) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('program_id', 'Program:' , array('class'=>'control-label')) }}
            <!-- {{ Form::input('number', 'program_id') }} -->
            <div class="controls">
                {{ Form::select('program_id', $programs) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('telescope_id', 'Telescope:', array('class'=>'control-label')) }}
            <!-- {{ Form::input('number', 'telescope_id') }} -->
            <div class="controls">
                {{ Form::select('telescope_id', $telescopes) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('detector_id', 'Detector:', array('class'=>'control-label')) }}
            <!-- {{ Form::input('number', 'detector_id') }} -->
            <div class="controls">
                {{ Form::select('detector_id', $detectors) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('filter_id', 'Filter:', array('class'=>'control-label')) }}
            <!-- {{ Form::input('number', 'filter_id') }} -->
            <div class="controls">
                {{ Form::select('filter_id', $filters) }}
            </div>
        </div>
        
        <div class="control-group">
            <div class="controls">
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('obslogs.show', 'Cancel', $obslog->id, array('class' => 'btn')) }}
            </div>
        </div>

    {{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop