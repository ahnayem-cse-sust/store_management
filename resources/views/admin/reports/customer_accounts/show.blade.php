@extends('layouts.report_admin')
@section('content')
@include('admin.common.print')
<style>
    td span{
        border-right:1px solid #000;
        padding: 10px 5px;
    }
</style>
<div class="card legal-page">
    @include('admin.common.report_header')
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>{{ __('cruds.passenger_id') }}</th>
                    <td>{{ $passenger->prefix. PAD($passenger->serial)}}</td>
                    <th>{{ __('cruds.passport_no') }}</th>
                    <td>{{ $passenger->passport_no}}</td>
                    <th>{{ __('cruds.passenger_service_name') }}</th>
                    <td>{{ $passenger->first_name}}</td>
                </tr>
                <tr>
                    <th>{{ __('cruds.office_name') }}</th>
                    <td>{{ isset($passenger->passenger_office)?$passenger->passenger_office->office_name:''}}</td>
                    <th>{{ __('cruds.agent_name') }}</th>
                    <td>{{ isset($passenger->agent)?$passenger->agent->agent_name:''}}</td>
                    <th>{{ __('cruds.visa_type') }}</th>
                    <td>{{ isset($passenger->visa_type)?$passenger->visa_type->type_name:''}}</td>
                </tr>
                <tr>
                    <th>{{ __('cruds.contact_no') }}</th>
                    <td>{{ $passenger->contact_no}}</td>
                    <th>{{ __('cruds.sponsor_name') }}</th>
                    <td>{{ isset($passenger->sponsor)?$passenger->sponsor->sponsor_name:''}}</td>
                    <td colspan="2"></td>
                </tr>
                
            </thead>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="2" style="text-align: center;background:yellow!important;">{{ __('cruds.passenger_transaction') }}</th>
                </tr>
            </thead>
            <tbody>
                <td style="padding:0!important;">
                    <table class="table table-bordered" style="margin-bottom:0!important">
                        <tbody>
                            <tr style="background-color:lightgreen!important;">
                                <td class="tx-center">{{ __('cruds.head_name') }}</td>
                                <td class="tx-center">{{ __('cruds.bdt') }}</td>
                                <td class="tx-center">{{ __('cruds.sar') }}</td>
                                <td class="tx-center">{{ __('cruds.total_receive') }}</td>
                                <td class="tx-center">{{ __('cruds.total_dues') }}</td>
                            </tr>
                            @php
                                $amount = slug() . "_amount";
                                $current_receive = slug() . "_current_receive";
                                $contact_amount = slug() . "_contact_amount";
                                $profit_amount = slug() . "_profit_amount";
                                $total_received = 0 ;
                                $total_dues = 0 ;
                            @endphp
                            @if(isset($passenger->transactions))
                                @foreach ($chunks[0] as $key => $transaction)
                                    @php
                                    $total_amount = $transaction->$amount;
                                    $where = [] ;
                                    $where[] = ['transaction_type','=','Cr'] ;
                                    $where[] = ['passenger_id','=',$passenger->id] ;
                                    $where[] = ['expenditure_sector_id','=',$transaction->expenditure_sector_id] ;
                                        $received_amount = \App\ReceiveVoucherDetails::where($where)->sum($current_receive);
                                        $received_amount = isset($received_amount)?$received_amount:0;
                                        $dues_amount = $total_amount - $received_amount ; 
                                        $total_received += $received_amount;
                                        $total_dues += $dues_amount;
                                    @endphp
                                    <tr>
                                        <td>{{ $transaction->expenditureSector->sector_name }}</td>
                                        <td class="tx-right">{{ $total_amount }}</td>
                                        <td class="tx-right">{{ $transaction->sar_amount }}</td>
                                        <td class="tx-right">{{ $received_amount }}</td>
                                        <td class="tx-right">{{ $dues_amount }}</td>
                                    </tr>
                                @endforeach
                                @endif
                        </tbody>
                    </table>
                </td>
                <td style="padding:0!important;">
                    <table class="table table-bordered" style="margin-bottom:0!important">
                        <tbody>
                            <tr style="background-color:lightgreen!important;">
                                <td class="tx-center">{{ __('cruds.head_name') }}</td>
                                <td class="tx-center">{{ __('cruds.bdt') }}</td>
                                <td class="tx-center">{{ __('cruds.sar') }}</td>
                                <td class="tx-center">{{ __('cruds.total_receive') }}</td>
                                <td class="tx-center">{{ __('cruds.total_dues') }}</td>
                            </tr>
                            @if(isset($passenger->transactions))
                                @foreach ($chunks[1] as $key => $transaction)
                                    @php
                                    $total_amount = $transaction->$amount;
                                    $where = [] ;
                                    $where[] = ['transaction_type','=','Cr'] ;
                                    $where[] = ['passenger_id','=',$passenger->id] ;
                                    $where[] = ['expenditure_sector_id','=',$transaction->expenditure_sector_id] ;
                                        $received_amount = \App\ReceiveVoucherDetails::where($where)->sum($current_receive);
                                        $received_amount = isset($received_amount)?$received_amount:0;
                                        $dues_amount = $total_amount - $received_amount ;
                                        $total_received += $received_amount;
                                        $total_dues += $dues_amount;
                                    @endphp
                                    <tr>
                                        <td>{{ $transaction->expenditureSector->sector_name }}</td>
                                        <td class="tx-right">{{ $total_amount }}</td>
                                        <td class="tx-right">{{ $transaction->sar_amount }}</td>
                                        <td class="tx-right">{{ $received_amount }}</td>
                                        <td class="tx-right">{{ $dues_amount }}</td>
                                    </tr>
                                @endforeach
                                @endif
                        </tbody>
                    </table>
                </td>
                <tr>
                    <td colspan="2" style="background-color:lightgreen!important;">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" style="background-color:yellow!important;text-align:center">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>{{ __('cruds.contact_amount') }}</td><td> {{ $passenger->$contact_amount }}/=</td>
                                    <td>{{ __('cruds.profit_amount') }} </td><td> {{ $passenger->$profit_amount }}/=</td>
                                    <td>{{ __('cruds.total_receive') }} </td><td> {{ $total_received }}/=</td>
                                    <td>{{ __('cruds.total_dues') }} </td><td> {{ $total_dues }}/=</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                
                
            </tbody>
        </table>
    </div>
</div>
@endsection