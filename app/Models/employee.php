<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class employee extends Model
{   
    protected $table = 'member';

    public $fillable = ['ID','name','type'];

}
