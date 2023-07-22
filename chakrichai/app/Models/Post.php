<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', // Add 'title' here
        'slug',
        'tag',
        'end_date',
        'price',
        'status',
        'photo',
        'details',
        // Add other fillable attributes here
    ];
    

    public function user()
    {
        
        return $this->belongsTo(User::class);
    }
}
