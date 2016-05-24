<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $fillable = [
        'name',
        'email',
        'phone',
        'message'
    ];
}
