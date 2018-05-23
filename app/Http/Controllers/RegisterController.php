<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
  public function index()
  {
      return view('register');
  }
  
  public function adduser(Request $request) {

        //dump($request->all());

        static $password;
//        $this->validate($request, [
//            'email' => 'required|emailid|unique:users,emailid',
//        ]);

        
        $data = ['username' => $request->username,
            'mobileno' => $request->mobileno,
            'registerdate' => date('Y-m-d'),
            'emailid' => $request->emailid,
            //'password' => Hash::make($request->password),
            'password' => $request->password,
            'gender' => $request->gender
             ];
            // print_r($data); exit();
        DB::table('users')->insert($data);
        
        
        //Mail::to($request->emailid)->send(new Verification($request));

        //return redirect(route('verifyEmailFirst'));
        
         return redirect('/');

    }
    
    public function mainpage()
  {
      return view('mainpage');
  }
}
