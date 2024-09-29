<?php

namespace App\Models\Hrm;

use App\Models\AccessControl\Branch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployementDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function branch(){
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
