<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ManagementCompany extends Model
{
    use HasFactory;

    protected $table = 'management_companies';

    //  Связь с таблицей домов.
    public function house(): HasMany
    {
        return $this->hasMany(House::class);
    }
}
