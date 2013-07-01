@extends('layouts.scaffold')

@section('main')

<h1>All Messages</h1>

<p>{{ link_to_route('messages.create', 'Add new message') }}</p>

@if ($messages->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>User_id</th>
				<th>Title</th>
				<th>Description</th>
				<th>Sticky</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($messages as $message)
                <tr>
                    <td>{{{ $message->user->real_name }}}</td>
					<td>{{{ $message->title }}}</td>
					<td>{{{ $message->description }}}</td>
					<td>{{{ $message->sticky }}}</td>
                    <td>{{ link_to_route('messages.edit', 'Edit', array($message->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                    @if ($message->sticky)
                    {{ link_to_route('unstick', 'Unstick', array($message->id), array('class' => 'btn btn-info')) }}
                    @else
                    {{ link_to_route('stick', 'Stick', array($message->id), array('class' => 'btn btn-info')) }}
                    @endif
                    </td>
<!--                     <td>
                        {{ Form::open(array('method' => 'POST', 'route' => array('stick', $message->id))) }}
                            {{ Form::submit('Stick', array('class' => 'btn btn-info')) }}
                        {{ Form::close() }}
                    </td> -->
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('messages.destroy', $message->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no messages
@endif

@stop