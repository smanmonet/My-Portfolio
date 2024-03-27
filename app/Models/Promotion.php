<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table = 'promotion';
    public $fillable = [
        'proID',
        'promotionname',
        'pv',
        'price_pro',
        'startDate',
        'endDate'
    ];
}
