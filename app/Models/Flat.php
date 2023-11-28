<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Flat extends Model
{
    use HasFactory;

    protected $table = 'flats';

    //  Связь с таблицей дома
    public function house(): HasOne
    {
        return $this->hasOne(House::class);
    } 

    //  Связь с таблицей показаний приборов учета.
    public function meterReading(): HasOne
    {
        return $this->hasOne(MeterReading::class);
    }

    //  Обратная связь с пользователем.
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
