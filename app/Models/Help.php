<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    use HasFactory;
    protected $table = 'helps';
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'image',
        'message',
        'is_delivered',
        'address',
    ];
}
