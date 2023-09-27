<?php

namespace App\Services;

use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

class ChatService
{
    public function deleteMessage($messageId)
    {
        $message = Chat::find($messageId);
        if($message && $message->user_id == Auth::id()) {
//            dd($message);
            $message->delete();
            return true;
        }
        return false;
    }
}
