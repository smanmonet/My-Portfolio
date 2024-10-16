<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'book';

    public $fillable =
    [
        'ID',
        'book_name',
        'description',
        'max',
        'type',

    ];

}