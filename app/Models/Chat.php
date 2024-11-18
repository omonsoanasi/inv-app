<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use HasFactory, softDeletes;
    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}