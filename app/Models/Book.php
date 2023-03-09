<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'ISBN',
        'pub_year',
        'available',
        'author_id'
    ];

    public function Author() {
        return $this->belongsTo(Author::class);
    }

    public function scopeSearch($query, $search)
    {
        if ($search && $search != "") {
            return $query->where("title", "like", "%$search%");
        }
        return $query;
    }
}
