<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnModel extends Model
{
    use HasFactory;
    protected $table = 'return'; // ระบุชื่อ table

    protected $fillable = [
        'borrow_id',
        'date_return',
        'amount',
    ]; // ระบุฟิลด์ที่อนุญาตให้ mass assignment

    // สร้างความสัมพันธ์กับโมเดล Borrow ถ้าจำเป็น
    public function borrow()
    {
        return $this->belongsTo(Borrow::class, 'borrow_id');
    }
}