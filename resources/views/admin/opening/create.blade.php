@extends('layouts.admin')
@section('content')
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    {{ trans('cruds.create') }} {{ trans('cruds.opening') }}
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
                <form action="{{ route("admin.opening.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('opening_code') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{ trans('cruds.opening_code') }} (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="opening_code" name="opening_code" data-model="Opening" data-prefix="OP" data-update_id="{{ isset($opening) ? $opening->id : 0 }}" class="form-control unique_code"
                                    placeholder="{{ trans('cruds.opening_code') }}"
                                    value="{{ old('opening_code', isset($opening) ? $opening->opening_code : '') }}" readonly required>
                                @if($errors->has('opening_code'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('opening_code') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('opening_date') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{ trans('cruds.opening_date') }} (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="opening_date" name="opening_date" class="form-control datepicker-date"
                                    placeholder="{{ trans('cruds.opening_date') }}"
                                    value="{{ old('opening_date', isset($opening) ? $opening->opening_date : date('Y-m-d')) }}" required>
                                @if($errors->has('opening_date'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('opening_date') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.branch_name')}} (<span
                                        class="required">*</span>)
                                </p>
                                <select id="branch_id" name="branch_id" class="form-control select2" required>
                                    <?=options('branches', array(), array(), 'id', 'short_name', 'id', 'asc', trans('cruds.select'), 1)?>
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
                                <p class="mg-b-10 tx-semibold">{{__('cruds.warehouse_name')}} (<span
                                        class="required">*</span>)
                                </p>
                                <select id="warehouse_id" name="warehouse_id" class="form-control select2" required>
                                    <?=options('warehouses', array(), array('warehouse_name','warehouse_code'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($opening) ? $opening->warehouse_id : 0)?>
                                </select>
                                @if($errors->has('warehouse_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('warehouse_id') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.group')}}
                                </p>
                                <select id="group_id" name="group_id" class="form-control select2">
                                    <?=options('groups', array(), array(), 'id', 'group_name', 'id', 'asc', trans('cruds.select'), isset($opening) ? $opening->group_id : 0)?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('subgroup_id') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.subgroup')}}
                                </p>
                                <select id="subgroup_id" name="subgroup_id" class="form-control select2">
                                    <?=options('subgroups', array(), array(), 'id', 'subgroup_name', 'id', 'asc', trans('cruds.select'), isset($opening) ? $opening->subgroup_id : 0)?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.item_name')}}
                                </p>
                                <select id="item_id" name="item_id" class="form-control select2">
                                    <?=options('items', array(), array('item_code','item_name'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($opening) ? $opening->item_id : 0)?>
                                </select>
                                @if($errors->has('item_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('item_id') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{ trans('cruds.remarks') }}</p>
                                <input type="text" id="description" name="description" class="form-control"
                                    placeholder="{{ trans('cruds.remarks') }}"
                                    value="{{ old('description', isset($opening) ? $opening->description : '') }}">
                                @if($errors->has('description'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group" id="content">
                                
                            </div>
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
    $(document).on('change','#group_id,#subgroup_id,#item_id',function(){
       let group_id,subgroup_id,item_id,where = [] ;
       $('#content').empty();
       group_id = $('#group_id').val();
       subgroup_id = $('#subgroup_id').val();
       item_id = $('#item_id').val();
       if(group_id) where.push(['group_id','=',group_id]);
       if(subgroup_id) where.push(['subgroup_id','=',subgroup_id]);
       if(item_id) where.push(['id','=',item_id]);
       page = getPage("/admin/inventory_management/opening/get-item","Item",where,"admin.opening.item_list");
       $('#content').html(page);
    })
    $(document).on('click', '.btnSaveOrUpdate', function() {
    let tr, opening_code, opening_date, branch_id, warehouse_id, description, url;
    opening_code = $('#opening_code').val();
    opening_date = $('#opening_date').val();
    branch_id = $('#branch_id').val();
    warehouse_id = $('#warehouse_id').val();
    if(!opening_code || !opening_date || !branch_id || !warehouse_id){
        SWAL_ALERT();
        return;
    }
    description = $('#description').val();
    tr = $(this).closest('tr');
    item_id = tr.find('td input[name="item_id[]"]').val();
    opening_quantity = tr.find('td input[name="opening_quantity[]"]').val();
    opening_price = tr.find('td input[name="opening_price[]"]').val();
    if (!opening_quantity) {
        SWAL_ALERT("Please, enter opening quantity!");
        return;
    }
    url = "/admin/inventory_management/opening/item-store";
    $.ajax({
            async: false,
            headers: {
                'x-csrf-token': _token
            },
            method: 'POST',
            url: url,
            data: {
                item_id: item_id,
                opening_quantity: opening_quantity,
                opening_price: opening_price,
                opening_code: opening_code,
                opening_date: opening_date,
                branch_id: branch_id,
                warehouse_id: warehouse_id,
                description: description
            }
        })
        .done(function(data) {
            if (data == 1) {
                SWAL("Save successful.", "success");
            } else {
                SWAL("Save failed.", "danger");
            }

        })
})
</script>
@endsection