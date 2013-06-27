@extends('layouts.scaffold')

@section('main')

<h1>All Devices</h1>

<p>{{ link_to_route('devices.create', 'Add new device') }}</p>

@if ($devices->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Deleted</th>
				<th>Hidden</th>
				<th>Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($devices as $device)
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
            @endforeach
        </tbody>
    </table>
@else
    There are no devices
@endif

@stop