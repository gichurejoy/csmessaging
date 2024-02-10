<?php

namespace App\Http\Controllers;
use App\Models\Messages;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    // Method to send a message
    public function sendMessage(Request $request)
    {
        // Validate incoming request if necessary

        // Create a new message
        $message = new Messages();
        $message->user_id = $request->input('user_id');
        $message->message = $request->input('message');
        $message->date = now()->toDateString(); // Assign the current date as a string
        $message->time = now()->toTimeString(); // Assign the current time as a string
        $message->save();

        // Return response
        return response()->json(['message' => 'Message sent successfully'], 200);
    }

    // Method to retrieve messages
    public function getMessages()
    {
        // Retrieve messages from the database
        $messages = Messages::all();

        // Return messages as JSON response
        return response()->json($messages, 200);
    }
}
