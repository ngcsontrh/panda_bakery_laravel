<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manager extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname', 'address', 'phone', 'user_id', 'gender', 'birthday',
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
