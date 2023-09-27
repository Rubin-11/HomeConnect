<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\ChatService;

class ChatController extends Controller
{
    private $chats;
    private $users;
    private $chatService;

    public function __construct(Chat $chats, User $users, ChatService $chatService)
    {
        $this->chats = $chats;
        $this->users = $users;
        $this->chatService = $chatService;
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('chats/chat', ['chats' => $this->chats->all(), 'users' => $this->users]);
    }

    public function add(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->chats->fill($request->all());
        $this->chats->user_id = auth()->id();
        $this->chats->save();
//        broadcast(new MessageSent($this->chats));
        return redirect()->route('chat');
    }

    public function delete($messageId)
    {
        if ($this->chatService->deleteMessage($messageId)) {
            return redirect()->back()->with('message', 'Сообщение успешно удалено');
        }
        return redirect()->back()->with('message', 'Чужое сообщение нельзя удалить!!!');
    }

}
