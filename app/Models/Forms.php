<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    protected $table = 'forms';
    protected $primaryKey = 'id';
    protected $fillable=['otp_number','processing_fee', 'name_permitte', 'processing_or', 'municipality', 
    'barangay', 'excise_tax', 'name_applicant', 'excise_or', 'applicant_mail', 'extraction_fee', 'kind_mineral',
    'extraction_or', 'tonnage', 'buyer', 'estimated_value', 'buyer_mail', 'num_vehicle', 'specification'];
    // protected $guarded = [];
}
