@extends('layouts.report_admin')
@section('content')
@include('admin.common.print')
<style>
td span {
    border-right: 1px solid #000;
    padding: 10px 5px;
}
</style>
<div class="card legal-page">
    @include('admin.common.report_header')
    <div class="card-body">
        @php
        $slug = slug();
        $current_receive = $slug."_current_receive";
        @endphp
        @if(isset($vouchers))
        <div class="row row-sm">
            <div class="col-md-12">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Income">
                            <thead>
                                <tr>
                                    <th>{{ __('cruds.sl') }}</th>
                                    @if(empty($office_id))
                                    <th>{{ __('cruds.opening') }} ({{ __("cruds.bdt") }})</th>
                                    <th>{{ __('cruds.opening') }} ({{ __("cruds.sar") }})</th>
                                    @else
                                    <th>{{ __('cruds.date') }}</th>
                                    <th>{{ __('cruds.transaction_type') }}</th>
                                    <th>{{ __('cruds.voucher_no') }}</th>
                                    @endif
                                    <th>{{ __('cruds.office') }}</th>
                                    <th>{{ __('cruds.amount') }} ({{ __("cruds.bdt") }})</th>
                                    <th>{{ __('cruds.amount') }} ({{ __("cruds.sar") }})</th>
                                    <th>{{ __('cruds.balance') }} ({{ __("cruds.bdt") }})</th>
                                    <th>{{ __('cruds.balance') }} ({{ __("cruds.sar") }})</th>
                                    <th class="d-none">{{ __('cruds.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $current_receive = 0 ;
                                $sar_current_receive = 0 ;
                                $balance_amount = 0;
                                $sar_balance_amount = 0;
                                $cumulative_balance_amount = 0;
                                $cumulative_sar_balance_amount = 0;

                                if(!empty($office_id)){
                                $current_receive += $opening_amount ;
                                $sar_current_receive += $opening_sar_amount ;
                                $cumulative_balance_amount += $opening_amount ;
                                $cumulative_sar_balance_amount += $opening_sar_amount ;
                                }

                                $to = ' ('.trans('cruds.to').')';
                                $from = ' ('.trans('cruds.from').')';
                                $balance_transfer = trans('cruds.balance_transfer');
                                $receive_voucher = trans('cruds.receive_voucher');
                                $payment_voucher = trans('cruds.payment_voucher');

                                @endphp
                                @if(!empty($office_id))
                                <tr>
                                    <td colspan="5" class="tx-right">{{ __('cruds.opening') }}</td>
                                    <td class="tx-right">{{ $opening_amount }}</td>
                                    <td class="tx-right">{{ $opening_sar_amount }}</td>
                                </tr>
                                @endif


                                @foreach ($vouchers as $key => $voucher )
                                @php
                                $status = $voucher->status ;
                                if($voucher->status == "Contra_Voucher"){
                                if($voucher->transaction_type == 'Cr'){
                                $status = $balance_transfer.$to;
                                }elseif($voucher->transaction_type == 'Dr'){
                                $status = $balance_transfer.$from;
                                }
                                }else{
                                $status = $voucher->status ;
                                if($voucher->transaction_type == 'Cr'){
                                $status = $receive_voucher;
                                }else{
                                $status = $payment_voucher;
                                }
                                }

                                if($voucher->transaction_type == 'Cr'){
                                $current_receive += $voucher->current_receive ;
                                $sar_current_receive += $voucher->sar_current_receive ;
                                $cumulative_balance_amount += $voucher->current_receive ;
                                $cumulative_sar_balance_amount += $voucher->sar_current_receive ;
                                }elseif($voucher->transaction_type == 'Dr'){
                                $current_receive -= $voucher->current_receive ;
                                $sar_current_receive -= $voucher->sar_current_receive ;
                                $cumulative_balance_amount -= $voucher->current_receive ;
                                $cumulative_sar_balance_amount -= $voucher->sar_current_receive ;
                                }

                                if(empty($office_id)){
                                $current_receive += $voucher->current_receive ;
                                $sar_current_receive += $voucher->sar_current_receive ;
                                $balance_amount += $voucher->balance_amount ;
                                $sar_balance_amount += $voucher->sar_balance_amount ;
                                }

                                @endphp
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    @if(empty($office_id))
                                    <td>{{ $voucher->opening }}</td>
                                    <td>{{ $voucher->opening_sar_amount }}</td>
                                    @else
                                    <td>{{ $voucher->date }}</td>
                                    <td>{{ str_replace('_',' ',$status) }}</td>
                                    <td>{{ $voucher->prefix.PAD($voucher->serial) }}</td>
                                    @endif
                                    <td>{{ $voucher->office_name }}<br>{{ $voucher->office_name_ar }}</td>
                                    <td class="tx-right">{{ $voucher->current_receive }}</td>
                                    <td class="tx-right">{{ $voucher->sar_current_receive }}</td>
                                    <td class="d-none">
                                        <a href="/admin/report_management/view_customer_account?passenger_id={{ $voucher->passenger_id }}"
                                            target="_blank" class="btn ripple btn-warning">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    @if(empty($office_id))
                                    <td class="tx-right">{{ $voucher->balance_amount }}</td>
                                    <td class="tx-right">{{ $voucher->sar_balance_amount }}</td>
                                    @else
                                    <td class="tx-right">{{ $cumulative_balance_amount }}</td>
                                    <td class="tx-right">{{ $cumulative_sar_balance_amount }}</td>
                                    @endif

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    @if(empty($office_id))
                                    <th colspan="4" class="tx-right">{{ __('cruds.balance') }}</th>
                                    <th class="tx-right">{{$current_receive}}</th>
                                    <th class="tx-right">{{$sar_current_receive}}</th>
                                    <th class="tx-right">{{$balance_amount}}</th>
                                    <th class="tx-right">{{$sar_balance_amount}}</th>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection