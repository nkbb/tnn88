<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Member;
use App\Models\Commission;
use Hash;
use Carbon\Carbon;


class AdminController extends Controller
{
    //

    public function index(){
        $date_now = Carbon::now()->toDateString();
        $from = $date_now.' 00:00:00';
        $to = $date_now.' 23:59:59';

        $users = User::where('type', 1)->count();
        $member = Member::whereNull('user_id')->count();

        $commission = Commission::whereBetween('created_at', [$from, $to])->sum('revenue');

        return view('admin.home',compact('users', 'member','commission'));
    }

    public function Commission(){
        $date_now = Carbon::now()->toDateString();
        $from = $date_now.' 00:00:00';
        $to = $date_now.' 23:59:59';

        $item = User::where('type',1)->where('status',1)->orderBy('name','ASC')->get();
        foreach($item as $k => $v){

            $member = Member::where('parent_id',$v->id)->orderBy('id','ASC')->get();
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

            $item[$k]->member = $member;
        }

        return view('admin.commission',compact('item','date_now'));
        
    }

    public function createCommission(Request $request, $id){

        $user = User::find($id);
        if(!$user){abort(404);}
        $member = Member::where('parent_id',$id)->orderBy('id','ASC')->get();

        $date_now = Carbon::now()->toDateString();
        return view('admin.commission_create',compact('member','user','date_now'));
        
    }

    public function showMember(){

        $member = Member::whereNull('user_id')->get();
        foreach($member as $k => $v){

            $parent_name = User::select('name')->where('id', $v->parent_id)->first();

            $member[$k]->parent_name = $parent_name->name;
        }

        return view('admin.member', compact('member'));
    }

    public function createMember(){
        $users = User::select('id','name')->where('type', 1)->where('status',1)->orderBy('name','ASC')->get();
        return view('admin.member_create', compact('users'));
    }

    public function saveMember(Request $request){
        $validate = [
            'name' => 'required',
            'parent_id' => 'required'
        ];

        $this->validate($request, $validate);

        $upd = $request->all();
        $upd['status'] = 1;

        if(empty($request->phone)){
            $upd['phone'] = '';
        }

        Member::create($upd);

        return redirect()->route('admin.member')->withInput()
                        ->with('success','เพิ่มสมาชิก เรียบร้อยแล้ว');

    }

    public function editMember(Request $request, $id){

        $member = Member::find($id);
        if(!$member){abort(404);}

        $users = User::select('id','name')->where('type', 1)->where('status',1)->orderBy('name','ASC')->get();
        return view('admin.member_edit', compact('users', 'member' ));
    }

    public function updateMember(Request $request, $id){

        $validate = [
            'name' => 'required',
            'parent_id' => 'required'
        ];

        $this->validate($request, $validate);
        if(empty($request->phone)){
            $upd['phone'] = '';
        }else{
            $upd['phone'] = $request->phone;
        }

        $upd['name'] = $request->name;
        $upd['status'] = $request->status;
        $upd['parent_id'] = $request->parent_id;

        $member = Member::find($id);
        if(!$member){abort(404);}
        $member->update($upd);

        return redirect()->route('admin.member')->withInput()
        ->with('success','แก้ไขสมาชิก เรียบร้อยแล้ว');
    }

    public function showUser(){

        $users = User::where('type', 1)->get();
        return view('admin.user', compact('users'));
    }

    public function createUser(){
        return view('admin.user_create');
    }

    public function saveUser(Request $request){
        $validate = [
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            'name' => 'required',
            // 'phone' => 'required'
        ];

        $this->validate($request, $validate);

        $upd = $request->all();
        $upd['password'] = Hash::make($upd['password']);
        $upd['email'] = '';
        $upd['status'] = 1;
        $upd['type'] = 1;

        if(empty($request->phone)){
            $upd['phone'] = '';
        }


        $user = User::create($upd);

        Member::create([
            'user_id' => $user->id,
            'parent_id' => $user->id,
            'status' => 1,
            'name' => $upd['name'],
            'phone' => $upd['phone']
        ]);

        return redirect()->route('admin.user')->withInput()
                        ->with('success','เพิ่มผู้ใช้งาน เรียบร้อยแล้ว');

    }

    public function editUser(Request $request, $id){

        $user = User::find($id);
        if(!$user){abort(404);}
        return view('admin.user_edit', compact('user'));
    }

    public function updateUser(Request $request, $id){

        $validate = [
            'name' => 'required',
            // 'phone' => 'required'
        ];
        $upd = array();

        if(!empty($request->password)){
            $validate['password'] = 'required|min:6';
            $upd['password'] = Hash::make($request->password);
        }
        // $upd = $request->all();
        $this->validate($request, $validate);
        if(empty($request->phone)){
            $upd['phone'] = '';
        }else{
            $upd['phone'] = $request->phone;
        }

        $upd['name'] = $request->name;
        $upd['status'] = $request->status;

        $user = User::find($id);
        if(!$user){abort(404);}
        $user->update($upd);


        Member::where('user_id', $user->id)->update([
            'status' => $upd['status'],
            'name' => $upd['name'],
            'phone' => $upd['phone']
        ]);

        return redirect()->route('admin.user')->withInput()
        ->with('success','แก้ไขข้อมูล เรียบร้อยแล้ว');
    }

    public function getDetail(Request $request){

        $item = Member::where('parent_id', $request->user_id)->get();

        $from = $request->date_now.' 00:00:00';
        $to = $request->date_now.' 23:59:59';

        foreach($item as $k => $v){
            $comm = Commission::where('member_id',$v->id)->whereBetween('created_at', [$from, $to])->first();
            if(!empty($comm)){
                $item[$k]->amount = $comm->amount;
                $item[$k]->revenue = $comm->revenue;
                $item[$k]->comm_id = $comm->id;
            }else{
                $item[$k]->amount = 0;
                $item[$k]->revenue = 0;
                $item[$k]->comm_id = '';
            }
        }
        
        return response()->json([
            'status' => 200,
            'message' => 'successfully',
            'item' => $item,
        ], 200);
    }

    public function saveDetail(Request $request){
        if(!empty($request->user_id)){


            foreach($request->item as $k => $v){
                // echo $v['amount'];

                if(!empty($v['comm_id'])){
                    //update
                    Commission::where('id', $v['comm_id'])->update([
                        'amount' => $v['amount'],
                        'revenue' => $v['revenue'],
                        'member_id' => $v['id'],
                        'user_id' => $request->user_id
                    ]);
                }else{
                    //create
                    Commission::create([
                        'amount' => $v['amount'],
                        'revenue' => $v['revenue'],
                        'member_id' => $v['id'],
                        'user_id' => $request->user_id
                    ]);
                }
            }

        }

        return response()->json([
            'status' => 200,
            'message' => 'save successfully',
        ], 200);
    }
}
