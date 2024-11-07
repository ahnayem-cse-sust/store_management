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
                                    <th>{{ __('cruds.remarks') }}</th>
                                    <th class="d-none">{{ __('cruds.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $current_receive = 0 ;
                                $sar_current_receive = 0 ;
                                $from_current_receive = 0 ;
                                $from_sar_current_receive = 0 ;
                                $balance_amount = 0;
                                $sar_balance_amount = 0;
                                $cumulative_balance_amount = 0;
                                $cumulative_sar_balance_amount = 0;

                                $to = ' ('.trans('cruds.to').')';
                                $from = ' ('.trans('cruds.from').')';
                                $balance_transfer = trans('cruds.balance_transfer');
                                @endphp


                                @foreach ($vouchers as $key => $voucher )
                                @php
                                $status = $voucher->status ;
                                if($voucher->status == "Contra_Voucher"){
                                if($voucher->transaction_type == 'Cr'){
                                $status = $balance_transfer.$to;
                                }elseif($voucher->transaction_type == 'Dr'){
                                $status = $balance_transfer.$from ;
                                }

                                }else{
                                $status = $voucher->status ;
                                }

                                if($voucher->transaction_type == 'Cr'){
                                $current_receive += $voucher->current_receive ;
                                $sar_current_receive += $voucher->sar_current_receive ;
                                }elseif($voucher->transaction_type == 'Dr'){
                                $from_current_receive += $voucher->current_receive ;
                                $from_sar_current_receive += $voucher->sar_current_receive ;
                                }


                                @endphp
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    <td>{{ $voucher->date }}</td>
                                    <td>{{ str_replace('_',' ',$status) }}</td>
                                    <td>{{ $voucher->prefix.PAD($voucher->serial) }}</td>
                                    <td>{{ $voucher->office_name }}<br>{{ $voucher->office_name_ar }}</td>
                                    <td class="tx-right">{{ $voucher->current_receive }}</td>
                                    <td class="tx-right">{{ $voucher->sar_current_receive }}</td>
                                    <td>
                                        {{ $voucher->remarks }}<br>
                                        {{ $voucher->remarks_ar }}
                                    </td>
                                    <td class="d-none">
                                        <a href="/admin/report_management/view_customer_account?passenger_id={{ $voucher->passenger_id }}"
                                            target="_blank" class="btn ripple btn-warning">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5" class="tx-right">{{ __('cruds.to_amount') }}</th>
                                    <th class="tx-right">{{$current_receive}}</th>
                                    <th class="tx-right">{{$sar_current_receive}}</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="tx-right">{{ __('cruds.from_amount') }}</th>
                                    <th class="tx-right">{{$from_current_receive}}</th>
                                    <th class="tx-right">{{$from_sar_current_receive}}</th>
                                    <th></th>
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
