<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $table = 'enquiries';
    public $timestamps = true;
    protected $fillable = [
        'full_name',
        'mobile',
        'email',
        'applicant_type',
        'loan_category',
        'loan_product',
        'loan_amount',
        'city_state',
        'requirement'
    ];
}
