@extends('layouts.scaffold')

@section('main')

<h1>Show Autoguider</h1>

<p>{{ link_to_route('autoguiders.index', 'Return to all autoguiders') }}</p>

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
            <td>{{{ $autoguider->deleted }}}</td>
					<td>{{{ $autoguider->hidden }}}</td>
					<td>{{{ $autoguider->name }}}</td>
                    <td>{{ link_to_route('autoguiders.edit', 'Edit', array($autoguider->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('autoguiders.destroy', $autoguider->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop