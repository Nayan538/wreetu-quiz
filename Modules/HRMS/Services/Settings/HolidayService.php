<?php

namespace Modules\HRMS\Services\Settings;

use Modules\HRMS\Models\Settings\Holiday;

class HolidayService
{
    
    public function getAll(int $limit = 20) {
        return Holiday::query()->paginate($limit);
    }
    
    public function store(array $data)
    {
        return Holiday::create($data);
    }

    public function update(Holiday $holiday, array $data)
    {
        $holiday->update($data);
        return $holiday;
    }

    public function delete(Holiday $holiday)
    {
        $holiday->delete();
    }

    public function show($id)
    {
        return Holiday::findOrFail($id);
    }
}
