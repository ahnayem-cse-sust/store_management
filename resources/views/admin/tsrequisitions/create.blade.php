@extends('layouts.admin')
@section('content')
<style>
fieldset {
    background-color: #eeeeee;
}


legend {
    background-color: #66cc00;
    color: white !important;
    width: inherit !important;
    float: none !important;
    display: block;
    /* width: 100%; */
    /* max-width: 100%; */
    padding: 0 10px;
    margin-bottom: .5rem;
    font-size: 1.5rem;
    line-height: inherit;
    color: inherit;
    white-space: normal;
    border-radius: 5px;
}

fieldset {
    min-width: 0;
    padding: inherit;
    margin: inherit;
    border: 1px solid #000 !important;
}

.table-bordered,
.table-bordered th,
.table-bordered td {
    border: 1px solid gray !important;
    text-align: center;
}

.submit-div1 {
    display: none;
}
</style>
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    {{ trans('cruds.create') }} {{ trans('cruds.tsrequisition') }}
                </h5>
                <div class="card-options">
                    <a href="javascript:;" class="card-options-collapse py-0" data-bs-toggle="card-collapse"><i
                            class="fe fe-chevron-up"></i></a>
                    <a href="javascript:;" class="card-options-fullscreen py-0" data-bs-toggle="card-fullscreen"><i
                            class="fe fe-maximize"></i></a>
                    <a href="javascript:;" class="card-options-remove py-0" data-bs-toggle="card-remove"><i
                            class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route("admin.tsrequisition.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('tsrequisition_code') ? 'has-error' : '' }}">
                                <p class="mg-b-2 tx-semibold">{{ trans('cruds.tsrequisition_code') }} (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="tsrequisition_code" name="tsrequisition_code"
                                    data-model="TSRequisition" data-prefix="TS"
                                    data-update_id="{{ isset($tsrequisition) ? $tsrequisition->id : 0 }}"
                                    class="form-control unique_code" placeholder="{{ trans('cruds.tsrequisition_code') }}"
                                    value="{{ old('tsrequisition_code', isset($tsrequisition) ? $tsrequisition->tsrequisition_code : '') }}"
                                    required>
                                @if($errors->has('tsrequisition_code'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('tsrequisition_code') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('tsrequisition_date') ? 'has-error' : '' }}">
                                <p class="mg-b-2 tx-semibold">{{ trans('cruds.tsrequisition_date') }} (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="tsrequisition_date" name="tsrequisition_date"
                                    class="form-control datepicker-date"
                                    placeholder="{{ trans('cruds.tsrequisition_date') }}" value="{{ date('Y-m-d') }}"
                                    value="{{ old('tsrequisition_date', isset($tsrequisition) ? $tsrequisition->tsrequisition_date : '') }}"
                                    required>
                                @if($errors->has('tsrequisition_date'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('tsrequisition_date') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('tsrequisition_delivery_date') ? 'has-error' : '' }}">
                                <p class="mg-b-2 tx-semibold">{{ trans('cruds.tsrequisition_delivery_date') }}</p>
                                <input type="text" id="tsrequisition_delivery_date" name="tsrequisition_delivery_date"
                                    class="form-control datepicker-date"
                                    placeholder="{{ trans('cruds.tsrequisition_delivery_date') }}"
                                    value="{{ old('tsrequisition_delivery_date', isset($tsrequisition) ? $tsrequisition->tsrequisition_delivery_date : '') }}">
                                @if($errors->has('tsrequisition_delivery_date'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('tsrequisition_delivery_date') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-2 tx-semibold">{{__('cruds.branch_name')}} (<span
                                        class="required">*</span>)
                                </p>
                                <select id="branch_id" name="branch_id" class="form-control select2" required>
                                    <?=options('branches', array(), array(), 'id', 'short_name', 'id', 'asc', trans('cruds.select'), isset($tsrequisition) ? $tsrequisition->branch_id : 1)?>
                                </select>
                                @if($errors->has('branch_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('branch_id') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-2 tx-semibold">{{__('cruds.warehouse_from')}} (<span
                                        class="required">*</span>)
                                </p>
                                <select id="warehouse_from_id" name="warehouse_from_id" class="form-control select2" required>
                                    <?=options('warehouses', array('type'=>'Main'), array('warehouse_code', 'warehouse_name'), 'id', '', 'id', 'asc', '', isset($tsrequisition) ? $tsrequisition->warehouse_from_id : 0)?>
                                </select>
                                @if($errors->has('warehouse_from_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('warehouse_from_id') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-2 tx-semibold">{{__('cruds.warehouse_to')}} (<span
                                        class="required">*</span>)
                                </p>
                                <select id="warehouse_to_id" name="warehouse_to_id" class="form-control select2" required>
                                    <?=options('warehouses', array('type'=>'Tools'), array('warehouse_code', 'warehouse_name'), 'id', '', 'id', 'asc', '', isset($tsrequisition) ? $tsrequisition->warehouse_to_id : 0)?>
                                </select>
                                @if($errors->has('warehouse_to_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('warehouse_to_id') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('receive_by') ? 'has-error' : '' }}">
                                <p class="mg-b-2 tx-semibold">{{ trans('cruds.product_receive_by') }}</p>
                                <input type="text" id="receive_by" name="receive_by" class="form-control"
                                    placeholder="{{ trans('cruds.product_receive_by') }}"
                                    value="{{ old('receive_by', isset($tsrequisition) ? $tsrequisition->receive_by : '') }}">
                                @if($errors->has('receive_by'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('receive_by') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <p class="mg-b-2 tx-semibold">{{ trans('cruds.remarks') }}</p>
                                <input type="text" id="description" name="description" class="form-control"
                                    placeholder="{{ trans('cruds.description') }}"
                                    value="{{ old('description', isset($tsrequisition) ? $tsrequisition->description : '') }}">
                                @if($errors->has('description'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <legend>Choose item to TSRequisition</legend>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <p class="mg-b-10 tx-semibold">{{__('cruds.group')}}
                                            </p>
                                            <select id="group_id" name="group_id" class="form-control select2">
                                                <?=options('groups', array(), array(), 'id', 'group_name', 'id', 'asc', trans('cruds.select'), isset($item) ? $item->group_id : 0)?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {{ $errors->has('subgroup_id') ? 'has-error' : '' }}">
                                            <p class="mg-b-10 tx-semibold">{{__('cruds.subgroup')}}
                                            </p>
                                            <select id="subgroup_id" name="subgroup_id" class="form-control select2">
                                                <?=options('subgroups', array(), array(), 'id', 'subgroup_name', 'id', 'asc', trans('cruds.select'), isset($item) ? $item->subgroup_id : 0)?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="hidden" id="tsrequisition_item_id" value="0">
                                        <div class="form-group {{ $errors->has('item_id') ? 'has-error' : '' }}">
                                            <p class="mg-b-10 tx-semibold">{{__('cruds.item')}} (<span
                                                    class="required">*</span>)
                                            </p>
                                            <select id="item_id" name="item_id" class="form-control select2">
                                                <?=options('items', array(), array(), 'id', 'item_name', 'id', 'asc', trans('cruds.select'), isset($item) ? $item->subgroup_id : 0, ['item_code', 'group_id', 'subgroup_id', 'unit_id', 'sale_price','page_location'])?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="display: none;">
                                        <div class="form-group {{ $errors->has('sale_price') ? 'has-error' : '' }}">
                                            <p class="mg-b-2 tx-semibold">{{ trans('cruds.sale_price') }}</p>
                                            <input type="number" id="sale_price" name="sale_price" class="form-control"
                                                placeholder="{{ trans('cruds.sale_price') }}"
                                                value="{{ old('sale_price', isset($tsrequisition) ? $tsrequisition->sale_price : '') }}">
                                            @if($errors->has('sale_price'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('sale_price') }}
                                            </em>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {{ $errors->has('unit_id') ? 'has-error' : '' }}">
                                            <p class="mg-b-10 tx-semibold">{{__('cruds.unit')}}
                                            </p>
                                            <select id="unit_id" name="unit_id" class="form-control select2" disabled>
                                                <?=options('units', array(), array(), 'id', 'unit_name', 'id', 'asc', trans('cruds.select'), isset($item) ? $item->unit_id : 0)?>
                                            </select>
                                            @if($errors->has('unit_id'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('unit_id') }}
                                            </em>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {{ $errors->has('present_stock') ? 'has-error' : '' }}">
                                            <p class="mg-b-2 tx-semibold">{{ trans('cruds.present_stock') }}</p>
                                            <input type="number" id="present_stock" name="present_stock"
                                                class="form-control" placeholder="{{ trans('cruds.present_stock') }}"
                                                value="{{ old('present_stock', isset($tsrequisition) ? $tsrequisition->present_stock : '') }}"
                                                readonly>
                                            @if($errors->has('present_stock'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('present_stock') }}
                                            </em>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                                            <p class="mg-b-2 tx-semibold">{{ trans('cruds.quantity') }}(<span
                                                    class="required">*</span>)</p>
                                            <input type="number" id="quantity" name="quantity" class="form-control"
                                                placeholder="{{ trans('cruds.quantity') }}"
                                                value="{{ old('quantity', isset($tsrequisition) ? $tsrequisition->quantity : '') }}">
                                            @if($errors->has('quantity'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('quantity') }}
                                            </em>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <a href="javascript:void(0)" class="btn btn-warning mt-4  btnAddNew"><i
                                                    class="fas fa-plus"></i> Add</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr>
                                        <div class="table-responsive">
                                            <table class="table table-bordered mg-b-0 table-tsrequisition_item">
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Item Name & Description</th>
                                                        <th>Unit</th>
                                                        <th>Qty</th>
                                                        <th>U.Price</th>
                                                        <th>T.Price</th>
                                                        <th>P.Code</th>
                                                        <th>Page</th>
                                                        <th style="width:100px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(isset($tsrequisition->tsrequisitionDetails))
                                                    @foreach($tsrequisition->tsrequisitionDetails as $key => $value)
                                                    <tr>
                                                        <td>{{ ($key + 1)}}
                                                            <input type="hidden" value="{{$value->id}}"
                                                                name="tsrequisition_item_id[]" />
                                                            <input type="hidden" value="{{$value->item_id}}"
                                                                name="item_id[]" />
                                                            <input type="hidden" value="{{$value->group_id}}"
                                                                name="group_id[]" />
                                                            <input type="hidden" value="{{$value->subgroup_id}}"
                                                                name="subgroup_id[]" />
                                                            <input type="hidden" value="{{$value->unit_id}}"
                                                                name="unit_id[]" />
                                                            <input type="hidden" value="{{$value->sale_price}}"
                                                                name="sale_price[]" />
                                                            <input type="hidden" value="{{$value->quantity}}"
                                                                name="quantity[]" />
                                                            <input type="hidden" value="{{$value->total_price}}"
                                                                name="total_price[]" />
                                                        </td>
                                                        <td>{{ isset($value->item)?$value->item->item_name:'' }}</td>
                                                        <td>{{ isset($value->item)?isset($value->item->unit)?$value->item->unit->unit_name:'':'' }}
                                                        </td>
                                                        <td>{{$value->quantity}}
                                                        </td>
                                                        <td>{{$value->sale_price}}
                                                        </td>
                                                        <td>{{ $value->total_price }}
                                                        </td>
                                                        <td>{{ isset($value->item)?$value->item->item_code:'' }}</td>
                                                        <td>{{ isset($value->item)?$value->item->page_location:'' }}</td>
                                                        <td class="text-center">
                                                            <a href="javascript:void(0)"
                                                                data-tsrequisition_item_id="{{$value->id}}"
                                                                class="btn btn-info btn-sm editRow"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <a href="javascript:void(0)"
                                                                data-tsrequisition_item_id="{{$value->id}}"
                                                                class="btn btn-danger btn-sm deleteRow"><i
                                                                    class="fas fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                            </fieldset>
                        </div>
                        <div class="col-md-12 mt-2 submit-div" @if(!isset($tsrequisition->tsrequisitionDetails) ||
                            !count($tsrequisition->tsrequisitionDetails)) style="display:none;"
                            @endif>
                            <input type="hidden" name="update_id" id="update_id"
                                value="{{ isset($tsrequisition)?$tsrequisition->id:0 }}">
                            <input class="btn btn-danger float-end" type="submit" value="{{ trans('cruds.save') }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
var prev_tr = '';
$(document).on('change', '#item_id', function() {
    let select_item, item_id, item_name, group_id, subgroup_id, unit_id, sale_price,branch_id,warehouse_id;
    select_item = $('#item_id :selected');
    item_id = select_item.val();
    item_name = select_item.text();
    group_id = select_item.data('group_id');
    subgroup_id = select_item.data('subgroup_id');
    unit_id = select_item.data('unit_id');
    sale_price = select_item.data('sale_price');
    $('#sale_price').val(sale_price);
    $('#unit_id').val(unit_id).trigger('change');

    branch_id = $('#branch_id').val() ; 
    warehouse_id = $('#warehouse_from_id').val() ;
    balance = presentStock(branch_id,warehouse_id,group_id,subgroup_id,item_id,'','');
    $('#present_stock').val(balance);

})
$(document).on('click', '.btnAddNew', function() {
    let tsrequisition_item_id, select_item, item_id, item_name, item_code, group_id, group_name, subgroup_id,
        subgroup_name, unit_id,
        unit_name, sale_price, total_price = 0,
        quantity, present_stock,
        html, tr, editRow, deleteRow,page_location;
    select_item = $('#item_id :selected');
    item_id = select_item.val();
    item_name = select_item.text();
    item_code = select_item.data('item_code');
    unit_id = select_item.data('unit_id');
    group_id = select_item.data('group_id');
    subgroup_id = select_item.data('subgroup_id');
    page_location = select_item.data('page_location');

    item_name = $('#item_id :selected').text();
    group_name = $('#group_id :selected').text();
    unit_name = $('#unit_id :selected').text();
    present_stock = $('#present_stock').val();
    quantity = $('#quantity').val();
    quantity = +quantity;
    subgroup_name = $('#subgroup_id :selected').text();
    if (group_name == '--Select--') {
        group_name = '';
    }
    if (unit_name == '--Select--') {
        unit_name = '';
    }
    if (subgroup_name == '--Select--') {
        subgroup_name = '';
    }
    item_id = $('#item_id').val();
    tsrequisition_item_id = $('#tsrequisition_item_id').val();
    // group_id = $('#group_id').val();
    if (!item_id || !quantity) {
        SWAL_ALERT("", "");
        return false;
    }
    //subgroup_id = $('#subgroup_id').val();
    //unit_id = $('#unit_id').val();
    sale_price = $('#sale_price').val();
    sale_price = +sale_price;
    total_price = quantity * sale_price;
    html = '<input type="hidden" value="' + tsrequisition_item_id + '" name="tsrequisition_item_id[]"/>';
    html += '<input type="hidden" value="' + item_id + '" name="item_id[]"/>';
    html += '<input type="hidden" value="' + group_id + '" name="group_id[]"/>';
    html += '<input type="hidden" value="' + subgroup_id + '" name="subgroup_id[]"/>';
    html += '<input type="hidden" value="' + unit_id + '" name="unit_id[]"/>';
    html += '<input type="hidden" value="' + quantity + '" name="quantity[]"/>';
    html += '<input type="hidden" value="' + sale_price + '" name="sale_price[]"/>';
    html += '<input type="hidden" value="' + total_price + '" name="total_price[]"/>';

    editRow = '<a href="javascript:void(0)" data-tsrequisition_item_id = "' + tsrequisition_item_id +
        '" class="btn btn-info btn-sm editRow"><i class="fas fa-edit"></i></a>';
    deleteRow = '<a href="javascript:void(0)" data-tsrequisition_item_id = "' + tsrequisition_item_id +
        '" class="btn btn-danger btn-sm deleteRow"><i class="fas fa-times"></i></a>';

    tr = '<tr>'
    tr += '<td class="serial"></td>'
    tr += '<td>' + html + item_name + '</td>'
    tr += '<td>' + unit_name + '</td>'
    tr += '<td>' + quantity + '</td>'
    tr += '<td>' + sale_price + '</td>'
    tr += '<td>' + total_price + '</td>'
    tr += '<td>' + item_code + '</td>'
    tr += '<td>'+ page_location+'</td>'
    tr += '<td style="text-align:center">' + editRow + ' ' + deleteRow + '</td>'
    tr += '</tr>';
    $('#draftbox').show();
    $('.submit-div').show();
    if (prev_tr != '') {
        prev_tr.replaceWith(tr);
        prev_tr = '';
    } else {
        $('table.table-tsrequisition_item tbody').append(tr);
    }
    clearField();
})

$(document).on('click', '.editRow', function() {
    let tsrequisition_item_id,item_id = 0, group_id, subgroup_id, unit_id, sale_price, tr;
    tr = $(this).closest('tr');
    prev_tr = tr;
    tsrequisition_item_id = tr.find('input[name="tsrequisition_item_id[]"]').val();
    item_id = tr.find('input[name="item_id[]"]').val();
    group_id = tr.find('input[name="group_id[]"]').val();
    subgroup_id = tr.find('input[name="subgroup_id[]"]').val();
    unit_id = tr.find('input[name="unit_id[]"]').val();
    quantity = tr.find('input[name="quantity[]"]').val();
    sale_price = tr.find('input[name="sale_price[]"]').val();
    total_price = tr.find('input[name="total_price[]"]').val();
    $('#tsrequisition_item_id').val(tsrequisition_item_id);
    $('#unit_id').val(unit_id).trigger('change');
    $('#quantity').val(quantity).trigger('change');
    $('#group_id').val(group_id).trigger('change');
    setTimeout(() => {
        $('#subgroup_id').val(subgroup_id).trigger('change');
    }, 1000);
    setTimeout(() => {
        $('#item_id').val(item_id).trigger('change');
    }, 1500);
    setTimeout(() => {
        $('#sale_price').val(sale_price);
    }, 2000);
    $('#total_price').val(total_price);
})
$(document).on('click', '.deleteRow', function() {
    let tsrequisition_item_id, row, msg;
    tsrequisition_item_id = $(this).data('tsrequisition_item_id');
    row = $(this).closest('tr');
    msg = confirm('Are you sure to delete this record?');
    if (msg) {
        if (tsrequisition_item_id > 0) {
            formUrl = "{{route('admin.crud.remove')}}";
            formData = {
                table: 'TSRequisitionDetails',
                column: 'id',
                value: tsrequisition_item_id
            };
            $.ajax({
                headers: {
                    'x-csrf-token': _token
                },
                method: 'POST',
                data: formData,
                url: formUrl
            }).done(function(response) {
                if (response == 1) {
                    row.remove();
                }
            })
        } else {
            row.remove();
        }
        setSerial('table-tsrequisition_item');
    }
    var rowCount = $('.table-tsrequisition_item tbody>tr').length;
    if (rowCount <= 0) {
        $('.submit-div').hide();
    } else {
        $('.submit-div').show();
    }
})

function clearField() {
    $('#tsrequisition_item_id').val('0');
    $('#item_id').val('').trigger('change');
    //$('#group_id').val('').trigger('change');
    $('#unit_id').val('').trigger('change');
    $('#quantity').val('').trigger('change');
    //$('#subgroup_id').val('').trigger('change');
    $('#sale_price').val('');
    setSerial('table-tsrequisition_item');
}
</script>
@endsection