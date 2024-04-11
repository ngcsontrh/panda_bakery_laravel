<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname', 'address', 'phone', 'user_id', 'gender', 'birthday',
    ];
    
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
