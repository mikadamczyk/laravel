@extends('layouts.scaffold')

@section('main')
<h1>Show Autoguider</h1>

<!--<p>{{ link_to_route('autoguiders.index', 'Return to all autoguiders') }}</p>-->
<p>
<a href="{{ route('autoguiders.index') }}" class="btn btn-success"><i class="icon-white icon-circle-arrow-left"></i> 
Return to all Autoguiders Options
</a>
</p>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Hidden</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $autoguider->name }}}</td>
            <td class="hiddenCol">{{{ $autoguider->hidden ? 'Yes' : 'No'}}}</td>
            <td>{{ link_to_route('autoguiders.edit', 'Edit', array($autoguider->id), array('class' => 'btn btn-info')) }}</td>
            <td>{{ link_to_route('toogleObj', $autoguider->hidden ? 'Show' : 'Hide', array($autoguider->id, 'autoguider'), array('class' => 'ajax-link btn btn-primary')) }}</td>
<!--            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('autoguiders.destroy', $autoguider->id))) }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>-->
        </tr>
    </tbody>
</table>

@stop