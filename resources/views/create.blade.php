
@extends('layouts.app')

@section('content')
    <h1>Create Response</h1>
    <form action="{{ route('responses.store') }}" method="post">
        @csrf
        <div>
            <label for="response">Response:</label>
            <textarea id="response" name="response"></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
