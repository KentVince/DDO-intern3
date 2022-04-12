<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    protected $table = 'forms';
    protected $primaryKey = 'id';
    protected $with = ['specifications'];
    // protected $guarded = [];
    //  protected $fillable = ["specification" , "num_vehicle", "buyer_mail" ,"estimated_value","buyer" ,"tonnage", "extraction_or", "kind_mineral","extraction_fee", "applicant_mail","excise_or", "name_applicant","excise_tax",'barangay','processing_or','processing_fee','municipality','name_permitte','otp_number','mineral_id'];

    public function specifications(){
        return $this->belongsTo(Specification::class,'specification_id', 'id');
    }



    protected $fillable=['otp_number','processing_fee', 'name_permitte', 'processing_or', 'municipality',
    'barangay', 'excise_tax', 'name_applicant', 'excise_or', 'applicant_mail', 'extraction_fee', 'kind_mineral',
    'extraction_or', 'tonnage', 'buyer', 'estimated_value', 'buyer_mail', 'num_vehicle', 'specification_id'];
    // protected $guarded = [];
}
