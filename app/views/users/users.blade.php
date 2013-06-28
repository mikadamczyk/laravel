@extends('layouts.scaffold')

@section('main')

    @foreach($users as $user)
        <p>{{ $user->id }}. {{ $user->email }}</p>
    @endforeach
@stop