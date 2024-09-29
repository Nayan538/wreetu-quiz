<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model{

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }
    
    public function updatedBy(){
        return $this->belongsTo(User::class, 'created_by');
    }
    public function scopeSearchByFields($query, $filed_names)
    {
        foreach ($filed_names as $key => $filed_name) {

            $query->when(request()->filled($filed_name), function($qr) use($filed_name) {
                $qr->where($filed_name, request()->$filed_name);
             });
        }

    }

    public function scopeUserBranch($query){
        return hasPermission('supper_admin')? $query :  $query->with('createdBy.branch')->whereHas('createdBy.branch', function($q){
            $q->where('id', auth()->user()->branch_id);
        });
    }

    public function scopeLikeSearch($query, $filed_name)
    {
        $query->when(request()->filled($filed_name), function ($qr) use ($filed_name) {
            $qr->where($filed_name, 'like', '%' . request()->$filed_name . '%');
        });
    }
    
    public function scopeSearchLikes($query, $filed_names)
    {
        foreach ($filed_names as $key => $filed_name) {
            $query->when(request()->filled($filed_name), function($qr) use($filed_name) {
                $qr->where($filed_name, 'like', request()->$filed_name. '%');
            });
        }
    }

    public function scopeFilterByDateRange($query, $filed_name, $filter="from_to")
    {
        $query->when(request()->filled($filter), function ($qr) use ($filed_name, $filter) {
            $qr->whereBetween($filed_name, explode(' to ', request()->$filter));
        });
    }
}