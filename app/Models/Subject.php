<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description', // If you have a description field
        'code',         // If you have a subject code
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'created_at' => 'datetime:Y-m-d H:i:s', // Example of custom datetime format
    ];

    /**
     * The attributes that should be hidden for serialization.
     * 
     * @var array
     */
    protected $hidden = [];
    
    /**
     * Get the assessments for the subject.
     */
    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }
}
