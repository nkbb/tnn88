@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-3 text-title">สำหรับผู้ดูแลระบบ <small>แก้ไขสมาชิก</small></h2>
    <div class="row">
        <div class="col-12 mt-5">
            <form action="{{ route('admin.member.update', $member->id) }}" method="POST" class="my-form">
            @csrf
            @method('PUT')

                <div class="form-group row">
                    <label class="col-md-2 offset-md-2 mt-2">ตัวแทน</label>
                    <div class="col-md-4 mt-2">
                        <select class="form-control seltitle" name="parent_id" title="{{ $member->parent_id }}">
                            <option value="">== กรุณาเลือก == </option>
                            @foreach( $users as $v)
                            <option value="{{ $v->id }}">{{ $v->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('parent_id'))
                            <div class="text-danger">*** {{ $errors->first('parent_id') }}</div>
                        @endif
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-2 offset-md-2 mt-2">ชื่อ/นามแฝง</label>
                    <div class="col-md-4 mt-2">
                        <input type="text" class="form-control" name="name" value="{{ $member->name }}">
                        @if ($errors->has('name'))
                            <div class="text-danger">*** {{ $errors->first('name') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 offset-md-2 mt-2">เบอร์ติดต่อ</label>
                    <div class="col-md-4 mt-2">
                        <input type="text" class="form-control" name="phone" value="{{ $member->phone }}">
                        @if ($errors->has('phone'))
                            <div class="text-danger">*** {{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 offset-md-2 mt-2">สถานะ</label>
                    <div class="col-md-4 mt-2">
                        <select class="form-control seltitle" name="status" title="{{ $member->status }}">
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
                    <a href="{{ route('admin.member') }}" class="btn btn-secondary">ย้อนกลับ</a>
                </div>

                
            </form>
        </div>

        
    </div>
</div>
@endsection
