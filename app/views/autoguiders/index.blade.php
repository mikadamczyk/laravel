@extends('layouts.scaffold')

@section('main')

<h1>All Autoguiders</h1>

<!-- <p>{{ link_to_route('autoguiders.create', 'Add new autoguider') }}</p> -->
<p>
<a href="{{ route('autoguiders.create') }}" class="btn btn-success"><i class="icon-white icon-plus-sign"></i> 
Add new autoguider
</a>
</p>
@if ($autoguiders->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Deleted</th>
				<th>Hidden</th>
				<th>Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($autoguiders as $autoguider)
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
            @endforeach
        </tbody>
    </table>
@else
    There are no autoguiders
@endif

@stop