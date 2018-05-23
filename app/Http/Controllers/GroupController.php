<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class GroupController extends Controller
{
  public function index()
  {
      $group = DB::table('groups')->where('userid',Session::get('user.id'))->first();
      return view('creategroup')->with(compact('group'));
  }
  public function addgroup(Request $request) {


      $getgroup = DB::table('groups')->where('userid',Session::get('user.id'))->first();
      if(sizeof($getgroup) == 0){
          $data = ['groupname' => $request->groupname,
            'userid' => Session::get('user.id')
             ];
            //print_r($data); exit();
        $insert = DB::table('groups')->insert($data);
        $id = DB::getPdo('addbill')->lastInsertId();
        if($insert){
            $getuser = DB::table('users')->where('userid',Session::get('user.id'))->first();
            $data = ['membername' => $getuser->username,
            'contactno' => $getuser->mobileno,
            'gid' => $id,
            'userid' => Session::get('user.id')
             ];
            //print_r($data); exit();
        DB::table('members')->insert($data);
        }
      } else {
          $data = ['groupname' => $request->groupname];
          DB::table('groups')->where('gid', $getgroup->gid)->update($data);
      }
      
      $group = DB::table('groups')->where('userid',Session::get('user.id'))->orderBy('gid', 'desc')->first();
        
         return view('creategroup')->with(compact('group'));

    }
  
  public function addmember(Request $request) {

//        $this->validate($request, [
//            'email' => 'required|emailid|unique:users,emailid',
//        ]);

        //print_r(Session::get('user.id')); exit();
        $data = ['membername' => $request->membername,
            'sharepercent' => $request->sharepercent,
            'contactno' => $request->contactno,
            'gid' => $request->gid,
            'userid' => Session::get('user.id')
             ];
            //print_r($data); exit();
        DB::table('members')->insert($data);
        
        
        //Mail::to($request->emailid)->send(new Verification($request));

        //return redirect(route('verifyEmailFirst'));
        
         return redirect('addbill');

    }
    
    public function viewbill() {
        $view = DB::table('addbill')->where('userid',Session::get('user.id'))->get();
        return view('viewbill')->with(compact('view'));
    }
    
    public function paidby() {
        $data = DB::table('addbill')->orderBy('billid', 'desc')->first();
        $data->billid;
        $groupname = DB::table('addbill')
                ->join('groups', 'groups.gid', '=', 'addbill.gid')
                ->select('groupname')
                ->where('addbill.userid',Session::get('user.id'))
                ->first();
//        print_r($groupname); exit();
        $amount1 = DB::table('addbill')
                ->where('addbill.userid',Session::get('user.id'))
                ->sum('billamount');
        
        $amount = DB::table('addbill')
                ->select('billamount')
                ->where('billid',$data->billid)
                ->first();
        
        $groupmember = DB::table('members')
                        ->join('groups', 'groups.gid', '=', 'members.gid')
                        ->where('groups.userid',Session::get('user.id'))
                        ->get();
        
//        print_r($groupmember);        exit();
        return view('paidby')->with(compact('groupname','amount','groupmember'));
    }
    
    public function selectgroup()
  {
        $data = DB::table('addbill')->orderBy('billid', 'desc')->first();
        $data->billid;
        $groupname = DB::table('addbill')
                ->join('groups', 'groups.gid', '=', 'addbill.gid')
                ->select('groupname')
                ->where('addbill.userid',Session::get('user.id'))
                ->first();
        $groupmember = DB::table('members')
                        ->join('groups', 'groups.gid', '=', 'members.gid')
                        ->where('groups.userid',Session::get('user.id'))
                        ->get();
      
      return view('selectgroup')->with(compact('groupname','groupmember'));
  }
  
  public function updateamount(Request $request)
  {
      $data = ["amountpaid" => $request->amountpaid];
      //print_r($request->gmid); exit();
      $update = DB::table('members')->where('gmid', $request->gmid)->update($data);
      //Log::debug("MGameName : " . $request);
        $data = DB::table('addbill')->orderBy('billid', 'desc')->first();
        $data->billid;
        $groupname = DB::table('addbill')
                ->join('groups', 'groups.gid', '=', 'addbill.gid')
                ->select('groupname')
                ->where('addbill.userid',Session::get('user.id'))
                ->first();
//        print_r($groupname); exit();
        $amount1 = DB::table('addbill')
                ->where('addbill.userid',Session::get('user.id'))
                ->sum('billamount');
        
        $amount = DB::table('addbill')
                ->select('billamount')
                ->where('billid',$data->billid)
                ->first();
        
        $groupmember = DB::table('members')
                        ->join('groups', 'groups.gid', '=', 'members.gid')
                        ->where('groups.userid',Session::get('user.id'))
                        ->get();
            //return redirect()->route('shareof')->with(compact('groupname','amount','groupmember'));  
      return view('paidby')->with(compact('groupname','amount','groupmember'));
  }
  
  public function shareof() {
        $data = DB::table('addbill')->orderBy('billid', 'desc')->first();
        $data->billid;
        $groupname = DB::table('addbill')
                ->join('groups', 'groups.gid', '=', 'addbill.gid')
                ->select('groupname')
                ->where('addbill.userid',Session::get('user.id'))
                ->first();
//        print_r($data->billid); exit();
        $amount1 = DB::table('addbill')
                ->where('addbill.userid',Session::get('user.id'))
                ->sum('billamount');
        
        $amount = DB::table('addbill')
                ->select('billamount')
                ->where('billid',$data->billid)
                ->first();
        
//        print_r($amount); exit();
        $groupmember = DB::table('members')
                        ->join('groups', 'groups.gid', '=', 'members.gid')
                        ->where('groups.userid',Session::get('user.id'))
                        ->get();
        
//        print_r($groupmember);        exit();
        return view('shareof')->with(compact('groupname','amount','groupmember'));
    }
    
    public function finalreport() {
        $data = DB::table('addbill')->orderBy('billid', 'desc')->first();
        $data->billid;
        $groupname = DB::table('addbill')
                ->join('groups', 'groups.gid', '=', 'addbill.gid')
                ->select('groupname')
                ->where('addbill.userid',Session::get('user.id'))
                ->first();
//        print_r($groupname); exit();
        $amount = DB::table('addbill')
                ->where('addbill.userid',Session::get('user.id'))
                ->sum('billamount');
        
        $groupmember = DB::table('members')
                        ->join('groups', 'groups.gid', '=', 'members.gid')
                        ->where('groups.userid',Session::get('user.id'))
                        ->get();
        
//        print_r($groupmember);        exit();
        return view('finalreport')->with(compact('groupname','amount','groupmember'));
    }
    
    public function payment() {
        $user = DB::table('members')->where('userid',Session::get('user.id'))->get();
         return view('addpayment')->with(compact('user'));

    }
    
    public function addpayment(Request $request) {

        $data = ['totalamount' => $request->totalamount,
            'paiddate' => $request->paiddate,
            'receiveby' => $request->receiveby,
            'paidby' => $request->paidby,
            'remark' => $request->remark,
            'userid' => Session::get('user.id')
             ];
            //print_r($data); exit();
        DB::table('payment')->insert($data);
        
         return redirect('mainpage');

    }
}
