@extends('layouts.scaffold')

@section('main')

<h1>Show Detector</h1>

<p>{{ link_to_route('detectors.index', 'Return to all detectors') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Deleted</th>
				<th>Hidden</th>
				<th>Name</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $detector->deleted }}}</td>
					<td>{{{ $detector->hidden }}}</td>
					<td>{{{ $detector->name }}}</td>
                    <td>{{ link_to_route('detectors.edit', 'Edit', array($detector->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('detectors.destroy', $detector->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop