
@extends('layouts.app')

@section('content')
    <h1>Edit Response</h1>
    <form action="{{ route('responses.update', $response->id) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="response">Response:</label>
            <textarea id="response" name="response">{{ $response->response }}</textarea>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
