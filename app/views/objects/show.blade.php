@extends('layouts.scaffold')

@section('main')

<h1>Show Object</h1>

<p>{{ link_to_route('objects.index', 'Return to all objects') }}</p>

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
            <td>{{{ $object->deleted }}}</td>
					<td>{{{ $object->hidden }}}</td>
					<td>{{{ $object->name }}}</td>
                    <td>{{ link_to_route('objects.edit', 'Edit', array($object->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('objects.destroy', $object->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop