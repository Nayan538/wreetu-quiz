<?php

namespace App\Models\Hrm;

use Modules\HRMS\Models\Settings\NoticeType;
use App\Models\User;
use App\Traits\AutoCreateUpdateAndHistory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NoticeBoard extends Model
{
    use HasFactory;
    use AutoCreateUpdateAndHistory;
    use SoftDeletes;

    protected $guarded = [];

    public function NoticeType()
    {
        return $this->belongsTo(NoticeType::class, 'notice_type_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
}
