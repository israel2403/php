<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'author',
        'title',
        'publishing_house',
        'no_items'
    ];

    public function bookItems()
    {
        return $this->hasMany(BookItem::class);
    }
}
