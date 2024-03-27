<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPromotion extends Model
{
    use HasFactory;


    protected $table = 'orderpromotion';
    public $fillable = [
        'orderpromotionID',
        'orderID',
        'promotionID'
    ];
}
