<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TelecallerCallMaster extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'telecaller_call_master';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_name',
        'customer_mobile',
        'product_id',
        'sub_product_id',
        'loan_amount',
        'remarks',
        'status',
        'last_followup_date',
        'last_followup_remarks',
        'closing_date',
        'created_by',
    ];

    public function subProducts()
    {
        return $this->belongsTo(SubProduct::class, 'sub_product_id', 'id');
    }
    public function telecallers()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
