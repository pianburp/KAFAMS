<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    use HasFactory;
    protected $fillable = ['program_name', 'program_description', 'program_status', 'program_date'];
    protected $casts = [
        'program_date' => 'datetime', // Example if program_date is a date
    ];
}
