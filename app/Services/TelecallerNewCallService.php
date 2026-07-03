<?php

namespace App\Services;

use App\Models\TelecallerNewCall;

class TelecallerNewCallService
{

    public function getAllNewCalls($per_page = -1)
    {
        if($per_page == -1){
            return TelecallerNewCall::get();    
        }
        return TelecallerNewCall::paginate($per_page);
    }

    public function getNewCallById($id)
    {
        return TelecallerNewCall::find($id);
    }

    public function create($data)
    {
        return TelecallerNewCall::create($data);
    }

    public function update($new_calls, $data)
    {
        return $new_calls->update($data);
    }

    public function delete($new_calls)
    {
        return $new_calls->delete($new_calls);
    }
}
