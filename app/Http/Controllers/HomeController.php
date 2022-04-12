<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('home');
       
    }
    public function account(){
        if (Auth::check())
{
    $current_user=Auth::user();
    $user_credentials=["full_name"=>$current_user->name,"email"=>$current_user->email,"created_at"=>$current_user->created_at,"updated_at"=>$current_user->updated_at];
    
    // The user is logged in...
}else{
   return redirect(route('home'));
}
        
        return view('home.account')->with('user_data',$user_credentials);
       
    }
    public function update(Request $request){
        $credentials = $request->validate([
            'email' => ['required'],
            'name' => ['required']
        ]);
        Auth::user()->update($credentials);
        return redirect(route('account'))->with('result_msg',"Updating successful.");
    }
    public function destroy(){
        $current_user=Auth::user();   
        Auth::logout();
        $current_user->delete();
        return redirect(route('home'))->with('result_msg',"Account has successfully been deleted.");
    }
    public function dummy(Request $request){
        dd($request);
      return view('home.account',['apps'=>"hello"]);
    }
    public function changePassword(Request $request){
        if (Auth::check()) {
            $user = Auth::user();
            $credentials = $request->validate([
                'password' => ['required'],
                'password_confirmation' => ['required'],
            ]);
           
            if(password_verify($credentials['password'], $user->password)) {
                // in case if "$crypt_password_string" actually hides "1234567"
                $user->password=Hash::make($credentials['password_confirmation']);
                $user->save();
                Auth::logout();
                return redirect(route('home'));
            }else{
                return redirect(route('account'))->with('error',"Your password is incorrect.");
            }

            // The user is logged in...
        }else{
            return redirect(route('home'));
        }
       
    
    }
    

}
