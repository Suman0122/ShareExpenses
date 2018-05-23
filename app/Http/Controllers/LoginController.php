<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;

class LoginController extends Controller
{
  public function index()
  {
      return view('/');
  }
  
   public function verify(Request $request){
    	
//       $this->validate($request, [
//            'email' => 'required|emailid|unique:users,emailid',
//        ]);
       
    	Log::debug("Email id: " . $request->emailid);
    	$idUser = DB::select("Select * from users where emailid like '".$request->emailid."'");
    	//print_r($idUser[0]->password);            exit();
    	if(count($idUser) > 0 && ($request->password == $idUser[0]->password) > 0){
    		Log::debug("User id: " . $idUser[0]->userid);
    		//$type = DB::select("Select * from user_type where iduser = " . $idUser[0]->iduser);
			
    		//Email verification check start - chetan
//    		if($type[0]->verified == 0){
//    			$error = \Illuminate\Validation\ValidationException::withMessages([
//    					'validation_error' => ['Email is not verified.']
//    			]);
//    			throw $error;
//    		}
    		//Email verification check end - chetan
    		
//            $useradmin = DB::select("Select * from user_admin where user = ".$idUser[0]->iduser." order by id desc limit 1");
//    		$userType = "User";

            session_start();
            $request->session()->put('user.id', $idUser[0]->userid);
            $request->session()->put('user.name', $idUser[0]->username);
            $request->session()->put('user.registerdate', $idUser[0]->registerdate);
            $request->session()->put('user.emailid', $idUser[0]->emailid);
            //$request->session()->put('user.image', $idUser[0]->emailid);
            $request->session()->put('user.gender',$idUser[0]->gender);
            $request->session()->put('user.mobileno', $idUser[0]->mobileno);
//print_r($useradmin);exit();
         return redirect('/mainpage');
            
    	}
    	else{
    		$error = \Illuminate\Validation\ValidationException::withMessages([
    			'validation_error' => ['Invalid email or password. Please try again or register if a new user.']
    		]);
			throw $error;				
    	}
        
    }
    public function logout(){
        Session::flush();
        return  redirect('/');
    }  
    public function forgotpassword(){
        // Session::flush();
        // return redirect()->route('forgotpassword');
        return view('forgotpassword');
    }
}
