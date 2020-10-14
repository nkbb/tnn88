@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="text-title">ค่าคอมมิชชั่น</h2>
    <h3 class="mb-3 text-title">ข้อมูล ณ วันที่ {{ $date_now }}</h3>
    <div class="row">
        <div class="col-12">

        <div class="row mt-5 mb-3" style="color:#fff;">
            <div class="col-md-1 offset-md-1">ตัวแทน : </div>
            <div class="col-md-8 text-title">{{ $user->name }} @if(!empty($user->phone)) ({{$user->phone }} ) @endif</div>
            
        </div>

        <table class="table table-bordered" style="color:#fff;">
            <thead>
                <tr>
                    <th scope="col" width="8%" class="text-center">ลำดับ</th>
                    <th scope="col" width="25%" class="text-center">สมาชิก</th>
                    <th scope="col" width="15%" class="text-center">ยอดแทงที่มี การได้เสีย</th>
                    <th scope="col" width="15%" class="text-center">รายรับ</th>
                </tr>
            </thead>
            <tbody>
            @php
                    $total_amount = 0;
                    $total_revenue = 0;
                @endphp

                    @foreach($member as $k_member => $v_member)
                        <tr>
                            <td class="text-center">{{ $k_member + 1 }}</td>
                            <td class="pl-3">
                                @if($v_member->user_id == $user->id)
                                    <span class="text-danger">ตัวแทน</span>
                                @else
                                    {{ $v_member->name }}
                                @endif
                            </td>
                            @if(!empty($v_member->comm_id))
                            <td class="text-right pr-4">
                                {{ number_format($v_member->amount,2) }}
                            </td>
                            <td class="text-right pr-4">
                                {{ number_format($v_member->revenue,2) }}
                            </td>
                            @else
                            <td class="text-danger text-right pr-4">ไม่มีข้อมูล</td>
                            <td class="text-danger text-right pr-4">ไม่มีข้อมูล</td>
                            @endif
                        </tr>
                        @php
                            $total_amount += $v_member->amount;
                            $total_revenue += $v_member->revenue;
                        @endphp
                    @endforeach
                    <tr>
                        <td colspan="2" class="text-center"><h3>Total</h3></td>
                        <td class="text-right pr-4">{{ number_format($total_amount, 2) }}</td>
                        <td class="text-right pr-4">{{ number_format($total_revenue, 2) }}</td>
                    </tr>
            </tbody>
        </table>

            
        </div>

    </div>
</div>
@endsection
