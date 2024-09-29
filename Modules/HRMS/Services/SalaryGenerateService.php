<?php

namespace Modules\HRMS\Services;

use Modules\HRMS\Models\SalaryGenerate;

class SalaryGenerateService
{
    
    public function getAll(int $limit = 20) {
        return SalaryGenerate::query()
        ->searchByFields(['employee_id','department_id','year_month'])	
        ->paginate($limit);
    }
    
    public function store($data)
    {
        $result = [];
        foreach ($data['employee_id'] as $key => $employee) {
            $result[$key] = SalaryGenerate::create([
                'employee_id' => $employee,
                'basic' => $data['basic'][$key],
                'house_rent' => $data['house_rent'][$key],
                'medical' => $data['medical'][$key],
                'conveyance' => $data['conveyance'][$key],
                'others' => $data['others'][$key],
                'gross' => $data['gross'][$key],
                'tax' => $data['tax'][$key],
                'net_earning' => $data['net_earning'][$key],
                'year_month' => $data['year_month'][$key],
                'department_id' => $data['department_id'][$key],
                'status' => $data['status'][$key]
            ]);
        }
        
        return $result;
    }

    public function update(SalaryGenerate $salaryGenerate, array $data)
    {
        $salaryGenerate->update($data);
        return $salaryGenerate;
    }

    public function delete(SalaryGenerate $salaryGenerate)
    {
        $salaryGenerate->delete();
    }

    public function show($id)
    {
        return SalaryGenerate::findOrFail($id);
    }
}
