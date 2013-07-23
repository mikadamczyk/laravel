@extends('layouts.scaffold')

@section('main')

<h1>Show Condition</h1>

<p>{{ link_to_route('conditions.index', 'Return to all conditions') }}</p>

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
            <td>{{{ $condition->deleted }}}</td>
					<td>{{{ $condition->hidden }}}</td>
					<td>{{{ $condition->name }}}</td>
                    <td>{{ link_to_route('conditions.edit', 'Edit', array($condition->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('conditions.destroy', $condition->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop