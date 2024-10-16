<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class borrow extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'borrow';

    public $fillable =
    [   
        'ID',
        'member_id',
        'book_id',
        'date_borrow',
        'deadline',
        'amount'

    ];
}
