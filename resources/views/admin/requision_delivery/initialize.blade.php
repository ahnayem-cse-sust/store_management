<style>
.table th,
.table td {
    padding: .75rem;
    vertical-align: middle;
    padding: 2px 15px;
    line-height: 1.462;
    border-top: 0;
}

.rqd {
    background-color: bisque;
    padding: 10px;
    padding-bottom: 1px;
}

.rqd-middle {
    background-color: #C2C2C2;
    padding: 10px;
    padding-bottom: 1px;
}
</style>
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="rqd">
            <table class="table table-bordered table-striped1">
                <tbody>
                    <tr>
                        <th colspan="4">
                            <h4 class="text-center">Section Requisition Delivery Order</h4>
                        </th>
                    </tr>
                    <tr>
                        <th style="width:150px;">{{ __('cruds.requisition_date') }}
                            <input type="hidden" name="requisition_id" value="{{ $requisition->id }}">
                        </th>
                        <td>{{ $requisition->requisition_date }}</td>
                        <th style="width:150px;">{{ __('cruds.requisition_code') }}</th>
                        <td>{{ $requisition->requisition_code }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.branch') }}</th>
                        <td>{{ isset($requisition->branch)?$requisition->branch->short_name:'' }}</td>
                        <th>{{ __('cruds.section') }}</th>
                        <td>{{ isset($requisition->section)?$requisition->section->section_name:'' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.product_receive_by') }}</th>
                        <td>{{ $requisition->receive_by }}</td>
                        <th>{{ __('cruds.party') }}</th>
                        <td>
                            {{ isset($requisition->party)?$requisition->party->party_name:'' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="rqd-middle">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        <p class="mg-b-2 tx-semibold">{{ trans('cruds.remarks') }}</p>
                        <input type="text" id="description" name="description" class="form-control"
                            placeholder="{{ trans('cruds.description') }}"
                            value="{{ old('description', isset($requisition) ? $requisition->description : '') }}">
                        @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </em>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group {{ $errors->has('challan_code') ? 'has-error' : '' }}">
                        <p class="mg-b-2 tx-semibold">{{ trans('cruds.challan_no') }} (<span class="required">*</span>)
                        </p>
                        <input type="text" id="challan_code" name="challan_code" class="form-control unique_code"
                            placeholder="{{ trans('cruds.challan_code') }}" value="" data-model="Challan"
                            data-prefix="CH" data-update_id="0" readonly required>
                        @if($errors->has('challan_code'))
                        <em class="invalid-feedback">
                            {{ $errors->first('challan_code') }}
                        </em>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group {{ $errors->has('challan_date') ? 'has-error' : '' }}">
                        <p class="mg-b-2 tx-semibold">{{ trans('cruds.challan_date') }}(<span class="required">*</span>)
                        </p>
                        <input type="text" id="challan_date" name="challan_date" class="form-control datepicker-date"
                            placeholder="{{ trans('cruds.challan_date') }}" value="{{ date('Y-m-d') }}">
                        @if($errors->has('challan_date'))
                        <em class="invalid-feedback">
                            {{ $errors->first('challan_date') }}
                        </em>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <p class="mg-b-2 tx-semibold">{{__('cruds.delivery_man')}} (<span class="required">*</span>)
                        </p>
                        <input type="text" id="delivery_man" name="delivery_man" class="form-control"
                            placeholder="{{__('cruds.delivery_man')}}" required>
                        @if($errors->has('delivery_man'))
                        <em class="invalid-feedback">
                            {{ $errors->first('delivery_man') }}
                        </em>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <p class="mg-b-2 tx-semibold">{{__('cruds.delivery_place')}} (<span class="required">*</span>)
                        </p>
                        <input type="text" id="delivery_place" name="delivery_place"
                            placeholder="{{__('cruds.delivery_place')}}" class="form-control" required>
                        @if($errors->has('delivery_place'))
                        <em class="invalid-feedback">
                            {{ $errors->first('delivery_place') }}
                        </em>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="rqd">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>{{ __('cruds.sl') }}</th>
                        <th>{{ __('cruds.item_name') }}</th>
                        <th>{{ __('cruds.unit') }}</th>
                        <th>{{ __('cruds.stock') }}</th>
                        <th>{{ __('cruds.order_qty') }}</th>
                        <th>{{ __('cruds.delivered_qty') }}</th>
                        <th>{{ __('cruds.undelivered_qty') }}</th>
                        <th>{{ __('cruds.currrent_delivered_qty') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($requisition->requisitionDetails))
                    @foreach($requisition->requisitionDetails as $key => $value)
                    @php

                    $ordered_quantity = $value->quantity ;
                    $where = [] ;
                    $where[] = ['requisition_details_id','=',$value->id] ;
                    $where[] = ['item_id','=',$value->item_id] ;
                    $delivered_quantity = \App\ChallanDetails::where($where)->sum('delivered_quantity');
                    $delivered_quantity = isset($delivered_quantity)?$delivered_quantity:0;
                    $undelivered_quantity = $ordered_quantity - $delivered_quantity ;

                    $current_delivery_quantity = $undelivered_quantity ;

                    $where = [] ;
                    $where[] = ['branch_id','=',$value->branch_id];
                    $where[] = ['warehouse_id','=',$value->warehouse_id];
                    $where[] = ['group_id','=',$value->group_id];
                    $where[] = ['subgroup_id','=',$value->subgroup_id];
                    $where[] = ['item_id','=',$value->item_id];

                    $presentStock =
                    presentStock($value->branch_id,$value->warehouse_id,$value->group_id,$value->subgroup_id,$value->item_id,'','');

                    if($undelivered_quantity > $presentStock){
                    $current_delivery_quantity = 0 ;
                    }
                    @endphp
                    <tr>
                        <td>{{ ($key + 1)}}
                            <input type="hidden" name="requisition_details_id[]" value="{{ $value->id }}">
                            <input type="hidden" name="item_id[]" value="{{ $value->item_id }}">
                            <input type="hidden" name="group_id[]" value="{{ $value->group_id }}">
                            <input type="hidden" name="subgroup_id[]" value="{{ $value->subgroup_id }}">
                            <input type="hidden" name="unit_id[]" value="{{ $value->unit_id }}">
                            <input type="hidden" name="ordered_quantity[]" value="{{ $value->quantity }}">
                            <input type="hidden" name="sale_price[]" value="{{ $value->sale_price }}">
                        </td>
                        <td>{{ isset($value->item)?$value->item->item_name:'' }}</td>
                        <td>{{ isset($value->item)?isset($value->item->unit)?$value->item->unit->unit_name:'':'' }}
                        </td>
                        <td style="text-align: right;" class="presentStock">{{ $presentStock }}</td>
                        <td style="text-align: right;" class="ordered_quantity">{{$value->quantity}}</td>
                        <td style="text-align: right;" class="delivered_quantity">{{ $delivered_quantity }}</td>
                        <td style="text-align: right;" class="undelivered_quantity">{{ $undelivered_quantity }}</td>
                        <td style="text-align: right;">
                            <input type="number" name="delivered_quantity[]"
                                class="form-control current_delivered_quantity"
                                value="{{ $current_delivery_quantity }}">
                        </td>
                    </tr>
                    @endforeach
                    @endif
                    <tr>
                        <td colspan="8" class="text-center">
                            <button type="submit"
                                class="btn btn-warning mt-1 mb-1">{{ __('cruds.confirm_delivery_order') }}</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
$(".datepicker-date").bootstrapdatepicker({
    format: "yyyy-mm-dd",
    viewMode: "date",
    autoclose: !0,
    multidateSeparator: "-"
}).on('keypress', function() {
    return false;
})
GenerateCode();

$(document).on('keyup', '.current_delivered_quantity', function() {
    let row, current_delivered_quantity, undelivered_quantity;
    row = $(this).closest('tr');
    current_delivered_quantity = $(this).val();
    current_delivered_quantity = +current_delivered_quantity;
    undelivered_quantity = row.find('td.undelivered_quantity').text();
    undelivered_quantity = +undelivered_quantity;
    presentStock = row.find('td.presentStock').text();
    presentStock = +presentStock;

    if (current_delivered_quantity > presentStock) {
        current_delivered_quantity = presentStock;
        $(this).val(current_delivered_quantity);
        if (current_delivered_quantity > undelivered_quantity) {
            current_delivered_quantity = undelivered_quantity;
            $(this).val(current_delivered_quantity);
        }
    }
})
</script>