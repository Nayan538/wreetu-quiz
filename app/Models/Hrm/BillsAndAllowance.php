<?php

namespace App\Models\Hrm;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillsAndAllowance extends BaseModel
{
    use HasFactory;

    protected $guarded = [];

    public function transportExpenses(){
        return $this->hasMany(TransportExpense::class, 'bills_and_allowance_id');
    }

    public function generalExpenses(){
        return $this->hasMany(GeneralExpense::class, 'bills_and_allowance_id');
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    
}
