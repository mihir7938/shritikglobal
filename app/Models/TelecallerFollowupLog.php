<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelecallerFollowupLog extends Model
{
    use HasFactory;

    protected $table = 'telecaller_followup_logs';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'call_id',
        'followup_date',
        'followup_remarks',
    ];
}
