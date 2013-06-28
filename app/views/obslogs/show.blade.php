@extends('layouts.scaffold')

@section('main')

<h1>Show Obslog</h1>

<!-- <p>{{ link_to_route('obslogs.index', 'Return to all obslogs') }}</p> -->
<p>
<a href="{{ route('obslogs.index') }}" class="btn btn-success"><i class="icon-white icon-circle-arrow-left"></i> 
Return to all obslogs
</a>
</p>

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
        <tr>
            <td>{{{ $obslog->user_id }}}</td>
					<td>{{{ $obslog->object_id }}}</td>
					<td>{{{ $obslog->program_id }}}</td>
					<td>{{{ $obslog->telescope_id }}}</td>
					<td>{{{ $obslog->detector_id }}}</td>
					<td>{{{ $obslog->filter_id }}}</td>
                    <td>{{ link_to_route('obslogs.edit', 'Edit', array($obslog->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('obslogs.destroy', $obslog->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop