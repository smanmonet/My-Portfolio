<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class room extends Model
{   
    use HasFactory;
    public $timestamps = false;
    protected $table = 'room';
    protected $fillable = ['name', 'description', 'status'];

}