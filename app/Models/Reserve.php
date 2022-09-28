<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $table = 'reserves';

    protected $fillable = ['reserve_time', 'user_id', 'room_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->select('users.id', 'users.name');
    }
}
