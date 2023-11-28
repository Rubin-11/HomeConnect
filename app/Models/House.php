<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class House extends Model
{
    use HasFactory;

    protected $table = 'houses';

    //  Обратная связь с таблицей управляющей компании.
    public function managementCompanie(): BelongsTo
    {
        return $this->belongsTo(ManagementCompany::class);
    }
}
