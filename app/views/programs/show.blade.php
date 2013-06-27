@extends('layouts.scaffold')

@section('main')

<h1>Show Program</h1>

<p>{{ link_to_route('programs.index', 'Return to all programs') }}</p>

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
            <td>{{{ $program->deleted }}}</td>
					<td>{{{ $program->hidden }}}</td>
					<td>{{{ $program->name }}}</td>
                    <td>{{ link_to_route('programs.edit', 'Edit', array($program->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('programs.destroy', $program->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop