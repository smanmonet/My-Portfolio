<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionDetail extends Model
{
    use HasFactory;
    protected $table = 'promotiondetail';
    public $fillable = [
        'promotiondetailID',
        'productID',
        'promotionID'
    ];
}
