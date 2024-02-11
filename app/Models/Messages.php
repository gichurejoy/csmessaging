<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'date',
        'time',
        'message',
    ];
    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
