<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Reference extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id', 'reference_id', 'point'
    ];

    protected $table = 'reference';
    public $timestamps = false;
}
