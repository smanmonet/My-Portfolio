<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    public $timestamps = false;
    use HasFactory;
    public $table = "orders";
    protected $primaryKey  = "orderID";
    protected $fillable = [
        'orderID','date','memberID','status','empID','image'];

}
