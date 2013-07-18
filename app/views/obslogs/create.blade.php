@extends('layouts.scaffold')

@section('main')
<script type="text/javascript">
$(document).ready(function() {
    $('.datepicker').datepicker()
});
</script>
<h1>Create Obslog</h1>

{{ Form::open(array('route' => 'obslogs.store', 'class' => 'form-horizontal')) }}
        <div class="control-group">
            {{ Form::label('ed', 'Evening date:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::text('ed', '' ,array('class'=>'datepicker')) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('jd', 'JD:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::input('number', 'jd', null, array('disabled' => 'disabled')) }}
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
            {{ Form::label('user_id', 'User:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::select('user_id', $users, Auth::user()->id) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('tech_problem', 'Technical problem:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::select('tech_problem', array(0=>'No', 1=>'Yes'), 0) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('obs_hours', 'Total Observing Hours at Night:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::text('obs_hours', $value = null) }}
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
            {{ Form::submit('Submit', array('class' => 'btn')) }}
            </div>
        </div>

    {{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop