<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\ChatEvent;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    use HasFactory;
    protected $table = 'chats';

    protected $fillable = [
        'message',
        'user_id',
    ];
    protected $dispatchesEvents = [
        'created' => ChatEvent::class,
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
