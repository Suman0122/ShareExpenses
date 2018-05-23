<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BillController extends Controller
{
  function index()
  {
      return view('addbill');
  }
  
  public function insert(Request $request) {

//        $this->validate($request, [
//            'email' => 'required|emailid|unique:users,emailid',
//        ]);

        //print_r(Session::get('user.id')); exit();
      $group = DB::table('groups')->where('userid',Session::get('user.id'))->orderBy('gid', 'desc')->first();
      $member = DB::table('members')->where('userid',Session::get('user.id'))->orderBy('gmid', 'desc')->first();
      
        $data = ['billname' => $request->billname,
            'billdescrp' => $request->billdescrp,
            'billdate' => $request->billdate,
            'billamount' => $request->billamount,
            'gid' => $group->gid,
            'gmid' => $member->gmid,
            'userid' => Session::get('user.id')
             ];
            //print_r($data); exit();
        DB::table('addbill')->insert($data);
        
//        $id = DB::getPdo('addbill')->lastInsertId();
        //Mail::to($request->emailid)->send(new Verification($request));

        //return redirect(route('verifyEmailFirst'));
        
         return redirect('paidby');

    }
    
    public function viewbill() {
        $view = DB::table('addbill')->where('userid',Session::get('user.id'))->get();
        return view('viewbill')->with(compact('view'));
    }
}
