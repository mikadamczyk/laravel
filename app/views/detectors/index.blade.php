@extends('layouts.scaffold')

@section('main')

<h1>All Detectors</h1>

<p>{{ link_to_route('detectors.create', 'Add new detector') }}</p>

@if ($detectors->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Deleted</th>
				<th>Hidden</th>
				<th>Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($detectors as $detector)
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
            @endforeach
        </tbody>
    </table>
@else
    There are no detectors
@endif

@stop