<?php

namespace App\Services;

use App\Models\StatusRemark;

class StatusRemarkService
{

    public function getAllStatusRemarks($per_page = -1)
    {
        if($per_page == -1){
            return StatusRemark::orderBy('created_at')->get();    
        }
        return StatusRemark::orderBy('created_at')->paginate($per_page);
    }

    public function getStatusRemarkById($id)
    {
        return StatusRemark::find($id);
    }

    public function create($data)
    {
        return StatusRemark::create($data);
    }

    public function update($status_remarks, $data)
    {
        return $status_remarks->update($data);
    }

    public function delete($status_remarks)
    {
        return $status_remarks->delete($status_remarks);
    }
}
