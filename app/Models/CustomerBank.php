<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBank extends Model
{
    use HasFactory;

    protected $table = 'customer_banks';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'customerId',
        'customerName',
        'bankName',
        'bankAssocName',
        'bankAssocMobile',
        'bankUpdateDate',
        'bankRemarks',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
