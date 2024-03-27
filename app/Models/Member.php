<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Member extends Model
{
    public $timestamps = false;
    
    use HasFactory;
    protected $table = 'member';
    protected $primaryKey = 'memberID';
    protected $fillable = [
        'memberID','Name','SurName','Address','rankName','loginID','loginPass','PV','upline'] ;
}  
