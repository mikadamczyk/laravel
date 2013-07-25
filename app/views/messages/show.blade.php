@extends('layouts.scaffold')

@section('main')

<h1>Show Message</h1>

<!--<p>{{ link_to_route('messages.index', 'Return to all messages') }}</p>-->
<p>
<a href="{{ route('messages.index') }}" class="btn btn-success"><i class="icon-white icon-circle-arrow-left"></i> 
Return to all Messages
</a>
</p>
<div class="well">
    <h4>
        <?php echo $message->sticky ? 'Sticky' : 'Unsticky' ?> Message:
        {{{ $message->title }}}
    </h4>
    <p>
        {{{ $message->user->real_name }}}: {{{ $message->description }}}
    </p>
    <div class="controls">
        {{ Form::open(array('method' => 'DELETE', 'route' => array('messages.destroy', $message->id))) }}
            {{ link_to_route('messages.edit', 'Edit', array($message->id), array('class' => 'btn btn-info')) }}
            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
        {{ Form::close() }}
    </div>
</div>

<!--<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>User_id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Sticky</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $message->user_id }}}</td>
                    <td>{{{ $message->title }}}</td>
                    <td>{{{ $message->description }}}</td>
                    <td>{{{ $message->sticky }}}</td>
                    <td>{{ link_to_route('messages.edit', 'Edit', array($message->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('messages.destroy', $message->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>-->

@stop