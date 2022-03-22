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
      
      $minerals=Mineral::select('name_of_minerals','id')->get();
      $forms = Forms::all();
    //   return view ('forms.index')->with('forms', $forms, 'minerals'=>$minerals);
      return view('forms.index',['forms'=>$forms,'minerals'=>$minerals]);
    }

    public function create()
    {
        return view('forms.addform');
      
    }

    public function store(Request $request)
    {
        $request['mineral_id']=12;
        $request['processing_fee']=12.0;
        $request['excise_tax']=12.0;
        $input = $request->all();
        
        Forms::create($input);
        return redirect('form')->with('flash_message', 'Form Added!');
    
    }

    public function show($id)
    {
        $form = Forms::find($id);
        return view('forms.show')->with('forms', $form);

    }

    
    public function edit($id)
    {
        $form = Forms::find($id);
        return view('forms.edit')->with('forms', $form);
        
    }

    public function update(Request $request, $id)
    {
        $form = Forms::find($id);
        $input = $request->all();
        $form->update($input);
        return redirect('form');
     
    }

    public function destroy($id)
    {
        Forms::destroy($id);
        return redirect('form');

    }
}
