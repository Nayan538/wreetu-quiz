<?php

namespace App\Models\Hrm\Settings;

use Modules\HRMS\Models\BillsAndAllowance;
use Modules\HRMS\Models\GeneralExpense;
use App\Traits\AutoCreateUpdateAndHistory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpenseType extends Model
{
    use HasFactory;
    use AutoCreateUpdateAndHistory;
    use SoftDeletes;

    

    protected $guarded = [];

    public $deletePrevent = ['generalExpenses'];

    public function generalExpenses()
    {
        return $this->hasMany(GeneralExpense::class, 'expense_type');
    }


}
