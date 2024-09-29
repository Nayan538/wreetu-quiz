<?php

namespace App\Models\Hrm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryGeneratePayment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function salaryGenerate()
    {
        return $this->belongsTo(SalaryGenerate::class);
    }
}
