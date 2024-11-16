<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompletedTask extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function activity():BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }
    public function accountBalance():BelongsTo
    {
        return $this->belongsTo(AccountBalance::class);
    }
}
