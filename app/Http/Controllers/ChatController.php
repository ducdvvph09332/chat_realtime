<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(){

        $chats = Chat::all();

        return view('chats.index', compact('chats'));
    }

    public function create(){

    }

    public function store(Request $request){
        $data = $request->all();
        $data['author'] = Auth::user()->name;
        $chats = Chat::create($data);

        event(
            new ChatEvent($chats)
        );
        
        return $chats;
    }
}
