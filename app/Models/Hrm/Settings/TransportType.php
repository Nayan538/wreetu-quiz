<?php

namespace App\Models\Hrm\Settings;

use Modules\HRMS\Models\TransportExpense;
use App\Traits\AutoCreateUpdateAndHistory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportType extends Model
{
    use HasFactory;
    use AutoCreateUpdateAndHistory;
    use SoftDeletes;

    public $deletePrevent = ['transportExpenses'];


    protected $guarded = [];

    
    public function transportExpenses()
    {
        return $this->hasMany(TransportExpense::class, 'transport_by');
    }
}
