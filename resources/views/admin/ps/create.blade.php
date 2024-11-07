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
                    {{ trans('cruds.create') }} {{ trans('cruds.ps') }}
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
                <form action="{{ route("admin.ps.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="hidden" name="update_id" value="{{ isset($ps)?$ps->id:0 }}">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.requisition_no')}} (<span
                                        class="required">*</span>)
                                </p>
                                <select id="requisition_id" name="requisition_id" class="form-control select2" required>
                                    <?=options('requisitions', [['status', '=', 'Approved']], array(), 'id', 'requisition_code', 'id', 'desc', trans('cruds.select'), 0)?>
                                </select>
                                @if($errors->has('requisition_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('requisition_id') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('ps_code') ? 'has-error' : '' }}">
                                <p class="mg-b-2 tx-semibold">{{ trans('cruds.ps_code') }} (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="ps_code" name="ps_code"
                                    data-model="PS" data-prefix="PS"
                                    data-update_id="{{ isset($ps) ? $ps->id : 0 }}"
                                    class="form-control unique_code" placeholder="{{ trans('cruds.ps_code') }}"
                                    value="{{ old('ps_code', isset($ps) ? $ps->ps_code : '') }}"
                                    required>
                                @if($errors->has('ps_code'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('ps_code') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('ps_date') ? 'has-error' : '' }}">
                                <p class="mg-b-2 tx-semibold">{{ trans('cruds.ps_date') }} (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="ps_date" name="ps_date"
                                    class="form-control datepicker-date"
                                    placeholder="{{ trans('cruds.ps_date') }}" value="{{ date('Y-m-d') }}"
                                    value="{{ old('ps_date', isset($ps) ? $ps->ps_date : '') }}"
                                    required>
                                @if($errors->has('ps_date'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('ps_date') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-2 tx-semibold">{{ trans('cruds.remarks') }} </p>
                                <input type="text" id="description" name="description"
                                    class="form-control"
                                    placeholder="{{ trans('cruds.remarks') }}" value="{{ isset($ps) ? $ps->description : '' }}"
                                    value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12" id="content">

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
    let branch_id,warehouse_id,select_item, item_id, item_name, group_id, subgroup_id, unit_id, sale_price;
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
    warehouse_id = $('#warehouse_id').val() ;
    balance = presentStock(branch_id,warehouse_id,group_id,subgroup_id,item_id,'','');
    $('#present_stock').val(balance);

})
$(document).on('click', '.btnAddNew', function() {
    let ps_code,ps_date,job_id,party_id,branch_id,section_id,warehouse_id, ps_item_id, select_item, item_id, item_name, item_code, group_id, group_name, subgroup_id,
        subgroup_name, unit_id,
        unit_name, sale_price, total_price = 0,
        quantity, present_stock,
        html, tr, editRow, deleteRow, page_location;
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

    ps_code = $('#ps_code').val();
    ps_date = $('#ps_date').val();
    job_id = $('#job_id').val();
    party_id = $('#party_id').val();
    branch_id = $('#branch_id').val();
    section_id = $('#section_id').val();
    warehouse_id = $('#warehouse_id').val();
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
    ps_item_id = $('#ps_item_id').val();
    // group_id = $('#group_id').val();
    if (!ps_code || !ps_date || !job_id || !party_id || !branch_id || !section_id || !warehouse_id || !item_id || !quantity) {
        SWAL_ALERT("", "");
        return false;
    }
    //subgroup_id = $('#subgroup_id').val();
    //unit_id = $('#unit_id').val();
    sale_price = $('#sale_price').val();
    sale_price = +sale_price;
    total_price = quantity * sale_price;
    html = '<input type="hidden" value="' + ps_item_id + '" name="ps_item_id[]"/>';
    html += '<input type="hidden" value="' + item_id + '" name="item_id[]"/>';
    html += '<input type="hidden" value="' + group_id + '" name="group_id[]"/>';
    html += '<input type="hidden" value="' + subgroup_id + '" name="subgroup_id[]"/>';
    html += '<input type="hidden" value="' + unit_id + '" name="unit_id[]"/>';
    html += '<input type="hidden" value="' + quantity + '" name="quantity[]"/>';
    html += '<input type="hidden" value="' + sale_price + '" name="sale_price[]"/>';
    html += '<input type="hidden" value="' + total_price + '" name="total_price[]"/>';

    editRow = '<a href="javascript:void(0)" data-ps_item_id = "' + ps_item_id +
        '" class="btn btn-info btn-sm editRow"><i class="fas fa-edit"></i></a>';
    deleteRow = '<a href="javascript:void(0)" data-ps_item_id = "' + ps_item_id +
        '" class="btn btn-danger btn-sm deleteRow"><i class="fas fa-times"></i></a>';

    tr = '<tr>'
    tr += '<td class="serial"></td>'
    tr += '<td>' + html + item_name + '</td>'
    tr += '<td>' + unit_name + '</td>'
    tr += '<td>' + quantity + '</td>'
    tr += '<td>' + sale_price + '</td>'
    tr += '<td>' + total_price + '</td>'
    tr += '<td>' + item_code + '</td>'
    tr += '<td>' + page_location + '</td>'
    tr += '<td style="text-align:center">' + editRow + ' ' + deleteRow + '</td>'
    tr += '</tr>';
    $('#draftbox').show();
    $('.submit-div').show();
    if (prev_tr != '') {
        prev_tr.replaceWith(tr);
        prev_tr = '';
    } else {
        $('table.table-ps_item tbody').append(tr);
    }
    clearField();
})

$(document).on('click', '.editRow', function() {
    let ps_item_id, group_id, subgroup_id, unit_id, sale_price, tr;
    tr = $(this).closest('tr');
    prev_tr = tr;
    ps_item_id = tr.find('input[name="ps_item_id[]"]').val();
    item_id = tr.find('input[name="item_id[]"]').val();
    group_id = tr.find('input[name="group_id[]"]').val();
    subgroup_id = tr.find('input[name="subgroup_id[]"]').val();
    unit_id = tr.find('input[name="unit_id[]"]').val();
    quantity = tr.find('input[name="quantity[]"]').val();
    sale_price = tr.find('input[name="sale_price[]"]').val();
    total_price = tr.find('input[name="total_price[]"]').val();
    $('#ps_item_id').val(ps_item_id);
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
    let ps_item_id, row, msg;
    ps_item_id = $(this).data('ps_item_id');
    row = $(this).closest('tr');
    msg = confirm('Are you sure to delete this record?');
    if (msg) {
        if (ps_item_id > 0) {
            formUrl = "{{route('admin.crud.remove')}}";
            formData = {
                table: 'RequisitionDetails',
                column: 'id',
                value: ps_item_id
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
        setSerial('table-ps_item');
    }
    var rowCount = $('.table-ps_item tbody>tr').length;
    if (rowCount <= 0) {
        $('.submit-div').hide();
    } else {
        $('.submit-div').show();
    }
})

function clearField() {
    $('#ps_item_id').val('0');
    $('#item_id').val('').trigger('change');
    //$('#group_id').val('').trigger('change');
    $('#unit_id').val('').trigger('change');
    $('#quantity').val('').trigger('change');
    //$('#subgroup_id').val('').trigger('change');
    $('#sale_price').val('');
    setSerial('table-ps_item');
}
$(document).on('change', '#psfor_id', function(params) {
    let psfor_id, psfor, where = [];
    psfor_id = $(this).val();
    psfor = $('#psfor_id :selected').text();
    where.push(['psfor_id', '=', psfor_id]);
    prefix = psfor.substring(0, 3);
    model = 'Requisition';
    field = 'ps_code';
    url = '/admin/crud/generate-code';
    $.ajax({
            async: false,
            headers: {
                'x-csrf-token': _token
            },
            method: 'POST',
            url: url,
            data: {
                prefix: prefix,
                field: field,
                model: model,
                where: where,
            }
        })
        .done(function(data) {
            $('#ps_code').val(data);
        })

})
$(document).on('change', '#requisition_id', function() {
    let requisition_id, url;
    requisition_id = $(this).val();
    if (!requisition_id) {
        $('#content').empty();
        return;
    }
    url = '/admin/main_warehouse_management/ps/initialize';
    $.ajax({
            async: false,
            headers: {
                'x-csrf-token': _token
            },
            method: 'POST',
            url: url,
            data: {
                requisition_id: requisition_id
            }
        })
        .done(function(data) {
            $('#content').html(data);
        })
    /*     setTimeout(() => {
            GenerateCode();
        }, 1000); */
})
</script>
@endsection