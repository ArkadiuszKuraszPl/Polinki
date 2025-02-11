<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'logo',
        'url',
        'title',
        'description',
        'age_restricted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
