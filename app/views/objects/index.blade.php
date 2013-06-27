@extends('layouts.scaffold')

@section('main')

<h1>All Objects</h1>

<p>{{ link_to_route('objects.create', 'Add new object') }}</p>

@if ($objects->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Deleted</th>
				<th>Hidden</th>
				<th>Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($objects as $object)
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
            @endforeach
        </tbody>
    </table>
@else
    There are no objects
@endif

@stop