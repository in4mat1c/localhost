<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'history'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}