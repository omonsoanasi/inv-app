<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetCode extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'code', 'expires_at'];

    public $timestamps = true;

    public function isExpired(): bool
    {
        return now()->greaterThan($this->expires_at);
    }
}
