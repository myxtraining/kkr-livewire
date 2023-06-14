<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Conner\Likeable\Likeable;

class Review extends Model
{
    use HasFactory, Likeable;

    protected $fillable = ['content', 'user_id', 'log_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
