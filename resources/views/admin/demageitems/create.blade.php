@extends('layouts.admin')
@section('content')
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    {{ trans('cruds.create') }} {{ trans('cruds.demageitem') }}
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
                <form action="{{ route("admin.demageitem.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('demageitem_code') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{ trans('cruds.demageitem_code') }} (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="demageitem_code" name="demageitem_code" data-model="DemageItem" data-prefix="DI" data-update_id="{{ isset($demageitem) ? $demageitem->id : 0 }}" class="form-control unique_code"
                                    placeholder="{{ trans('cruds.demageitem_code') }}"
                                    value="{{ old('demageitem_code', isset($demageitem) ? $demageitem->demageitem_code : '') }}" required>
                                @if($errors->has('demageitem_code'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('demageitem_code') }}
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
                                    <?=options('warehouses', array(), array(), 'id', 'warehouse_name', 'id', 'asc', trans('cruds.select'), isset($demageitem) ? $demageitem->warehouse_id : 0)?>
                                </select>
                                @if($errors->has('warehouse_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('warehouse_id') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('demage_date') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{ trans('cruds.demage_date') }}</p>
                                <input type="text" id="demage_date" name="demage_date" class="form-control datepicker-date"
                                    placeholder="{{ trans('cruds.demage_date') }}"
                                    value="{{ old('demage_date', isset($demageitem) ? $demageitem->demage_date : date('Y-m-d')) }}" required>
                                @if($errors->has('demage_date'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('demage_date') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.group')}}
                                </p>
                                <select id="group_id" name="group_id" class="form-control select2">
                                    <?=options('groups', array(), array(), 'id', 'group_name', 'id', 'asc', trans('cruds.select'), isset($demageitem) ? $demageitem->group_id : 0)?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('subgroup_id') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.subgroup')}}
                                </p>
                                <select id="subgroup_id" name="subgroup_id" class="form-control select2">
                                    <?=options('subgroups', array(), array(), 'id', 'subgroup_name', 'id', 'asc', trans('cruds.select'), isset($demageitem) ? $demageitem->subgroup_id : 0)?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('item_id') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{ trans('cruds.item') }} (<span
                                        class="required">*</span>)</p>
                                <select id="item_id" name="item_id" class="form-control select2">
                                    <?=options('items', array(), array('item_code','item_name'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($demageitem) ? $demageitem->item_id : 0)?>
                                </select>
                                @if($errors->has('item_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('item_id') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{ trans('cruds.quantity') }} (<span class="required">*</span>)</p>
                                <input type="number" id="quantity" name="quantity" class="form-control"
                                    placeholder="{{ trans('cruds.quantity') }}"
                                    value="{{ old('quantity', isset($demageitem) ? $demageitem->quantity : 0) }}" required>
                                @if($errors->has('quantity'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('quantity') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('demage_by') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.demage_by')}}(<span
                                    class="required">*</span>)
                                </p>
                                <select id="demage_by" name="demage_by" class="form-control select2" required>
                                    <?=options('users', array(), array('epf_no','name'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($demageitem) ? $demageitem->demage_by : 0)?>
                                </select>
                                @if($errors->has('demage_by'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('demage_by') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('demage_authority') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.demage_authority')}}(<span
                                    class="required">*</span>)
                                </p>
                                <select id="demage_authority" name="demage_authority" class="form-control select2" required>
                                    <?=options('users', array(), array('epf_no','name'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($demageitem) ? $demageitem->demage_authority : 0)?>
                                </select>
                                @if($errors->has('demage_authority'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('demage_authority') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{ trans('cruds.remarks') }}</p>
                                <input type="text" id="description" name="description" class="form-control"
                                    placeholder="{{ trans('cruds.description') }}"
                                    value="{{ old('description', isset($demageitem) ? $demageitem->description : '') }}">
                                @if($errors->has('description'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        
                        

                        <div class="col-md-3">
                            <input type="hidden" name="update_id" id="update_id" value="{{ isset($demageitem)?$demageitem->id:0 }}">
                            <input class="btn btn-danger mt-4" type="submit" value="{{ trans('cruds.save') }}">
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
    $(document).on('change','#room_id',function(){
       let room_id,where = [],select ;
       room_id = $(this).val() ;
       select = "{{ __('cruds.select') }}";
       where.push(['room_id','=',room_id]);
       response = getData("/crud/get","Rack",where,'get',[]);
        options = `<option value=''>${select}</option>`;
        if (response) {
            $.each(response, function(index, value) {
                options +=
                    `<option value='${value.id}'>${value.rack_name} - ${value.rack_code}</option>`;
            })
        }
        $('#rack_id').html(options).trigger('change');
    })
    $(document).on('change','#rack_id',function(){
       let rack_id,where = [],select ;
       rack_id = $(this).val() ;
       select = "{{ __('cruds.select') }}";
       where.push(['rack_id','=',rack_id]);
       response = getData("/crud/get","Shelf",where,'get',[]);
        options = `<option value=''>${select}</option>`;
        if (response) {
            $.each(response, function(index, value) {
                options +=
                    `<option value='${value.id}'>${value.shelf_name} - ${value.shelf_code}</option>`;
            })
        }
        $('#shelf_id').html(options).trigger('change');
    })
</script>
@endsection