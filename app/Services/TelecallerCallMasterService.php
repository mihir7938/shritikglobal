<?php

namespace App\Services;

use App\Models\TelecallerCallMaster;

class TelecallerCallMasterService
{

    public function getAllCalls($per_page = -1)
    {
        if($per_page == -1){
            return TelecallerCallMaster::orderBy('created_at','desc')->get();    
        }
        return TelecallerCallMaster::orderBy('created_at','desc')->paginate($per_page);
    }

    public function getCallById($id)
    {
        return TelecallerCallMaster::find($id);
    }

    public function create($data)
    {
        return TelecallerCallMaster::create($data);
    }

    public function update($calls, $data)
    {
        return $calls->update($data);
    }

    public function delete($calls)
    {
        return $calls->delete($calls);
    }
}
