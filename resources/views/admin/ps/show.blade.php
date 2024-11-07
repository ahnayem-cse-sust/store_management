@extends('layouts.admin')
@section('content')
<style>
    table tr td span {
    padding: 0 10px;
    border-top: 1px solid #000;
}
</style>
<div class="card">
    <div class="card-header">
        {{ trans('cruds.show') }} {{ trans('cruds.ps') }}
    </div>

    <div class="card-body">
        <div class="mb-2 bg-bisque">
            
            <br>
            <div>
                <h2 class="text-center">Bangladesh Industrial Technical Assistance Center (BITAC), Dhaka</h2>
                <h3 class="text-center">116 (Kha), Tejgoan Industrial Area, Dhaka-1208</h3>
                <h4 class="text-center"><u>Procurement Slip</u></h4>
            </div>
            
            
            <div style="width: 80%;margin:0 auto;">
                <table class="table1 table-bordered1 table-striped1"  style="width:100%">
                    <tbody>
                        <tr>
                            <th style="width:215px;">{{ __('cruds.ps_code') }}</th>
                            <td style="width:35%;">: {{ $ps->ps_code }}</td>
                            <th style="width:215px;">{{ __('cruds.ps_date') }}</th>
                            <td style="width:25%;">: {{ $ps->ps_date }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('cruds.requisition_code') }}</th>
                            <td>: {{ isset($ps->requisition)?$ps->requisition->requisition_code:'' }}</td>
                            <th>{{ __('cruds.requisition_date') }}</th>
                            <td>: {{ isset($ps->requisition)?$ps->requisition->requisition_date:'' }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('cruds.job_name') }}</th>
                            <td>: {{ isset($ps->job)?$ps->job->job_name:'' }}</td>
                            <th>{{ __('cruds.party') }}</th>
                            <td>: {{ isset($ps->party)?$ps->party->party_name:'' }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('cruds.branch') }}</th>
                            <td>: {{ isset($ps->branch)?$ps->branch->short_name:'' }}</td>
                            <th>{{ __('cruds.section') }}</th>
                            <td>: {{ isset($ps->section)?$ps->section->section_name:'' }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('cruds.created_by') }}</th>
                            <td>: {{ isset($ps->createdBy)?$ps->createdBy->name:'' }}</td>
                            <th>{{ __('cruds.warehouse') }}</th>
                            <td>: {{ isset($ps->warehouse)?$ps->warehouse->warehouse_name:'' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="vertical-align: middle;" rowspan="2">{{ trans('cruds.sl') }}</th>
                            <th style="vertical-align: middle;" rowspan="2">{{ trans('cruds.item') }}</th>
                            <th style="vertical-align: middle;" rowspan="2">{{ __('cruds.unit') }}</th>
                            <th style="vertical-align: middle;" rowspan="2">{{ __('cruds.order_qty') }}</th>
                            <th>{{ __('cruds.prev_price') }}</th>
                            <th colspan="2">{{ __('cruds.current_price_filled_up_by_procurement') }}</th>
                            <th style="vertical-align: middle;" rowspan="2">{{ __('cruds.remarks') }}</th>

                        </tr>
                        <tr>
                            <th>{{ __('cruds.unit') }}</th>
                            <th>{{ __('cruds.unit') }}</th>
                            <th>{{ __('cruds.total_price') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($ps->psDetails))
                        @foreach($ps->psDetails as $key => $value)
                        <tr>
                            <td>{{ ($key + 1)}}
                            </td>
                            <td>{{ isset($value->item)?$value->item->item_name:'' }}</td>
                            <td>{{ isset($value->item)?isset($value->item->unit)?$value->item->unit->unit_name:'':'' }}
                            </td>
                            <td style="text-align: right;">{{$value->quantity}}
                            </td>
                            <td style="text-align: right;">{{$value->sale_price}}
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td style="text-align: right;">{{ $ps->description }}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <br>
            <br> <br>
            <div>
                <table width="100%">
                    <tr>
                        <td class="text-center"><span>Store Keeper </span> <br> BITAC, Dhaka</td>
                        <td class="text-center"><span>Assistant Store Officer</span> <br> BITAC, Dhaka</td>
                        <td class="text-center"><span>Store Officer</span> <br> BITAC, Dhaka</td>
                        <td class="text-center"><span>Additional Director</span> <br> BITAC, Dhaka</td>
                    </tr>
                </table>
            </div>
            <div style="padding-left:20px;">
                <table width="100%">
                    <tr>
                        <td class="text-left"><h4>Attachments: </h4> </td> 
                    </tr>
                    <tr>
                        <td class="text-left"> 1. Purchase Officer, BITAC, Dhaka. </td> 
                    </tr>
                    <tr>
                        <td class="text-left"> 2. Production Controller Division, BITAC, Dhaka. </td> 
                    </tr>
                </table>
            </div>
            <br>
            <br>
            <div>
                <table width="100%">
                    <tr>
                        <td class="text-center"> <u><h1> For Fillup by, Purchase Division, BITAC, Dhaka </h1></u> </td> 
                    </tr>

                </table>
            </div>

            <br>
            <div>
                <table width="100%">
                    <tr>
                        <td class="text-center"> 
                            <p> 
                                The approximate fund: TK. ........................................(In Word: TK...................................................................................................................) may require for above mentioned goods 
                                according to current market price.<br> Purchase Process can be considered in Cash/Direct/R.F.Q/R.T.M/O.T.M according to P.P.R 2003/2004
                                on approval.
                            </p> 
                        </td> 
                    </tr>

                </table>
            </div> 
            
            <br><br><br>
            <div>
                <table width="100%">
                    <tr>
                        <td class="text-center"><span>Procurement Assistant </span> </td>
                        <td class="text-center"><span>Procurement Officer</span> </td>
                        <td class="text-center"><span>Additional Director</span> </td>
                        <td class="text-center"><span>Director</span> </td>
                    </tr>
                </table>
            </div>
            
            <a class="btn btn-warning ripple" href="{{ url()->previous() }}">
                {{ trans('cruds.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection