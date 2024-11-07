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
                            <h4 class="text-center">TS Requisition Delivery Order</h4>
                        </th>
                    </tr>
                    <tr>
                        <th style="width:150px;">{{ __('cruds.tsitemissue_date') }}
                            <input type="hidden" name="tsitemissue_id" value="{{ $tsitemissue->id }}">
                        </th>
                        <td>{{ $tsitemissue->tsitemissue_date }}</td>
                        <th style="width:200px;">{{ __('cruds.tsitemissue_code') }}</th>
                        <td>{{ $tsitemissue->tsitemissue_code }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="rqd-middle">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group {{ $errors->has('tsitemreturn_code') ? 'has-error' : '' }}">
                        <p class="mg-b-2 tx-semibold">{{ trans('cruds.tsitemreturn_code') }} (<span class="required">*</span>)
                        </p>
                        <input type="text" id="tsitemreturn_code" name="tsitemreturn_code" class="form-control unique_code"
                            placeholder="{{ trans('cruds.tsitemreturn_code') }}" value="" data-model="TSItemReturn"
                            data-prefix="TSR" data-update_id="0" readonly required>
                        @if($errors->has('tsitemreturn_code'))
                        <em class="invalid-feedback">
                            {{ $errors->first('tsitemreturn_code') }}
                        </em>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group {{ $errors->has('tsitemreturn_date') ? 'has-error' : '' }}">
                        <p class="mg-b-2 tx-semibold">{{ trans('cruds.tsitemreturn_date') }}(<span class="required">*</span>)
                        </p>
                        <input type="text" id="tsitemreturn_date" name="tsitemreturn_date" class="form-control datepicker-date"
                            placeholder="{{ trans('cruds.tsitemreturn_date') }}" value="{{ date('Y-m-d') }}">
                        @if($errors->has('tsitemreturn_date'))
                        <em class="invalid-feedback">
                            {{ $errors->first('tsitemreturn_date') }}
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
                        <th>{{ __('cruds.order_qty') }}</th>
                        <th>{{ __('cruds.prev_return_quantity') }}</th>
                        <th>{{ __('cruds.return_quantity') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($tsitemissue->tsitemissueDetails))
                    @foreach($tsitemissue->tsitemissueDetails as $key => $value)
                    @php
                    $ordered_quantity = $value->quantity ;
                    $where = [] ;
                    $where[] = ['tsitemissue_details_id','=',$value->id] ;
                    $where[] = ['item_id','=',$value->item_id] ;
                    $return_quantity =  \App\TSItemReturnDetails::where($where)->sum('return_quantity');
                    $return_quantity = isset($return_quantity)?$return_quantity:0;
                    $unreturn_quantity = $ordered_quantity - $return_quantity ;
                    $current_return_quantity = $unreturn_quantity ;

                    $presentStock = 0 ; // ; presentStock($value->branch_id,$value->warehouse_id,$value->group_id,$value->subgroup_id,$value->item_id,'','');

                    @endphp
                    <?php if($return_quantity < $ordered_quantity){?>
                    <tr>
                        <td>{{ ($key + 1)}}
                            <input type="hidden" name="tsitemreturn_item_id[]" value="0">
                            <input type="hidden" name="tsitemissue_details_id[]" value="{{ $value->id }}">
                            <input type="hidden" name="item_id[]" value="{{ $value->item_id }}">
                            <input type="hidden" name="group_id[]" value="{{ $value->group_id }}">
                            <input type="hidden" name="subgroup_id[]" value="{{ $value->subgroup_id }}">
                            <input type="hidden" name="unit_id[]" value="{{ $value->unit_id }}">
                            <input type="hidden" name="order_quantity[]" value="{{ $value->quantity }}">
                        </td>
                        <td>{{ isset($value->item)?$value->item->item_name:'' }}</td>
                        <td>{{ isset($value->item)?isset($value->item->unit)?$value->item->unit->unit_name:'':'' }}
                        </td>
                        <td style="text-align: right;" class="ordered_quantity">{{$value->quantity}}</td>
                        <td style="text-align: right;" class="prev_return_quantity">{{$return_quantity}}</td>
                        <td style="text-align: right;">
                            <input type="number" name="return_quantity[]"
                                class="form-control current_return_quantity" value="{{ $current_return_quantity }}">
                        </td>
                    </tr>
                    <?php } ?>
                    @endforeach
                    @endif
                    <tr>
                        <td colspan="8" class="text-center">
                            <input type="hidden" name="update" value="0">
                            <button type="submit"
                                class="btn btn-warning mt-1 mb-1">{{ __('cruds.submit') }}</button>
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

$(document).on('keyup', '.current_return_quantity', function() {
    let presentStock = 0, row, current_return_quantity, unreturn_quantity;
    row = $(this).closest('tr');
    current_return_quantity = $(this).val();
    current_return_quantity = +current_return_quantity;
    unreturn_quantity = row.find('td.unreturn_quantity').text();
    unreturn_quantity = +unreturn_quantity;
    presentStock = row.find('td.presentStock').text();
    presentStock = +presentStock;
/*     if (current_return_quantity > unreturn_quantity) {
        current_return_quantity = unreturn_quantity;
        $(this).val(current_return_quantity);
        if(current_return_quantity > presentStock){
            current_return_quantity = presentStock;
            $(this).val(current_return_quantity);  
        }
    } */
})
</script>
