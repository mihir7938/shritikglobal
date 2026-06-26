<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'customers';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customerId',
        'productId',
        'subProductId',
        'loanAmount',
        'associateId',
        'telecallerId',
        'fullName',
        'surName',
        'motherName',
        'dob',
        'gender',
        'mobile',
        'phone',
        'email',
        'profession_type',
        'job_type',
        'profession_details',
        'marital',
        'alt_mobile',
        'res_address',
        'res_landmark',
        'res_city',
        'res_state',
        'res_pincode',
        'prop_address',
        'prop_landmark',
        'prop_city',
        'prop_state',
        'prop_pincode',
        'co_fullname',
        'co_relation',
        'co_dob',
        'co_mobile',
        'co_profession_type',
        'co_job_type',
        'co_profession_details',
        'aadhar',
        'pan',
        'doj',
        'aadharImage',
        'panImage',
        'customerImage',
        'imagePath',
        'bankName',
        'bankAssocName',
        'bankAssocMobile',
        'bankUpdateDate',
        'bankRemarks',
        'loanStatus',
        'active_status',
        'createdBy',
        'loanStatusRemark',
        'noOfDependent',
        'isOwned',
        'customerBankName',
        'isSavingsAccount',
        'bankDocumentPath',
        'resPropertyTaxDoc',
        'resLightBillDoc',
    ];

    public function banks()
    {
        return $this->hasMany(CustomerBank::class, 'customer_id');
    }
    public function status()
    {
        return $this->hasMany(StatusRemark::class, 'customer_id');
    }
    public function subProducts()
    {
        return $this->belongsTo(SubProduct::class, 'subProductId', 'id');
    }
    public function associates()
    {
        return $this->belongsTo(User::class, 'associateId', 'username');
    }
    public function telecallers()
    {
        return $this->belongsTo(User::class, 'telecallerId', 'username');
    }
}
