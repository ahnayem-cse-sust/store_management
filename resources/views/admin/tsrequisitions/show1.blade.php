@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.show') }} {{ trans('cruds.tsrequisition') }}
    </div>

    <div class="card-body">
        <div class="mb-2  bg-bisque">
            <br>
            <div>
                <h2 class="text-center">Bangladesh Industrial Technical Assistance Center (BITAC), Dhaka</h2>
                <h3 class="text-center">116 (Kha), Tejgoan Industrial Area, Dhaka-1208</h3>
                <h4 class="text-center"><u>Tools Store Item Request</u></h4>
            </div>
            <br>
            <div style="width:80%;margin:0 auto;">
                <table style="width:100%" class="table1 table-bordered1 table-striped1">
                    <tbody>
                        <tr>
                            <th>{{ __('cruds.tsrequisition_code') }}</th>
                            <td colspan="3">: {{ $tsrequisition->tsrequisition_code }}</td>
                        </tr>
                        <tr>
                            <th style="width:300px;">{{ __('cruds.tsrequisition_date') }}</th>
                            <td style="width:30%;">: {{ $tsrequisition->tsrequisition_date }}</td>
                            <th style="width:300px;">{{ __('cruds.tsrequisition_delivery_date') }}</th>
                            <td style="width:30%;">: {{ $tsrequisition->tsrequisition_delivery_date }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('cruds.branch') }}</th>
                            <td>: {{ isset($tsrequisition->branch)?$tsrequisition->branch->short_name:'' }}</td>
                            <th>{{ __('cruds.warehouse_from') }}</th>
                            <td>:
                                {{ isset($tsrequisition->warehouseFrom)?$tsrequisition->warehouseFrom->warehouse_name:'' }}
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('cruds.created_by') }}</th>
                            <td>: {{ isset($tsrequisition->createdBy)?$tsrequisition->createdBy->name:'' }}</td>
                            <th>{{ __('cruds.warehouse_to') }}</th>
                            <td>:
                                {{ isset($tsrequisition->warehouseTo)?$tsrequisition->warehouseTo->warehouse_name:'' }}
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('cruds.product_receive_by') }}</th>
                            <td colspan="3">: {{ $tsrequisition->receive_by }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('cruds.remarks') }}</th>
                            <td colspan="3">: {{ $tsrequisition->description }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{ __('cruds.sl') }}</th>
                            <th>{{ __('cruds.item') }}</th>
                            <th>Unit</th>
                            <th>Qty</th>
                            <th>U.Price</th>
                            <th>T.Price</th>
                            <th>P.Code</th>
                            <th>Page</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($tsrequisition->tsrequisitionDetails))
                        @foreach($tsrequisition->tsrequisitionDetails as $key => $value)
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
                            <td style="text-align: right;">{{ $value->total_price }}
                            </td>
                            <td>{{ isset($value->item)?$value->item->item_code:'' }}</td>
                            <td style="text-align: right;">{{ isset($value->item)?$value->item->page_location:'' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <br>
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
