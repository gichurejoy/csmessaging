
@extends('layouts.app')

@section('content')
    <h1>Message</h1>
    <div>
        <p>{{ $message->message }}</p>
       
    </div>
    <form action="{{ route('messages.respond', $message->id) }}" method="post">
        @csrf
        <textarea name="response"></textarea>
        <button type="submit">Send</button>
    </form>
@endsection
