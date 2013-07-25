@extends('layouts.scaffold')

@section('main')

<h1>Show Techlog</h1>

<!--<p>{{ link_to_route('techlogs.index', 'Return to all techlogs') }}</p>-->
<p>
<a href="{{ route('techlogs.index') }}" class="btn btn-success"><i class="icon-white icon-circle-arrow-left"></i> 
Return to all techlogs
</a>
</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th colspan="3">TECHNICAL LOG</th>
            <th>
                
                {{ Form::open(array('method' => 'DELETE', 'route' => array('techlogs.destroy', $techlog->id))) }}
                    <div class="controls">
                    {{ link_to_route('techlogs.edit', 'Edit', array($techlog->id), array('class' => 'btn btn-info')) }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    </div>
                {{ Form::close() }}
            </th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>Evening Date: {{{ $techlog->ed }}}</td>
            <td>JD: {{{ $techlog->jd }}}</td>
            <td colspan="2">Observer: {{{ $techlog->user->real_name }}}</td>
        </tr>
        <tr>
            <td>Tech log: {{{ $techlog->type->name }}}</td>
            <td>Device: {{{ $techlog->device->name }}}</td>
            <td>Title: {{{ $techlog->title }}}</td>
            <td>Send e-mail: -</td>
        </tr>
        <tr>
            <td colspan="4">Description: {{{ $techlog->description }}}</td>
        </tr>
        <tr>
            <td colspan="4">Try to fix: {{{ $techlog->try_to_fix }}}</td>
        </tr>
        <tr>
            <td colspan="4">Remarks for Future: {{{ $techlog->remarks }}}</td>
        </tr>
<!--        <tr>
            <td>{{ link_to_route('techlogs.edit', 'Edit', array($techlog->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('techlogs.destroy', $techlog->id))) }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
        </tr>-->
    </tbody>
</table>

@stop