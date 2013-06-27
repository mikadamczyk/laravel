@extends('layouts.scaffold')

@section('main')

<h1>Show Telescope</h1>

<p>{{ link_to_route('telescopes.index', 'Return to all telescopes') }}</p>

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
            <td>{{{ $telescope->deleted }}}</td>
					<td>{{{ $telescope->hidden }}}</td>
					<td>{{{ $telescope->name }}}</td>
                    <td>{{ link_to_route('telescopes.edit', 'Edit', array($telescope->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('telescopes.destroy', $telescope->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop