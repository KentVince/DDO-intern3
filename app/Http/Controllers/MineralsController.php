<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mineral;
class MineralsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $minerals=Mineral::all();
        $minerals=Mineral::all()->toJson();
        $minerals=json_decode($minerals);
        // Pagination Path Query Builder
        // $minerals=DB::table('minerals')->paginate(4);
        // endpagination
        // Pagination Eloquent
        $minerals= Mineral::paginate(10);
        
        // $minerals=Mineral::chunk(2,function($minerals){
        //     foreach($minerals as $mineral){
        //         // print_r($mineral);
        //     }
        // });
     
       return view('minerals.index',['minerals'=>$minerals]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('minerals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $mineral=new Mineral;
        // $mineral->name_of_minerals=$request->input('name_of_minerals');
        // $mineral->save();
        // return redirect('/minerals');
        $mineral= Mineral::create(['name_of_minerals'=>$request->input('name_of_minerals')]);
        return redirect('/minerals');
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
        
       $mineral= Mineral::find($id);
      
       return view('minerals.show')->with('minerals',$mineral);
        // return view('minerals.show',['minerals'=>$mineral]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mineral $mineral)
    {
        //
     
    
        return view('minerals.edit')->with('minerals',$mineral);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $mineral= Mineral::where('id',$id)->update(['name_of_minerals'=>$request->input('name_of_minerals')]);
        return redirect('/minerals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mineral $mineral)
    {
        //
    
        $mineral->delete();
        return redirect('/minerals');
    }
}
