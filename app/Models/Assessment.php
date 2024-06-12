<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;
    public function results()
{
    return $this->hasMany(Result::class);
}

public function subject()
{
    return $this->belongsTo(Subject::class);
}

}
