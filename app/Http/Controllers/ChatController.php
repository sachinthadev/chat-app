<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat');
    }

    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $recipient = $request->input('recipient');
        event(new MessageSent($message, $recipient));
        return response()->json(['message' => 'Message sent!']);
    }
}
