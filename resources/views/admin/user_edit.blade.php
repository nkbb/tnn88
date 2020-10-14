@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-3 text-title">สำหรับผู้ดูแลระบบ <small>แก้ไขผู้ใช้งาน</small></h2>
    <div class="row">
        <div class="col-12 mt-5">
            <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="my-form">
            @csrf
            @method('PUT')
                <div class="form-group row">
                    <label class="col-md-2 offset-md-2 mt-2">Username</label>
                    <div class="col-md-4 mt-2">
                        <h2 class="text-title">{{ $user->username }}</h2>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 offset-md-2 mt-2">Password (ถ้าต้องการแก้ไข)</label>
                    <div class="col-md-4 mt-2">
                        <input type="text" class="form-control" name="password">
                        @if ($errors->has('password'))
                            <div class="text-danger">*** {{ $errors->first('password') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 offset-md-2 mt-2">ชื่อ/นามแฝง</label>
                    <div class="col-md-4 mt-2">
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        @if ($errors->has('name'))
                            <div class="text-danger">*** {{ $errors->first('name') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 offset-md-2 mt-2">เบอร์ติดต่อ</label>
                    <div class="col-md-4 mt-2">
                        <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                        @if ($errors->has('phone'))
                            <div class="text-danger">*** {{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 offset-md-2 mt-2">สถานะ</label>
                    <div class="col-md-4 mt-2">
                        <select class="form-control seltitle" name="status" title="{{ $user->status }}">
                            <option value="1">เปิดใช้งาน</option>
                            <option value="0">ปิดใช้งาน</option>
                        </select>
                        @if ($errors->has('status'))
                            <div class="text-danger">*** {{ $errors->first('status') }}</div>
                        @endif
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success">บันทึก</button>
                    <a href="{{ route('admin.user') }}" class="btn btn-secondary">ย้อนกลับ</a>
                </div>

                
            </form>
        </div>

        
    </div>
</div>
@endsection
