<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Post extends Model
{
    use HasFactory, Sortable;
    
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

    protected $sortable = [
        'price',
        'created_at',
    ];
    

    public function user()
    {
        
        return $this->belongsTo(User::class);
    }
}
