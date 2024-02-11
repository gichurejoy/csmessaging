<?php

namespace App\Http\Controllers;
use App\Models\Messages;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $messages = Messages::all(); // Fetch all messages from the database
        // dd($messages);
        return view('dashboard', compact('messages')); // Pass messages to the view
    }
}
