<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Member;
use App\Models\Commission;
use Hash;
use Carbon\Carbon;
use Auth;

class UserController extends Controller
{
    //
    public function index(){
        // $date_now = Carbon::now()->toDateString();
        // $from = $date_now.' 00:00:00';
        // $to = $date_now.' 23:59:59';

        $date_now = date("Y/m/d");

        $mon = date("Y-m");
        $date_start = $mon."-01";

        $d_now = date('d');
        $m_now = date('m');
        $y_now = date('Y'); 

        $data = array();

        $id = Auth::user()->id;
        // $user = User::find($id);
        // $member = Member::where('parent_id',$id)->orderBy('id','ASC')->get();

        for($i = $d_now; $i >= 1; $i--){
            if($i <= 9){
                $date_from = $y_now.'-'.$m_now.'-0'.$i.' 00:00:00';
                $date_to = $y_now.'-'.$m_now.'-0'.$i.' 23:59:59';
            }else{

                $date_from = $y_now.'-'.$m_now.'-'.$i.' 00:00:00';
                $date_to = $y_now.'-'.$m_now.'-'.$i.' 23:59:59';
            }

            $date_data['date']  = $y_now.'/'.$m_now.'/'.$i;


            $use = Commission::where('user_id', $id)->whereBetween('created_at', [$date_from, $date_to])->count();
            $date_data['use'] = $use;

            $amount = Commission::where('user_id', $id)->whereBetween('created_at', [$date_from, $date_to])->sum('amount');
            $date_data['amount'] = $amount;

            $revenue = Commission::where('user_id', $id)->whereBetween('created_at', [$date_from, $date_to])->sum('revenue');
            $date_data['revenue'] = $revenue;

            array_push($data, $date_data);

            
        }
        // foreach($member as $k_member => $v_member){

        //     $comm = Commission::where('member_id',$v_member->id)->whereBetween('created_at', [$from, $to])->first();
        //     if(!empty($comm)){
        //         $member[$k_member]->amount = $comm->amount;
        //         $member[$k_member]->revenue = $comm->revenue;
        //         $member[$k_member]->comm_id = $comm->id;
        //     }else{
        //         $member[$k_member]->amount = 0;
        //         $member[$k_member]->revenue = 0;
        //         $member[$k_member]->comm_id = '';
        //     }
        // }

        return view('user.commission',compact('data','date_now'));
    }
}
