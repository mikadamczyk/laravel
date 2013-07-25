@extends('layouts.scaffold')

@section('main')

<h1>All Techlogs</h1>

<!--<p>{{ link_to_route('techlogs.create', 'Add new techlog') }}</p>-->
<p>
<a href="{{ route('techlogs.create') }}" class="btn btn-success"><i class="icon-white icon-plus-sign"></i>
Add new Techlog
</a>
</p>

@if ($techlogs->count())
    <form action="" method="get" id="filter" class="form-horizontal">
    <select name="user_id">
            <option value="">Select User</option>
        <?php foreach ($users as $key => $user):?>
            <?php $selected = ($key == Input::get('user_id')) ? 'selected="selected"' : null; ?>
            <option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $user ?></option>
        <?php endforeach;?>
    </select>
    <select name="device_id">
            <option value="">Select Device</option>
        <?php foreach ($devices as $key => $device):?>
            <?php $selected = ($key == Input::get('device_id')) ? 'selected="selected"' : null; ?>
            <option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $device ?></option>
        <?php endforeach;?>
    </select>
    <select name="type_id">
            <option value="">Select Type</option>
        <?php foreach ($types as $key => $type):?>
            <?php $selected = ($key == Input::get('type_id')) ? 'selected="selected"' : null; ?>
            <option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $type ?></option>
        <?php endforeach;?>
    </select>
    <input class="btn" type="submit" value="Filter" rel="filter">
    </form>
    <?php echo $pagination?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th><a href="<?php echo URL::to('techlogs?sort=user_id'.$querystr)?>">User</a></th>
                <th><a href="<?php echo URL::to('techlogs?sort=device_id'.$querystr)?>">Device</a></th>
                <th><a href="<?php echo URL::to('techlogs?sort=type_id'.$querystr)?>">Type</a></th>                
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($techlogs as $techlog)
                <tr>
                    <td>{{{ $techlog->user->email }}}</td>
                    <td>{{{ $techlog->device->name }}}</td>
                    <td>{{{ $techlog->type->name }}}</td>
                    <td>{{{ $techlog->title }}}</td>
                    <td>{{{ $techlog->description }}}</td>
                    <td>
                        <div class="btn-group">
                            {{ link_to_route('techlogs.edit', 'Edit', array($techlog->id), array('class' => 'btn ')) }}
                            {{ link_to_route('techlogs.show', 'Show', array($techlog->id), array('class' => 'btn btn-info')) }}
                        </div>
                    </td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('techlogs.destroy', $techlog->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <?php echo $pagination ?>
@else
    There are no techlogs
@endif

@stop