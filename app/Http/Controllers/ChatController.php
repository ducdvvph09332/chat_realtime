<?php

namespace App\Http\Controllers;

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
        $data['author'] = 'Duc Dinh';
        Chat::create($data);
        
        return redirect()->route('chats.index');
    }
}
