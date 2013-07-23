@extends('layouts.scaffold')

@section('main')

<h1>All Flats</h1>

<!-- <p>{{ link_to_route('flats.create', 'Add new flat') }}</p> -->
<p>
<a href="{{ route('flats.create') }}" class="btn btn-success"><i class="icon-white icon-plus-sign"></i> 
Add new flat
</a>
</p>
@if ($flats->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Deleted</th>
				<th>Hidden</th>
				<th>Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($flats as $flat)
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
            @endforeach
        </tbody>
    </table>
@else
    There are no flats
@endif

@stop