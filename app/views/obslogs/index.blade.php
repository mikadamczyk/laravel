@extends('layouts.scaffold')

@section('main')

<h1>All Obslogs</h1>

<p>{{ link_to_route('obslogs.create', 'Add new obslog') }}</p>

@if ($obslogs->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>User_id</th>
				<th>Object_id</th>
				<th>Program_id</th>
				<th>Telescope_id</th>
				<th>Detector_id</th>
				<th>Filter_id</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($obslogs as $obslog)
                <tr>
                    <td>{{{ $obslog->user_id }}}</td>
					<td>{{{ $obslog->object_id }}}</td>
					<td>{{{ $obslog->program_id }}}</td>
					<td>{{{ $obslog->telescope_id }}}</td>
					<td>{{{ $obslog->detector_id }}}</td>
					<td>{{{ $obslog->filter->name }}}</td>
                    <td>{{ link_to_route('obslogs.edit', 'Edit', array($obslog->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('obslogs.destroy', $obslog->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no obslogs
@endif

@stop