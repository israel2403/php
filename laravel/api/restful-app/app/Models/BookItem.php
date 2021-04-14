<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'format',
        'book_shelf'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function persons()
    {
        return $this->belongsToMany(Person::class);
    }
}
