@extends('layout')

@section('content')
    @foreach($users as $user)
        <p>{{ $user->id }}. {{ $user->email }}</p>
        
    @endforeach
@stop