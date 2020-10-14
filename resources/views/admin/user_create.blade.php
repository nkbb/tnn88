@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-3 text-title">สำหรับผู้ดูแลระบบ <small>เพิ่มผู้ใช้งาน</small></h2>
    <div class="row">
        <div class="col-12 mt-5">
            <form action="{{ route('admin.uset.store') }}" method="POST" class="my-form">
            @csrf
            @method('POST')
                <div class="form-group row">
                    <label class="col-md-2 offset-md-2 mt-2">Username</label>
                    <div class="col-md-4 mt-2">
                        <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                        @if ($errors->has('username'))
                            <div class="text-danger">*** {{ $errors->first('username') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 offset-md-2 mt-2">Password</label>
                    <div class="col-md-4 mt-2">
                        <input type="text" class="form-control" name="password" value="{{ old('password') }}">
                        @if ($errors->has('password'))
                            <div class="text-danger">*** {{ $errors->first('password') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 offset-md-2 mt-2">ชื่อ/นามแฝง</label>
                    <div class="col-md-4 mt-2">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <div class="text-danger">*** {{ $errors->first('name') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 offset-md-2 mt-2">เบอร์ติดต่อ</label>
                    <div class="col-md-4 mt-2">
                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                            <div class="text-danger">*** {{ $errors->first('phone') }}</div>
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
