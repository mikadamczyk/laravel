@extends('layouts.scaffold')

@section('main')

<h1>Show Flat</h1>

<p>{{ link_to_route('flats.index', 'Return to all flats') }}</p>

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
            <td>{{{ $flat->deleted }}}</td>
					<td>{{{ $flat->hidden }}}</td>
					<td>{{{ $flat->name }}}</td>
                    <td>{{ link_to_route('flats.edit', 'Edit', array($flat->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('flats.destroy', $flat->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop