<?php

namespace App\Models\Hrm\Settings;

use Modules\HRMS\Models\LeaveApplication;
use App\Traits\AutoCreateUpdateAndHistory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveType extends Model
{
    use HasFactory;
    use AutoCreateUpdateAndHistory;
    use SoftDeletes;

    public $deletePrevent = ['leaveApplications'];


    protected $guarded = [];

    
    public function leaveApplications() {
        return $this->hasMany(LeaveApplication::class, 'leave_type_id');
    }

}
