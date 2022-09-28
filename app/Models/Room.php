<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable = ['name', 'reserved'];

    public function reserve()
    {
        return $this->hasOne(Reserve::class, 'room_id')->with('user');
    }

    public function getAll()
    {
        return $this->with('reserve')->get();
    }
}
