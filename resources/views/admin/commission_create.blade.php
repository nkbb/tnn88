@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="text-title">สำหรับผู้ดูแลระบบ <small>จัดการ ค่าคอมมิชชั่น</small></h2>
    <h3 class="mb-3 text-title">ข้อมูล ณ วันที่ {{ $date_now }}</h3>

    <div class="row">
        <div class="col-12">

            <div class="row mt-5 mb-2" style="color:#fff;">
                <div class="col-md-1 offset-md-1">ตัวแทน : </div>
                <div class="col-md-8 text-title">{{ $user->name }} @if(!empty($user->phone)) ({{$user->phone }} ) @endif</div>
            
            </div>

            <admin-commission-create :user_id="{{ $user->id }}" date_now="{{ $date_now }}">
            </admin-commission-create>

            
        </div>

    </div>
</div>
@endsection
