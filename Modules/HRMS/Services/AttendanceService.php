<?php

namespace Modules\HRMS\Services;
use Modules\HRMS\Models\Attendance;
use Carbon\Carbon;

class AttendanceService
{
    
    public function getAll(int $limit = 20) {
        return Attendance::query()
        ->searchByFields(['employee_id'])
        ->when(request()->filled('from'), function ($qr) {
            $qr->where('date', '>=', Carbon::parse( request('from'))->format('Y-m-d'));
        })
        ->when(request()->filled('to'), function ($qr) {
            $qr->where('date', '<=', Carbon::parse( request('to'))->format('Y-m-d'));
        })
        ->paginate($limit);
    }
    
    public function store(array $data)
    {
       $result['attendance']= Attendance::create($data);

       return $result;
    }

    public function update(Attendance $attendance, array $data)
    {
        $attendance->update($data);
        return $attendance;
    }

    public function delete(Attendance $attendance)
    {
        $attendance->delete();
    }

    public function show($id)
    {
        return Attendance::findOrFail($id);
    }
}
