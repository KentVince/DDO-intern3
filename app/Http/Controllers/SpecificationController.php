<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specification;
use App\Models\Mineral;
use App\Http\Requests\CreateSpecificationRequest;
use App\Http\Requests\UpdateSpecificationRequest;
class SpecificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $minerals=Mineral::select('name_of_minerals','id')->get();
        $specification=Specification::all();
        // Pagination Path Query Builder
        // $minerals=DB::table('minerals')->paginate(4);
        // endpagination
        // Pagination Eloquent
        //$minerals= Mineral::paginate(10);
        
        // $minerals=Mineral::chunk(2,function($minerals){
        //     foreach($minerals as $mineral){
        //         // print_r($mineral);
        //     }
        // });
   
       return view('specification.index',['specification'=>$specification,'minerals'=>$minerals]);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSpecificationRequest $request)
    {
        //
       
       
     $result=($request->validated());
     
        //return view("specification.index")->with("result_msg","You have successfully $result added a specification.");
        // $result=$request->validated();
        //    $result->name_of_minerals=$result->name_of_minerals2;
        // $result=array("specification_name"=>$result['name_of_specification'],"mineral_id"=>"56");
        Specification::create($result);
        return redirect("/specification")->with('result_msg',"Specification record saved successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecificationRequest $request, $id)
    {
            $result=$request->validated();
        //    $result->name_of_minerals=$result->name_of_minerals2;
            $result=array("specification_name"=>$result['specification_name2'],"mineral_id"=>$result['mineral_id']);
            $mineral= Specification::where('id',$id)->update($result);
            return redirect("/specification")->with('result_msg',"Updating successful.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specification $specification)
    {
        //
        $specification->delete();
        return redirect('/specification')->with('result_msg',"Deletion Successful.");
    }
}
