@extends('layouts.scaffold')

@section('main')

<h1>All Filters</h1>

<!-- <p>{{ link_to_route('filters.create', 'Add new filter') }}</p> -->
<p>
<a href="{{ route('filters.create') }}" class="btn btn-success"><i class="icon-white icon-plus-sign"></i> 
Add new filter
</a>
</p>
@if ($filters->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Deleted</th>
				<th>Hidden</th>
				<th>Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($filters as $filter)
                <tr>
                    <td>{{{ $filter->deleted }}}</td>
					<td>{{{ $filter->hidden }}}</td>
					<td>{{{ $filter->name }}}</td>
                    <td>{{ link_to_route('filters.edit', 'Edit', array($filter->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('filters.destroy', $filter->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no filters
@endif

@stop