<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    protected $table = 'forms';
    protected $primaryKey = 'id';
    protected $with = ['mineral'];
    protected $guarded = [];
    //  protected $fillable = ["specification" , "num_vehicle", "buyer_mail" ,"estimated_value","buyer" ,"tonnage", "extraction_or", "kind_mineral","extraction_fee", "applicant_mail","excise_or", "name_applicant","excise_tax",'barangay','processing_or','processing_fee','municipality','name_permitte','otp_number','mineral_id'];
    public function mineral(){
        return $this->belongsTo(Mineral::class);
    }




}
