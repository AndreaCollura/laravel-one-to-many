<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'git', 'date', 'user_id', 'type_id'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
