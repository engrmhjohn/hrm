<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInfo extends Model
{
    use HasFactory;

    protected $guarded= [];

    public function customer()
    {
        return $this->hasOne(Admin::class,'id','customer_id');
    }
    public function package()
    {
        return $this->hasOne(Package::class,'id','package_id');
    }
}
