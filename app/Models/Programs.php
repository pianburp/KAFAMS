<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    use HasFactory;
    public function index()
    {
        // Fetch all class entries from the database
        $items = Programs::all();

        // Return the listing view and pass the items to it
        return view('listing', compact('items'));
    }
}

