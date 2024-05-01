<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'author_id',
        'description',
        'status',
        'pages',
        'publisher_id',
        'rating'
    ];

    protected $hidden = [];


    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function publisher()
    {
        return $this->belongsTo(PublishingHouse::class, 'publisher_id', 'id');
    }

}
