<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelecallerNewCall extends Model
{
    use HasFactory;

    protected $table = 'telecaller_new_call';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customerName',
        'mobile',
        'remarks',
        'details_added_by',
    ];
}
