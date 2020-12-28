@extends('layouts.app')

@section('style')
<style>
    .border-custome{
        border: 1px solid #d6b318; background: #d6b318; color:#fff; 
        border-top-left-radius: 5px; 
        border-bottom-left-radius: 5px; 
    }
    .border-show-price{
        border: 1px solid #fff;
        text-align: right;
        color: #fff;
        border-top-right-radius: 5px; 
        border-bottom-right-radius: 5px; 
    }
    .border-table{ 
        border: 1px solid #fff;
        font-size: 16px;
        color:#fff;
    }
</style>
@endsection

@section('content')
<div class="container">

    <h2 class="text-title">ค่าคอมมิชชั่น</h2>

    <div class="row m-2">
        <div class="offset-md-3 col-md-6 pt-3 pb-3" 
            style="border: 1px solid #d6b318; background: #d6b318; color:#fff; border-radius: 5px; font-size:24px;  " >
            <div class="row">
                <div class="col-2"> <i class="fas fa-chart-line" style="font-size:28px;"></i></div>
                <div class="col-10 text-center">ค่าคอมมิชชั่น</div>
            </div>
        </div>
    </div>

    <div class="row ml-2 mr-2 mt-3">
        <div class="offset-md-3 col-md-6 pt-3 pb-3" >
            <div class="row">
                <div class="col-5 pt-3 pb-3 border-custome" style="font-size:20px;">
                    <i class="fas fa-dollar-sign" style="font-size:28px;"></i> จำนวนค่าคอมมิชั่น
                </div>
                <div class="col-7 pt-3 pb-3 border-show-price">
                    {{ number_format($data[0]['revenue'],2) }}
                    <small>บาท</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row ml-2 mr-2 mt-3">
        <div class="offset-md-3 col-md-6 pb-3" >
            <div class="row">
                <div class="col-5 pt-3 pb-3 border-custome" style="font-size:20px;">
                    <i class="fas fa-user" style="font-size:28px;"></i> จำนวนผู้เล่น
                </div>
                <div class="col-7 pt-3 pb-3 border-show-price">
                    {{ $data[0]['use'] }}
                    <small>คน</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row ml-2 mr-2 mt-3">
        <div class="offset-md-3 col-md-6 pt-3 pb-3 text-center" 
            style="border: 1px solid #d6b318; background: #d6b318; color:#fff; 
            border-top-right-radius: 5px; 
            border-top-left-radius: 5px; 
            font-size:18px;  " >
            ***ระบบจะแสดงข้อมูล ตามจำนวนวันที่มี การเล่น ได้ เสียเท่านั้น
        </div>
    </div>

    @foreach($data as $k => $v)

        @if( $v['use'] != 0)
        <div class="row ml-2 mr-2">
            <div class="offset-md-3 col-md-6 pt-3 pb-3 border-table">
                    <h4>วันที่ {{ $v['date'] }}</h4>
                    <table width="100%" class="mt-2">
                        <tr>
                            <td width="25%" class="pt-2">ค่าคอมมิชชั่น</td>
                            <td width="50%" class="text-right">{{ number_format($v['revenue'],2) }}</td>
                            <td width="25%" class="text-right pr-3">บาท</td>
                        </tr>
                        <tr>
                            <td width="25%" class="pt-2">ยอดเล่นได้-เสีย</td>
                            <td width="50%" class="text-right">{{ number_format($v['amount'],2) }}</td>
                            <td width="25%" class="text-right pr-3">บาท</td>
                        </tr>
                        <tr>
                            <td width="25%" class="pt-2">เล่น</td>
                            <td width="50%" class="text-right">{{ $v['use'] }}</td>
                            <td width="25%" class="text-right pr-3">คน</td>
                        </tr>
                    </table>
            </div>
            <div class="col-md-3"></div>
        </div>
        @endif
    @endforeach
    
</div>
@endsection
