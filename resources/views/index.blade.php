@extends('layouts.app')

@section('content')
    <h1>Response Details</h1>
    @foreach ($responses as $response)
        <p><strong>Response:</strong> {{ $response->response }}</p>
        <!-- Add more details here as needed -->
    @endforeach
@endsection
