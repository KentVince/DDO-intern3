<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forms;
use App\Models\Mineral;
use App\Models\Province;
use App\Models\Municipal;
use App\Models\Barangay;
use DB;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    $minerals=Mineral::select('name_of_minerals','id')->has('mineralSpecifications')->get();
    $provinces=Province::select('provCode', 'provDesc')->where('provDesc', '=', 'Davao de Oro')->get();
    $forms = Forms::all(); 
    $municipal = Municipal::all();
    $brgy = Barangay::all();
    $form_current_id=$this::getLastIdFromOTP();
    return view('forms.index',['forms'=>$forms,'minerals'=>$minerals,'form_current_id'=>$form_current_id, 'provinces'=>$provinces , 'municipal'=>$municipal]);

    }

    public function findMunicipality(Request $request){
        $municipals=Municipal::select('citymunDesc','citymunCode')->where('provCode',$request->id)->get();
        return response()->json($municipals);
  
    }
    public function findBarangay(Request $request){
        $brgy=Barangay::select('brgyDesc','brgyCode')->where('citymunCode',$request->id)->get();
        return response()->json($brgy);
    }

    public function create()
    {
        return view('forms.addform');
      
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_permitte'=>'required','name_applicant'=>'required','applicant_mail'=>'required','province'=>'required','municipality'=>'required',
            'barangay'=>'required','mineral_id'=>'required','specification_id'=>'required','tonnage'=>'required | numeric','extraction_or'=>'required | numeric',
            'processing_fee'=>'required | numeric','processing_or'=>'required | numeric','excise_tax'=>'required | numeric','excise_or'=>'required | numeric',
            'buyer'=>'required','buyer_mail'=>'required',
        ]);
        unset($request['mineral_id']);
        $input = $request->all();
        Forms::create($input);
        return redirect('/form')->with('result_msg', "You have successfully added application form record.");
    
    }

    public function show($id)
    {
        return redirect('/form');       
    }

    public function addOTPNumber($otp_number){
        $new_otp_number=intval($otp_number); 
        return ($new_otp_number+1);
    }

    public function getCurrentOTP(){
        $year_today=date("Y");
        $form = Forms::latest()->first();

        if($form==null){
            return "NM-".$year_today."-1";
        }
        $otp_number=$form->otp_number;
        $current_otp_explode=explode("-",$otp_number);

        if($year_today==$current_otp_explode[1]){ 
            $generated_otp_number=$this::addOTPNumber($current_otp_explode[2]);

        }else{
            $generated_otp_number=1;
        }
        return "NM-".$year_today."-".$generated_otp_number;
      
    }
    
    public function edit($id)
    {
        $form = Forms::find($id);  
    }
    public function getLastId()
    {
    $form = Forms::latest()->first();

    if($form==null){
        return 1;

    }else{
        return($form->id+1);
        } 
    }

    public function getLastIdFromOTP()
    {
    $form = Forms::latest()->first();
    
    if($form==null){
        return 1;
    }else{
        $otp_number=explode("-",$form->otp_number);
        $current_otp_id=end($otp_number);
        echo($current_otp_id);
        return($current_otp_id+1);
        }  
    }

    public function update(Request $request, $id)
    {
        $request1 = array("otp_number"=>$request['otp_number2'], "processing_fee"=>$request['processing_fee2'], 
        "name_permitte"=>$request['name_permitte2'], "processing_or"=>$request['processing_or2'], "province"=>$request['province2'],
        "municipality"=>$request['municipality2'], "barangay"=>$request['barangay2'],
        "excise_tax"=>$request['excise_tax2'], "name_applicant"=>$request['name_applicant2'],
        "excise_or"=>$request['excise_or2'], "applicant_mail"=>$request['applicant_mail2'],
        "extraction_fee"=>$request['extraction_fee2'],
        "extraction_or"=>$request['extraction_or2'], "tonnage"=>$request['tonnage2'],
        "buyer"=>$request['buyer2'], "estimated_value"=>$request['estimated_value2'],
        "buyer_mail"=>$request['buyer_mail2'], "num_vehicle"=>$request['num_vehicle2'],
        "specification_id"=>$request['specification']
        );
        $form = Forms::find($id);  
        $form->update($request1);
        return redirect('/form')->with('result_msg', "Update Successfully.");
    }

    public function destroy($id)
    {     
        Forms::destroy($id);
        return redirect('/form')->with('result_msg', "Deleted Form Record Successfully.");
    }
}