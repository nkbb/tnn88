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
        $date_now = Carbon::now()->toDateString();
        $from = $date_now.' 00:00:00';
        $to = $date_now.' 23:59:59';

        $id = Auth::user()->id;
        $user = User::find($id);
        $member = Member::where('parent_id',$id)->orderBy('id','ASC')->get();
        foreach($member as $k_member => $v_member){

            $comm = Commission::where('member_id',$v_member->id)->whereBetween('created_at', [$from, $to])->first();
            if(!empty($comm)){
                $member[$k_member]->amount = $comm->amount;
                $member[$k_member]->revenue = $comm->revenue;
                $member[$k_member]->comm_id = $comm->id;
            }else{
                $member[$k_member]->amount = 0;
                $member[$k_member]->revenue = 0;
                $member[$k_member]->comm_id = '';
            }
        }

        return view('user.commission',compact('member','date_now','user'));
    }
}
