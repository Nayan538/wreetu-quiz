<?php

namespace Modules\LocationManager\Services;

use Modules\LocationManager\Models\Area;

class AreaService
{
    
    public function getAll(int $limit = 20) {
        return Area::query()
        ->likeSearch('name')
        ->when(request('thana_id'), function ($query) {
            $query->where('thana_id', request('thana_id'));
        })
        ->paginate($limit);
    }
    
    public function store($data)
    {
        return Area::create([
            "division_id" => $data["division"],
            "district_id"=> $data["district"],
            "thana_id"=> $data["thana"],
            "area"=> $data["area"],
            "union_id"=> $data["union"],
            "village_id"=> $data["village"],
            "post_code"=> $data["post_code"],
            "street"=> $data["street"],
            "lat"=> $data["lat"],
            "lon"=> $data["lon"],
        ]);
    }

    public function update(Area $area, $data)
    {
        $area->update([
            "division_id" => $data["division"],
            "district_id"=> $data["district"],
            "thana_id"=> $data["thana"],
            "area"=> $data["area"],
            "union_id"=> $data["union"],
            "village_id"=> $data["village"],
            "post_code"=> $data["post_code"],
            "street"=> $data["street"],
            "lat"=> $data["lat"],
            "lon"=> $data["lon"],
        ]);
        return $area;
    }

    public function delete(Area $area)
    {
        $area->delete();
    }

    public function show($id)
    {
        return Area::findOrFail($id);
    }
}
