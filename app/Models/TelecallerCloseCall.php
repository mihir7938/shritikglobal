<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelecallerCloseCall extends Model
{
    use HasFactory;

    protected $table = 'telecaller_call_closing';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customerName',
        'mobile',
        'productName',
        'subProductName',
        'loanAmount',
        'details_added_by',
    ];

    public function telecallers()
    {
        return $this->belongsTo(User::class, 'details_added_by', 'username');
    }
}
