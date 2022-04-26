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
        
        // $muni=Municipal::select('citymunDesc')->join('forms', 'municipals.citymunCode', '=', 'forms.municipality')->where('forms.id', '=', 2)->get();
        // $brgys=Barangay::select('brgyDesc')->join('forms', 'barangays.id', '=', 'forms.barangay')->where('forms.id', '=', 2)->get();
       
        
       
      $minerals=Mineral::select('name_of_minerals','id')->get();
    //   $provinces=Province::all();
      $provinces=Province::select('provCode', 'provDesc')->where('provDesc', '=', 'Davao de Oro')->get();
      $forms = Forms::all(); 
      $municipal = Municipal::all();
      $brgy = Barangay::all();
      //dd( $forms->barangay);
      //dd($forms);
    // dd($forms->mineral);
    //   $form2= Forms::with('mineral.mineralSpecifications')->get();

    //   echo($form2[0]->mineral->mineralSpecifications[0]->specification_name);
    $form_current_id=$this::getLastIdFromOTP();
   
    // $aws=$this::getMunicipal();
    // $aw=Municipal::select('citymunDesc')->join('forms', 'municipals.citymunCode', 'forms.municipality')->where('forms.id', '=', 'forms.id');
    //   return view ('forms.index')->with('forms', $forms, 'minerals'=>$minerals);
    return view('forms.index',['forms'=>$forms,'minerals'=>$minerals,'form_current_id'=>$form_current_id, 'provinces'=>$provinces , 'municipal'=>$municipal]);
    //   return view ('forms.index')->with('forms', $forms, 'minerals'=>$minerals);
      
    }

    public function findMunicipality(Request $request){
        $municipals=Municipal::select('citymunDesc','citymunCode')->where('provCode',$request->id)->get();
        return response()->json($municipals);
    //    $p=DB::table('municipals')
    //    ->select('citymunDesc','citymunCode')
    //    ->join('provinces','municipals.provCode','=','provinces.provCode')
    //    ->where('provinces.provCode',$request->id)
    //    ->get();
        
        //SELECT municipals.citymunDesc FROM municipals INNER JOIN provinces ON municipals.provCode = provinces.provCode;
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
        
        unset($request['mineral_id']);
        
        $input = $request->all();
        Forms::create($input);
        return redirect('/form')->with('result_msg', "You have successfully added application form record.");
    
    }

    public function show($id)
    {
        // $form = Forms::find($id);
        // return view('forms.show')->with('forms', $form);

        return redirect('/form');

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
       
        // $request=array("otp_number"=>$request['otp_number2'],"processing_fee"=>$request['processing_fee2'],
        // "name_permitte"=>$request['name_permitte2'], "processing_or"=>$request['processing_or2'], 
        // "municipality"=>$request['municipality2'], "barangay"=>$request['barangay2'], "excise_tax"=>$request['excise_tax2'],
        // "name_applicant"=>$request['name_applicant2'], "excise_or"=>$request['excise_or2'], "applicant_mail"=>$request['applicant_mail2'],
        // "extraction_fee"=>$request['extraction_fee2'], "kind_mineral"=>$request['kind_mineral2'], "extraction_or"=>$request['extraction_or2'],
        // "tonnage"=>$request['tonnage2'], "buyer"=>$request['buyer2'], "estimated_value"=>$request['estimated_value2'],
        // "buyer_mail"=>$request['buyer_mail2'], "num_vehicle"=>$request['num_vehicle2'], "specification"=>$request['specification2']
        // );

        $form = Forms::find($id);  
        // $input = $request->all();
        $form->update($request1);
       
          
            return redirect('/form')->with('result_msg', "Updateds Successfully.");
   
        // return redirect('/form')->with('result_msg', "Updateds Successfully.");

     
     
    }

    // public function getMunicipal($id){
    //     $muni=Municipal::select('citymunDesc')->join('forms', 'municipals.citymunCode', '=', 'forms.municipality')->where('forms.id', '=', $id)->get();

    //     //SELECT municipals.citymunDesc FROM municipals INNER JOIN forms ON municipals.citymunCode = forms.municipality WHERE forms.id = forms.id;
    // }

    public function destroy($id)
    {
        Forms::destroy($id);
        return redirect('/form')->with('result_msg', "Delete Successfully.");

    }
}