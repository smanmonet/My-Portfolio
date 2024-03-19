<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $items = null;
    public $qty = 0;
    public $price = 0;
    /*public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart ->items;
            $this->qty = $oldCart ->qty;
            $this->price = $oldCart ->price;

        }
    }*/
}
