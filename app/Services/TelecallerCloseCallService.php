<?php

namespace App\Services;

use App\Models\TelecallerCloseCall;

class TelecallerCloseCallService
{

    public function getAllCloseCalls($per_page = -1)
    {
        if($per_page == -1){
            return TelecallerCloseCall::orderBy('created_at','desc')->get();    
        }
        return TelecallerCloseCall::orderBy('created_at','desc')->paginate($per_page);
    }

    public function getCloseCallById($id)
    {
        return TelecallerCloseCall::find($id);
    }

    public function create($data)
    {
        return TelecallerCloseCall::create($data);
    }

    public function update($close_calls, $data)
    {
        return $close_calls->update($data);
    }

    public function delete($close_calls)
    {
        return $close_calls->delete($close_calls);
    }
}
