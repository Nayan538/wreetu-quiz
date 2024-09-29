<?php

namespace App\Models\Hrm;

use App\Models\BaseModel;
use App\Models\User;
use App\Traits\AutoCreateUpdateAndHistory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends BaseModel
{
    use HasFactory;
    use AutoCreateUpdateAndHistory;
    use SoftDeletes;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function educationDetails(){
        return $this->hasMany(EducationDetail::class);
    }

    public function employementDetails(){
        return $this->hasMany(EmployementDetail::class, 'employee_id');
    }

    public function employementDetail(){
        return $this->hasOne(EmployementDetail::class, 'employee_id');
    }

    public function salaryGenerates(){
        return $this->hasMany(SalaryGenerate::class, 'employee_id');
    }

}
