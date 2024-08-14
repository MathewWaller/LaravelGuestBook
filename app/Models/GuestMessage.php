<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class GuestMessage extends Model
{
    use HasFactory;

    protected $fillable = ['message'];

    protected $guarded = [];  

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
