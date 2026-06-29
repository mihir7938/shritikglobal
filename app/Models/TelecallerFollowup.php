<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelecallerFollowup extends Model
{
    use HasFactory;

    protected $table = 'telecaller_followup_details';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'mobile',
        'remarks',
        'details_added_by',
        'status',
    ];

    public function telecallers()
    {
        return $this->belongsTo(User::class, 'details_added_by', 'username');
    }
}
