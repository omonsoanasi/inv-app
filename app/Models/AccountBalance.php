<?php

namespace App\Models;

use Illuminate\Console\View\Components\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccountBalance extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'task_reset_time' => 'datetime', // Ensure created_date is treated as a Carbon instance
    ];
    public function completedTask(): BelongsTo
    {
        return $this->belongsTo(CompletedTask::class);
    }
}
