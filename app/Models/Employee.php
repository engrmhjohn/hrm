<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function designation()
    {
        return $this->hasOne(Designation::class,'id','designation_id');
    }
    public function department()
    {
        return $this->hasOne(Department::class,'id','department_id');
    }
    public function paySlip()
    {
        return $this->hasOne(PaySlip::class,'id','pay_slip_id');
    }
    public function shift()
    {
        return $this->hasOne(Shift::class,'id','shift_id');
    }
}
