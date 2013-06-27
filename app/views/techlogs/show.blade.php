@extends('layouts.scaffold')

@section('main')

<h1>Show Techlog</h1>

<p>{{ link_to_route('techlogs.index', 'Return to all techlogs') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>User_id</th>
				<th>Device_id</th>
				<th>Type_id</th>
				<th>Title</th>
				<th>Description</th>
				<th>Try_to_fix</th>
				<th>Remarks</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $techlog->user_id }}}</td>
					<td>{{{ $techlog->device_id }}}</td>
					<td>{{{ $techlog->type_id }}}</td>
					<td>{{{ $techlog->title }}}</td>
					<td>{{{ $techlog->description }}}</td>
					<td>{{{ $techlog->try_to_fix }}}</td>
					<td>{{{ $techlog->remarks }}}</td>
                    <td>{{ link_to_route('techlogs.edit', 'Edit', array($techlog->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('techlogs.destroy', $techlog->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop