@extends('layouts.scaffold')

@section('main')

<h1>All Obslogs</h1>

<!-- <p>{{ link_to_route('obslogs.create', 'Add new obslog') }}</p> -->
<p>
<a href="{{ route('obslogs.create') }}" class="btn btn-success"><i class="icon-white icon-plus-sign"></i>
Add new obslog
</a>
</p>
@if ($obslogs->count())
    <form action="" method="get" id="filter" class="form-horizontal">
    <select name="user_id">
            <option value="">Select User</option>
        <?php foreach ($users as $key => $user):?>
            <?php $selected = ($key == Input::get('user_id')) ? 'selected="selected"' : null; ?>
            <option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $user ?></option>
        <?php endforeach;?>
    </select>
    <select name="object_id">
            <option value="">Select Object</option>
        <?php foreach ($objects as $key => $object):?>
            <?php $selected = ($key == Input::get('object_id')) ? 'selected="selected"' : null; ?>
            <option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $object ?></option>
        <?php endforeach;?>
    </select>
    <select name="program_id">
            <option value="">Select Program</option>
        <?php foreach ($programs as $key => $program):?>
            <?php $selected = ($key == Input::get('program_id')) ? 'selected="selected"' : null; ?>
            <option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $program ?></option>
        <?php endforeach;?>
    </select>
    <select name="telescope_id">
            <option value="">Select Telescope</option>
        <?php foreach ($telescopes as $key => $telescope):?>
            <?php $selected = ($key == Input::get('telescope_id')) ? 'selected="selected"' : null; ?>
            <option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $telescope ?></option>
        <?php endforeach;?>
    </select>

    <input class="btn" type="submit" value="Filter" rel="filter">
    </form>
    <?php echo $pagination?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th><a href="<?php echo URL::to('obslogs?sort=user_id'.$querystr)?>">User</a></th>
				<th><a href="<?php echo URL::to('obslogs?sort=object_id'.$querystr)?>">Object</a></th>
				<th><a href="<?php echo URL::to('obslogs?sort=program_id'.$querystr)?>">Program</a></th>
				<th><a href="<?php echo URL::to('obslogs?sort=telescope_id'.$querystr)?>">Telescope</a></th>
				<th>Actions</th>
				<th>Delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($obslogs as $obslog)
                <tr>
                    <td>{{{ $obslog->user->email }}}</td>
                    <td>{{{ $obslog->object->name }}}</td>
                    <td>{{{ $obslog->program->name }}}</td>
                    <td>{{{ $obslog->telescope->name }}}</td>
                    <td>
                    <div class="btn-group">
                        {{ link_to_route('obslogs.edit', 'Edit', array($obslog->id), array('class' => 'btn ')) }}
                        {{ link_to_route('obslogs.show', 'Show', array($obslog->id), array('class' => 'btn btn-info')) }}
                    </div>
                    </td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('obslogs.destroy', $obslog->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <?php echo $pagination ?>
@else
    There are no obslogs
@endif

@stop