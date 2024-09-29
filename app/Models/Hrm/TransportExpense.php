<?php

namespace App\Models\Hrm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportExpense extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function billsAndAllowance()
    {
        return $this->belongsTo(BillsAndAllowance::class);
    }
}
