<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponForUser extends Model
{
    use HasFactory;

    protected $table = "coupon_for_users";
    protected $guarded = [];
}
