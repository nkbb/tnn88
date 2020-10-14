@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-3 text-title">สำหรับผู้ดูแลระบบ <small>ผู้ใช้งาน</small></h2>
    <div class="row">
        <div class="col-12" >

        <div class="row">
            <div class="col-md-4 mt-2">
                <div style="color:#fff;">ผู้ใช้งาน {{ count($users) }} รายการ</div>
            </div>

            <div class="col-md-8 text-right mt-2">
                <a href="{{ route('admin.user.create') }}" class="btn btn-danger mb-4">+ เพิ่มผู้ใช้งาน</a>
            </div>
        </div>
        <table class="table table-bordered" style="color:#fff;">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ลำดับ</th>
                    <th scope="col" class="text-center">Username</th>
                    <th scope="col" class="text-center">ชื่อ/นามแฝง</th>
                    <th scope="col" class="text-center">เบอร์ติดต่อ</th>
                    <th scope="col" class="text-center">สถานะ</th>
                    <th scope="col" class="text-center">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @if( count($users) == 0 )
                <tr>
                    <td class="text-danger text-center" colspan="6"><h1>ไม่มีผู้ใช้งาน</h1></td>
                </tr>
                @endif

                @foreach( $users as $k => $v)
                <tr>
                    <td class="text-center">{{ $k +1 }}</td>
                    <td class="pl-3">{{ $v->username }}</td>
                    <td class="pl-3">{{ $v->name }}</td>
                    <td class="pl-3">{{ $v->phone }}</td>
                    <td class="text-center">
                        @if($v->status == 1)
                        <h5><span class="badge badge-success">เปิดใช้งาน</span></h5>
                        @else
                        <h5><span class="badge badge-danger">ปิดการใช้งาน</span></h5>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.user.edit', $v->id) }}">แก้ไข</a> 
                        <!-- <a href="">ลบ</a> -->
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>

            <div class="row">
                <div class="col-12">
                    <div class="text-center mt-4">
                        <a href="{{ route('admin.home') }}" class="btn btn-secondary">ย้อนกลับ</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
