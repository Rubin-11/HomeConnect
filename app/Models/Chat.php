<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Events\Dispatcher;
use App\Events\ChatEvent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($chat) {

        });
    }
}
