<?php

namespace App\Services;

use App\Models\TelecallerFollowupLog;

class TelecallerFollowupLogService
{

    public function getAllFollowupLogs($per_page = -1)
    {
        if($per_page == -1){
            return TelecallerFollowupLog::orderBy('created_at','asc')->get();    
        }
        return TelecallerFollowupLog::orderBy('created_at','asc')->paginate($per_page);
    }

    public function getFollowupLogById($id)
    {
        return TelecallerFollowupLog::find($id);
    }

    public function create($data)
    {
        return TelecallerFollowupLog::create($data);
    }

    public function update($followup_logs, $data)
    {
        return $followup_logs->update($data);
    }

    public function delete($followup_logs)
    {
        return $followup_logs->delete($followup_logs);
    }
}
