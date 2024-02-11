
@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <ul>
        @foreach($messages as $message)
            <li>
            <a href="{{ route('messages.show', $message->id) }}">{{ $message->message }}</a>

            </li>
        @endforeach
    </ul>
@endsection
