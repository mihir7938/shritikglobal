<?php

namespace App\Services;

use App\Models\TelecallerFollowup;

class TelecallerFollowupService
{

    public function getAllFollowups($per_page = -1)
    {
        if($per_page == -1){
            return TelecallerFollowup::get();    
        }
        return TelecallerFollowup::paginate($per_page);
    }

    public function getFollowupById($id)
    {
        return TelecallerFollowup::find($id);
    }

    public function create($data)
    {
        return TelecallerFollowup::create($data);
    }

    public function update($followups, $data)
    {
        return $followups->update($data);
    }

    public function delete($followups)
    {
        return $followups->delete($followups);
    }
}
