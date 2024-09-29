<?php

namespace App\Models\Hrm\Settings;

use Modules\HRMS\Models\NoticeBoard;
use App\Traits\AutoCreateUpdateAndHistory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NoticeType extends Model
{
    use HasFactory;
    use AutoCreateUpdateAndHistory;
    use SoftDeletes;

    
    public $deletePrevent = ['noticeBoards'];

    protected $guarded = [];

    
    public function noticeBoards()
    {
        return $this->hasMany(NoticeBoard::class, 'notice_type_id');
    }
}
