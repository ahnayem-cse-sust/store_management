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
        {{ trans('cruds.show') }} {{ trans('cruds.material_receive') }}
    </div>

    <div class="card-body">
        <div class="mb-2  bg-bisque">
            <br>
            <div>
                <h2 class="text-center">Bangladesh Industrial Technical Assistance Center (BITAC), Dhaka</h2>
                <h3 class="text-center">116 (Kha), Tejgoan Industrial Area, Dhaka-1208</h3>
                <h4 class="text-center"><u>Inspection and Receive Report</u></h4>
            </div>
            <div style="margin: 0 auto;width:80%">
                <table style="width:100%;">
                    <tbody>
                        {{-- <tr>
                            <th>{{ __('cruds.material_receive_code') }}</th>
                        <td>{{ $material_receive->material_receive_code }}</td>
                        <th>{{ __('cruds.material_receive_date') }}</th>
                        <td>{{ $material_receive->material_receive_date }}</td>
                        </tr> --}}
                        <tr>
                            <th style="width:200px;">{{ __('cruds.purchase_order_no') }}</th>
                            <td style="width:50%;">: {{ $material_receive->purchase_order_no }}</td>
                            <th style="width:200px;">
                                @php
                                $ps_id = $material_receive->ps_id ;
                                if(!empty($ps_id)){
                                $ex = explode(',',$ps_id);
                                }else{
                                $ex = [-1];
                                }
                                $ps_order = \App\PS::whereIn('id',$ex);
                                $ps_order_no = $ps_order->pluck('ps_code')->toArray();
                                if(isset($ps_order_no)){
                                $ps_order_no = implode(',',$ps_order_no);
                                }else{
                                $ps_order_no = '';
                                }
                                $ps_order_date = $ps_order->pluck('ps_date')->toArray();
                                if(isset($ps_order_date)){
                                $ps_order_date = implode(',',$ps_order_date);
                                }else{
                                $ps_order_date = '' ;
                                }
                                @endphp
                                {{ __('cruds.ps_order_no') }}</th>
                            <td style="width:20%;">: {{ $ps_order_no }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('cruds.purchase_order_date') }}</th>
                            <td>: {{ $material_receive->purchase_order_date }}</td>
                            <th>{{ __('cruds.ps_order_date') }}</th>
                            <td>: {{ $ps_order_date }}</td>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-center">{{ __('cruds.vendor') }}

                                : {{ isset($material_receive->vendor)?$material_receive->vendor->vendor_name:'' }}</td>
                        </tr>
                        <tr>
                            <th>Challan No.</th>
                            <td>: {{ $material_receive->challan_no }}</td>
                            <th>Challan Date</th>
                            <td>: {{ $material_receive->challan_date }}</td>
                            
                        </tr>
                        <tr>
                            <th>{{ __('cruds.material_receive_code') }}</th>
                            <td>: {{ $material_receive->material_receive_code }}</td>
                            <th>{{ __('cruds.material_receive_date') }}</th>
                            <td>: {{ $material_receive->material_receive_date }}</td>
                           {{--   --}}
                        </tr>
                        <tr>
                            <th>{{ __('cruds.bill_no') }}</th>
                            <td>: {{ $material_receive->bill_no }}</td>
                            <th>{{ __('cruds.bill_date') }}</th>
                            <td>: {{ $material_receive->bill_date }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <div style="padding: 10px;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('cruds.sl') }}</th>
                            <th>{{ trans('cruds.item') }}</th>
                            <th>{{ __('cruds.unit') }}</th>
                            <th>{{ __('cruds.order_qty') }}</th>
                            <th>{{ __('cruds.receive_qty') }}</th>
                            <th>{{ __('cruds.unit_price') }}</th>
                            <th>{{ __('cruds.total_price') }}</th>
                            <th>{{ trans('cruds.item_code') }}</th>
                            <th>{{ __('cruds.volume') }}</th>
                            <th>{{ __('cruds.page') }}</th>
                            <th>{{ __('cruds.remarks') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total_price = 0 ;
                        @endphp
                        @if(isset($material_receive->material_receiveDetails))
                        @foreach($material_receive->material_receiveDetails as $key => $value)
                        @php
                        $total_price += $value->total_price ;
                        @endphp
                        <tr>
                            <td>{{ ($key + 1)}}
                                <input type="hidden" value="{{$value->id}}" name="material_receive_item_id[]" />
                                <input type="hidden" value="{{$value->item_id}}" name="item_id[]" />
                                <input type="hidden" value="{{$value->group_id}}" name="group_id[]" />
                                <input type="hidden" value="{{$value->subgroup_id}}" name="subgroup_id[]" />
                                <input type="hidden" value="{{$value->unit_id}}" name="unit_id[]" />
                                <input type="hidden" value="{{$value->sale_price}}" name="sale_price[]" />
                                <input type="hidden" value="{{$value->order_quantity}}" name="order_quantity[]" />
                                <input type="hidden" value="{{$value->receive_quantity}}" name="receive_quantity[]" />
                                <input type="hidden" value="{{$value->total_price}}" name="total_price[]" />
                                <input type="hidden" value="{{$value->branch_id}}" name="branch_id[]" />
                                <input type="hidden" value="{{$value->warehouse_id}}" name="warehouse_id[]" />
                            </td>
                            <td>{{ isset($value->item)?$value->item->item_name:'' }}</td>
                            <td>{{ isset($value->item)?isset($value->item->unit)?$value->item->unit->unit_name:'':'' }}
                            </td>
                            <td style="text-align:right">{{$value->order_quantity}}
                            </td>
                            <td style="text-align:right">{{$value->receive_quantity}}
                            </td>
                            <td style="text-align:right">{{$value->sale_price}}
                            </td>
                            <td style="text-align:right">{{ $value->total_price }}
                            </td>
                            <td>{{ isset($value->item)?$value->item->item_code:'' }}</td>
                            <td>{{ isset($value->item)?$value->item->volume_location:'' }}</td>
                            <td>{{ isset($value->item)?$value->item->page_location:'' }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5"><span>In word: {{ convert_number_to_words($total_price) }} TK. only</span>
                            </th>
                            <th>Total Price</th>
                            <td style="text-align:right">{{ $total_price }}</td>
                            <td colspan="4"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div style="padding: 10px">
                <table style="width:100%;">
                    <tr>
                        <th style="width:50%">{{ $material_receive->inspection_name }}</th>
                        <th style="width:50%; text-align:right;">{{ $material_receive->description }}</th>
                    </tr>
                </table>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div>
                <table width="100%">
                    <tr>
                        <td class="text-center"><span>(Signature of Inspection
                                Officer)</span><br>BITAC, Dhaka
                        </td>
                        <td class="text-center"><span>Store Keeper</span><br>BITAC, Dhaka</td>
                        <td class="text-center"><span>Assistant Store keeper</span><br>BITAC, Dhaka</td>
                        <td class="text-center"><span>Store Keeper</span><br>BITAC, Dhaka</td>
                    </tr>
                </table>
            </div>
            <br>
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
