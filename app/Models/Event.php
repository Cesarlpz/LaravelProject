<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'datetime', 'location', 'status'];

    protected $dates = [
        'start_datetime', // Define 'start_datetime' como una fecha y hora en el modelo
    ];
}
