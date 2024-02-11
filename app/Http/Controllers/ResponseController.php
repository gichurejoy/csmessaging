<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;


class ResponseController extends Controller
{
    // Method to display a listing of responses
    public function index()
    {
        $responses = Response::all(); // Fixed variable name
        return view('index', compact('responses'));
    }
    
    public function create()
    {
        return view('create');
    }
    
    public function store(Request $request)
    {
        dd($request->all());
        $validatedData = $request->validate([
            'message_id' => 'required|exists:messages,id',
            'response' => 'required|string',
        ]);
    
        $response = new Response();
        $response->message_id = $validatedData['message_id'];
        $response->response = $validatedData['response'];
        $response->save();
    
        return redirect()->route('index')->with('success', 'Response created successfully.');
    }
    
    public function show($id)
    {
        $response = Response::findOrFail($id);
        return view('read', compact('response'));
    }
    
    public function edit($id)
    {
        $response = Response::findOrFail($id);
        return view('edit', compact('response'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'response' => 'required|string',
        ]);
    
        $response = Response::findOrFail($id);
        $response->response = $validatedData['response'];
        $response->save();
    
        return redirect()->route('index')->with('success', 'Response updated successfully.');
    }
    
    public function destroy($id)
    {
        $response = Response::findOrFail($id);
        $response->delete();
    
        return redirect()->route('index')->with('success', 'Response deleted successfully.');
    }
}    