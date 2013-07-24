@extends('layouts.scaffold')

@section('main')

<h1>Show Obslog</h1>

<!-- <p>{{ link_to_route('obslogs.index', 'Return to all obslogs') }}</p> -->
<p>
<a href="{{ route('obslogs.index') }}" class="btn btn-success"><i class="icon-white icon-circle-arrow-left"></i> 
Return to all obslogs
</a>
</p>
    <?php 
//    print_r($obslog->firsthalf); die();
    ?>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th colspan="3">OBSERVATION LOG</th>
            <th>
                
                {{ Form::open(array('method' => 'DELETE', 'route' => array('obslogs.destroy', $obslog->id))) }}
                    <div class="controls">
                    {{ link_to_route('obslogs.edit', 'Edit', array($obslog->id), array('class' => 'btn btn-info')) }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    </div>
                {{ Form::close() }}
            </th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>ED: {{{ $obslog->ed }}}</td>
            <td>JD: {{{ $obslog->jd }}}</td>
            <td>Tech problem: {{{ $obslog->tech_problem }}}</td>
            <td>Observer: {{{ $obslog->user->email }}}</td>
        </tr>
        <tr>
            <td>It half of night: {{{ $obslog->firsthalf->name }}}</td>
            <td>II Half of night: {{{ $obslog->second_half->name}}}</td>
            <td colspan="2">Total Observing Hours: {{{ $obslog->obs_hours }}}</td>
        </tr>
        <tr>
            <td>Telescop: {{{ $obslog->telescope->name }}}</td>
            <td>Detector: {{{ $obslog->detector->name }}}</td>
            <td>Evening FLAT: {{{ $obslog->eveningflat->name }}}</td>
            <td>Morning FLAT: {{{ $obslog->morningflat->name }}}</td>
        </tr>
        <tr>
            <td>Object: {{{ $obslog->object->name }}}</td>
            <td>Program: {{{ $obslog->program->name }}}</td>
            <td>Autoguider: {{{ $obslog->autoguider->name }}}</td>
            <td>ARES: {{{ $obslog->ares }}}</td>
        </tr>
        <tr>
            <td>Filter: {{{ $obslog->filter->name }}}</td>
            <td>UT start: {{{ $obslog->ut_start }}}</td>
            <td>Ut stop: {{{ $obslog->ut_stop }}}</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4">Coments for object: {{{ $obslog->comments }}}</td>
        </tr>
    </tbody>
</table>

@stop