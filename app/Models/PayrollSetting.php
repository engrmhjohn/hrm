<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollSetting extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function employee()
    {
        return $this->hasOne(Employee::class,'id','employee_id');
    }
    public function department()
    {
        return $this->hasOne(Department::class,'id','department_id');
    }
}
