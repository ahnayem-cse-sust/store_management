@extends('layouts.admin')
@section('content')

<div class="row row-sm">
    <div class="col-md-4 col-xl-4 col-xs-12 col-sm-4">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">{{ trans('cruds.create') }}
                    {{ trans('cruds.warehouse') }}</h5>
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
                <form action="{{ route('admin.warehouse.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.type')}} (<span
                                class="required">*</span>)
                        </p>
                        <select id="type" name="type" class="form-control select2" required>
                            <option value="Main">Main</option>
                            <option value="Tools">Tools</option>
                        </select>
                        @if($errors->has('type'))
                        <em class="invalid-feedback">
                            {{ $errors->first('type') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.warehouse_code')}} (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control unique_code  {{ $errors->has('warehouse_code') ? 'is-invalid' : '' }}"
                            name="warehouse_code" id="warehouse_code"
                            placeholder="{{__('cruds.warehouse_code')}}" data-model="Warehouse" data-prefix="WR" data-update_id="0"  required>
                        @if($errors->has('warehouse_code'))
                        <em class="invalid-feedback">
                            {{ $errors->first('warehouse_code') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.warehouse_name')}} (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control  {{ $errors->has('warehouse_name') ? 'is-invalid' : '' }}"
                            name="warehouse_name" id="warehouse_name"
                            placeholder="{{__('cruds.warehouse_name')}}" required>
                        @if($errors->has('warehouse_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('warehouse_name') }}
                        </em>
                        @endif
                    </div>
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
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.warehouse_address')}} (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control  {{ $errors->has('warehouse_address') ? 'is-invalid' : '' }}"
                            name="warehouse_address" id="warehouse_address"
                            placeholder="{{__('cruds.warehouse_address')}}" required>
                        @if($errors->has('warehouse_address'))
                        <em class="invalid-feedback">
                            {{ $errors->first('warehouse_address') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.contact_person')}} )
                        </p>
                        <input type="text"
                            class="form-control  {{ $errors->has('contact_person') ? 'is-invalid' : '' }}"
                            name="contact_person" id="contact_person"
                            placeholder="{{__('cruds.contact_person')}}">
                        @if($errors->has('contact_person'))
                        <em class="invalid-feedback">
                            {{ $errors->first('contact_person') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.contact_no')}} (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control  {{ $errors->has('contact_no') ? 'is-invalid' : '' }}"
                            name="contact_no" id="contact_no"
                            placeholder="{{__('cruds.contact_no')}}" required>
                        @if($errors->has('contact_no'))
                        <em class="invalid-feedback">
                            {{ $errors->first('contact_no') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.email_address')}}
                        </p>
                        <input type="text"
                            class="form-control  {{ $errors->has('email_address') ? 'is-invalid' : '' }}"
                            name="email_address" id="email_address"
                            placeholder="{{__('cruds.email_address')}}">
                        @if($errors->has('email_address'))
                        <em class="invalid-feedback">
                            {{ $errors->first('email_address') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="update_id" id="update_id" value="0">
                        <button class="btn ripple btn-warning update" type="submit">{{__('cruds.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xl-8 col-xs-8 col-sm-8">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">{{ trans('cruds.warehouse') }}
                    {{ trans('cruds.list') }}</h5>
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
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable datatable-Income">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.actions') }}
                                </th>
                                <th>{{ trans('cruds.type') }}</th>
                                <th>{{ trans('cruds.warehouse_code') }}</th>
                                <th>{{ trans('cruds.warehouse_name') }}</th>
                                <th>{{ trans('cruds.branch_name') }}</th>
                                <th>{{ trans('cruds.warehouse_address') }}</th>
                                <th>{{ trans('cruds.contact_person') }}</th>
                                <th>{{ trans('cruds.contact_no') }}</th>
                                <th>{{ trans('cruds.email_address') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($warehouses as $key => $warehouse)
                            <tr data-entry-id="{{ $warehouse->id }}">
                                <td>

                                </td>
                                <td>
                                    @if(show())
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.warehouse.show', $warehouse->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endif

                                    @if(edit())
                                    <a class="btn btn-xs btn-info editAction" href="javascript:void(0)"
                                        data-table="Warehouse" data-column="id" data-value="{{$warehouse->id}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif

                                     @if(delete())
                                    <form action="{{ route('admin.warehouse.destroy', $warehouse->id) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('cruds.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif
                                </td>
                                <td>{{ $warehouse->type ?? '' }}</td>
                                <td>{{ $warehouse->warehouse_code ?? '' }}</td>
                                <td>{{ $warehouse->warehouse_name ?? '' }}</td>
                                <td>{{ isset($warehouse->branch)?$warehouse->branch->short_name : '' }}</td>
                                <td>{{ $warehouse->warehouse_address ?? '' }}</td>
                                <td>{{ $warehouse->contact_person ?? '' }}</td>
                                <td>{{ $warehouse->contact_no ?? '' }}</td>
                                <td>{{ $warehouse->email_address ?? '' }}</td>

                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
/* $(function() {
    let route = "{{ route('admin.general_settings.warehouse.massDestroy') }}";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
}) */

$(document).on("click", ".editAction", function() {
    let response = editAction(this);
    $("#update_id").val(response.id);
    $("#warehouse_code").attr('data-update_id',response.id);
    $("#warehouse_code").val(response.warehouse_code);
    $("#warehouse_name").val(response.warehouse_name);
    $("#type").val(response.type).trigger('change');
    $("#branch_id").val(response.branch_id).trigger('change');
    $("#warehouse_address").val(response.warehouse_address);
    $("#contact_person").val(response.contact_person);
    $("#contact_no").val(response.contact_no);
    $("#email_address").val(response.email_address);
    changeSubmitButtonCaption();
})
</script>
@endsection