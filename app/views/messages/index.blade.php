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
				<th>Actions</th>
				<th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($messages as $message)
                <tr>
                    <td>{{{ $message->user->real_name }}}</td>
					<td>{{{ $message->title }}}</td>
					<td>{{{ $message->description }}}</td>
                    <td>
                    <div class="btn-group">
                        {{ link_to_route('messages.edit', 'Edit', array($message->id), array('class' => 'btn')) }}
                        {{ link_to_route('messages.show', 'Show', array($message->id), array('class' => 'btn btn-primary')) }}
                        @if ($message->sticky)
                            {{ link_to_route('unstick', 'Unstick', array($message->id), array('class' => 'btn btn-warning')) }}
                        @else
                            {{ link_to_route('stick', 'Stick', array($message->id), array('class' => 'btn btn-warning')) }}
                        @endif                        
                    </div>
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