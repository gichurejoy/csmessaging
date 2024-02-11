<!-- resources/views/responses/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Responses</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Message ID</th>
                <th>Response</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($responses as $response)
                <tr>
                    <td>{{ $response->id }}</td>
                    <td>{{ $response->message_id }}</td>
                    <td>{{ $response->response }}</td>
                    <td>
                        <a href="{{ route('responses.read', $response->id) }}">View</a>
                        <a href="{{ route('responses.edit', $response->id) }}">Edit</a>
                        <!-- Add delete button if needed -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
