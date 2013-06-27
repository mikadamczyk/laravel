@extends('layouts.scaffold')

@section('main')

<h1>All Programs</h1>

<p>{{ link_to_route('programs.create', 'Add new program') }}</p>

@if ($programs->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Deleted</th>
				<th>Hidden</th>
				<th>Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($programs as $program)
                <tr>
                    <td>{{{ $program->deleted }}}</td>
					<td>{{{ $program->hidden }}}</td>
					<td>{{{ $program->name }}}</td>
                    <td>{{ link_to_route('programs.edit', 'Edit', array($program->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('programs.destroy', $program->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no programs
@endif

@stop