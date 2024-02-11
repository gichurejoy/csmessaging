<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Models\Response; 
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

    public function show($id)
    {
        $message = Messages::findOrFail($id); 
        return view('show', compact('message')); 
    }

    public function respond(Request $request, $id)
{
    $message = Messages::findOrFail($id); 

    $validatedData = $request->validate([
        'response' => 'required|string',
    ]);

    // Create a new response instance and save it to the database
    $response = new Response();
    $response->message_id = $message->id;
    $response->response = $validatedData['response'];
    $response->save();

    // Update the status of the message
    $message->status = 'responded';
    $message->save();

    // Redirect to the index page of responses associated with the message
    return redirect()->route('responses.index', ['message_id' => $message->id])->with('success', 'Response sent successfully!');
}

}
