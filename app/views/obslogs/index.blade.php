@extends('layouts.scaffold')

@section('main')

<h1>All Obslogs</h1>

<!-- <p>{{ link_to_route('obslogs.create', 'Add new obslog') }}</p> -->
<p>
<a href="{{ route('obslogs.create') }}" class="btn btn-success"><i class="icon-white icon-plus-sign"></i> 
Add new obslog
</a>
</p>
@if ($obslogs->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>User</th>
				<th>Object</th>
				<th>Program</th>
				<th>Actions</th>
				<th>Delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($obslogs as $obslog)
                <tr>
                    <td>{{{ $obslog->user->email }}}</td>
					<td>{{{ $obslog->object->name }}}</td>
					<td>{{{ $obslog->program->name }}}</td>
                    <td>
                    <div class="btn-group">
                        {{ link_to_route('obslogs.edit', 'Edit', array($obslog->id), array('class' => 'btn ')) }}
                        {{ link_to_route('obslogs.show', 'Show', array($obslog->id), array('class' => 'btn btn-info')) }}
                    </div>
                    </td>
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