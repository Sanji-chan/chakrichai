<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'slug',
        'uni_name',
        'major',
        'status',
        'resume',
        'age',
        // Add other fillable attributes here
    ];

    public function user()
    {
        return $this->belongsTo(Post::class);
    }
}
