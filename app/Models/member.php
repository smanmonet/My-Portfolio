<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class member extends Model
{
    public $timestamps = false;
    protected $table = 'member';
    protected $fillable = [
        'name',
        'type',
        'member_code'
    ];

    // เพิ่ม event สำหรับการสร้าง member_code อัตโนมัติ
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($member) {
            $member->member_code = self::generateUniqueMemberCode();
        });
    }

    // ฟังก์ชันสำหรับการสร้าง member_code 10 หลัก และตรวจสอบไม่ให้ซ้ำ
    private static function generateUniqueMemberCode()
    {
        do {
            $code = str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT);
        } while (self::where('member_code', $code)->exists());

        return $code;
    }
}
