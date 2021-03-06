@extends('layouts.scaffold')

@section('main')
{{ HTML::script('assets/js/ed2jd.js') }}
<h1>Create Obslog</h1>

{{ Form::open(array('route' => 'obslogs.store', 'class' => 'form-horizontal')) }}
        <div class="control-group">
            {{ Form::label('ed', 'Evening date:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::text('ed', date("Y-n-j") ,array('class'=>'datepicker')) }}
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
            {{ Form::label('firsthalf_id', 'I Half of night:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::select('firsthalf_id', $conditions) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('secondhalf_id', 'II Half of night:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::select('secondhalf_id', $conditions) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('obs_hours', 'Total Observing Hours at Night:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::text('obs_hours', $value = null) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('sqm', 'SQM:', array('class'=>'control-label')) }}
            <div class="controls">
                 {{ Form::text('sqm') }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('telescope_id', 'Telescope:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::select('telescope_id', $telescopes) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('detector_id', 'Detector:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::select('detector_id', $detectors) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('eveningflat_id', 'Evening FLAT:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::select('eveningflat_id', $flats) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('morningflat_id', 'Morning FLAT:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::select('morningflat_id', $flats) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('object_id', 'Object:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::select('object_id', $objects) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('program_id', 'Program:' , array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::select('program_id', $programs) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('autoguider_id', 'Autoguider:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::select('autoguider_id', $autoguiders) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('ares', 'ARES:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::select('ares', $ares) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('filter_id', 'Filter:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::select('filter_id', $filters) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('ut_start', 'UT Start:', array('class'=>'control-label')) }}
            <div class="controls input-appen bootstrap-timepicker">
                {{ Form::text('ut_start', '' ,array('class'=>'timepicker-default', 'id'=>'ut_start')) }}
                <span class="add-on"><i class="icon-time"></i></span>
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('ut_stop', 'UT Stop:', array('class'=>'control-label')) }}
            <div class="controls input-appen bootstrap-timepicker">
                {{ Form::text('ut_stop', '' ,array('class'=>'timepicker-default', 'id'=>'ut_stop')) }}
                <span class="add-on"><i class="icon-time"></i></span>
            </div>
        </div>
 
        <div class="control-group">
            {{ Form::label('comments', 'Coments for object:', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::textarea('comments') }}
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
            {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
            {{ link_to_route('obslogs.index', 'Cancel', null, array('class' => 'btn')) }}
            </div>
        </div>

    {{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop