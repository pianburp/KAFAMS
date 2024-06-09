<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    protected $table = 'programs';
    protected $fillable = ['program_name', 'program_description', 'program_status', 'program_date'];
    protected $casts = [
        'program_date' => 'datetime',
    ];
}
