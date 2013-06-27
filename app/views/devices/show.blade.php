@extends('layouts.scaffold')

@section('main')

<h1>Show Device</h1>

<p>{{ link_to_route('devices.index', 'Return to all devices') }}</p>

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
            <td>{{{ $device->deleted }}}</td>
					<td>{{{ $device->hidden }}}</td>
					<td>{{{ $device->name }}}</td>
                    <td>{{ link_to_route('devices.edit', 'Edit', array($device->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('devices.destroy', $device->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop