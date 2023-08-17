<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    private $chats;
    private $users;

    public function __construct(Chat $chats, User $users)
    {
        $this->chats = $chats;
        $this->users = $users;
    }

    public function getChat()
    {
//        dd($this->chats->all());
//        dd($this->users->find(1));
        return view('chats/chat', ['chats' => $this->chats->all(), 'users' => $this->users]);
    }

    public function addChat(Request $request)
    {
//        dd(auth()->user()->firs_name);
//        $this->chats::created([
//            'message' => $request->input('message'),
//            'user_id' => auth()->user()->id,
//        ]);
        $this->chats->fill($request->all());
        $this->chats->user_id = auth()->user()->id;
        $this->chats->save();
        return redirect()->route('chat');
    }
}
