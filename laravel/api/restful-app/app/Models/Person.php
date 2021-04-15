<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    public $table = "persons";
    protected $primarykey = 'id';

    protected $fillable = [
        'name',
        'firstSurname',
        'secondSurname',
        'age',
    ];

    public function bookItems()
    {
        return $this->belongsToMany(BookItem::class);
    }
}
