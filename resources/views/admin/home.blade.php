@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-3 text-title">สำหรับผู้ดูแลระบบ <small>จัดการ</small></h2>

    <div class="row">
          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon">
              
              </span>

              <div class="info-box-content">
                <span class="info-box-text">คอมมิชชั่น</span>
                <span class="info-box-number">
                  {{ number_format($commission,2) }}
                </span>
              </div>
                <div class="mt-2">
                    <a href="{{ route('admin.commission') }}" class="btn btn-danger btn-block">รายละเอียด</a>
                </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon">
              
              </span>

              <div class="info-box-content">
                <span class="info-box-text">สมาชิก</span>
                <span class="info-box-number">{{ $member }}</span>
              </div>
              <!-- /.info-box-content -->
              <div class="mt-2">
                    <a href="{{ route('admin.member') }}" class="btn btn-danger btn-block">รายละเอียด</a>
                </div>
            </div>
            
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon">
              
              </span>

              <div class="info-box-content">
                <span class="info-box-text">ผู้ใช้งาน</span>
                <span class="info-box-number">{{ $users }}</span>
              </div>
              <!-- /.info-box-content -->
              <div class="mt-2">
                    <a href="{{ route('admin.user') }}" class="btn btn-danger btn-block">รายละเอียด</a>
                </div>
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
         
        </div>
</div>
@endsection
