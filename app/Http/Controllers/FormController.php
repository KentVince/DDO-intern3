<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forms;
use App\Models\Mineral;


class FormController extends Controller
{
    public function index()
    {
    //     $forms = Forms::all();
    //     print($forms);
    //   return view ('forms.index')->with('forms', $forms);

      $minerals=Mineral::has('mineralSpecifications')->get();
      $forms = Forms::all();
    // dd($forms->mineral);
    //   $form2= Forms::with('mineral.mineralSpecifications')->get();

    //   echo($form2[0]->mineral->mineralSpecifications[0]->specification_name);
    $form_current_id=$this::getLastIdFromOTP();
    //   return view ('forms.index')->with('forms', $forms, 'minerals'=>$minerals);
      return view('forms.index',['forms'=>$forms,'minerals'=>$minerals,'form_current_id'=>$form_current_id]);
    }

    public function create()
    {
        return view('forms.addform');

    }

    public function store(Request $request)
    {
        // print_r("sup");
        // $request['mineral_id']=12;
        // $request['processing_fee']=12.0;
        // $request['excise_tax']=12.0;
        $request['mineral_id']=$request->kind_mineral;
        $request['excise_tax']=12.0;

        unset($request['kind_mineral']);

        $input = $request->all();

        print_r("sup");

        Forms::create($input);
        return redirect('/form')->with('flash_message', 'Form Addedd!');

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
        "name_permitte"=>$request['name_permitte2'], "processing_or"=>$request['processing_or2'],
        "municipality"=>$request['municipality2'], "barangay"=>$request['barangay2'],
        "excise_tax"=>$request['excise_tax2'], "name_applicant"=>$request['name_applicant2'],
        "excise_or"=>$request['excise_or2'], "applicant_mail"=>$request['applicant_mail2'],
        "extraction_fee"=>$request['extraction_fee2'], "mineral_id"=>$request['kind_mineral2'],
        "extraction_or"=>$request['extraction_or2'], "tonnage"=>$request['tonnage2'],
        "buyer"=>$request['buyer2'], "estimated_value"=>$request['estimated_value2'],
        "buyer_mail"=>$request['buyer_mail2'], "num_vehicle"=>$request['num_vehicle2']

        );
        $request1['excise_tax']=12.0;

        // $request=array("name_permitte"=>$request['name_permitte2']);
        // $request=array("processing_or"=>$request['processing_or2']);
        // $request=array("municipality"=>$request['municipality2']);
        // $request=array("barangay"=>$request['barangay2']);
        // $request=array("excise_tax"=>$request['excise_tax2']);
        // $request=array("name_applicant"=>$request['name_applicant2']);
        // $request=array("excise_or"=>$request['excise_or2']);
        // $request=array("applicant_mail"=>$request['applicant_mail2']);
        // $request=array("extraction_fee"=>$request['extraction_fee2']);
        // $request=array("kind_mineral"=>$request['kind_mineral2']);
        // $request=array("extraction_or"=>$request['extraction_or2']);
        // $request=array("tonnage"=>$request['tonnage2']);
        // $request=array("buyer"=>$request['buyer2']);
        // $request=array("estimated_value"=>$request['estimated_value2']);
        // $request=array("buyer_mail"=>$request['buyer_mail2']);
        // $request=array("num_vehicle"=>$request['num_vehicle2']);
        // $request=array("specification"=>$request['specification2']);


        $form = Forms::find($id);
        // $input = $request->all();
        $form->update($request1);
        return redirect('/form');



    }

    public function destroy($id)
    {
        Forms::destroy($id);
        return redirect('/form');

    }
}
