@extends('layouts.admin')
@section('content')

<div class="row row-sm">
    <div class="col-md-4 col-xl-4 col-xs-12 col-sm-4">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">{{ trans('cruds.create') }}
                    {{ trans('cruds.subgroup') }}</h5>
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
                <form action="{{ route('admin.subgroup.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.subgroup_code')}} (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control unique_code {{ $errors->has('subgroup_code') ? 'is-invalid' : '' }}"
                            name="subgroup_code" id="subgroup_code"
                            placeholder="{{__('cruds.subgroup_code')}}" data-model="SubGroup" data-prefix="SG" data-update_id="0" required>
                        @if($errors->has('subgroup_code'))
                        <em class="invalid-feedback">
                            {{ $errors->first('subgroup_code') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.group')}} (<span class="required">*</span>)
                        </p>
                        <select id="group_id" name="group_id" class="form-control select2">
                            <?=options('groups', array(), array(), 'id', 'group_name', 'id', 'asc', trans('cruds.select'), 0)?>
                        </select>
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.subgroup_name')}} (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control  {{ $errors->has('subgroup_name') ? 'is-invalid' : '' }}"
                            name="subgroup_name" id="subgroup_name"
                            placeholder="{{__('cruds.subgroup_name')}}">
                        @if($errors->has('subgroup_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('subgroup_name') }}
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
                <h5 class="main-content-label mb-0">{{ trans('cruds.subgroup') }}
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
                                <th>{{ trans('cruds.actions') }}</th>
                                <th>{{ trans('cruds.subgroup_code') }}</th>
                                <th>{{ trans('cruds.group_name') }}</th>
                                <th>{{ trans('cruds.subgroup_name') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subgroups as $key => $subgroup)
                            <tr data-entry-id="{{ $subgroup->id }}">
                                <td>

                                </td>
                                <td>
                                    @if(show())
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.subgroup.show', $subgroup->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endif

                                    @if(edit())
                                    <a class="btn btn-xs btn-info editAction" href="javascript:void(0)"
                                        data-table="SubGroup" data-column="id"
                                        data-value="{{$subgroup->id}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif

                                    @if(delete())
                                    <form action="{{ route('admin.subgroup.destroy', $subgroup->id) }}"
                                        method="POST" onsubmit="return confirm('{{ trans('cruds.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif
                                </td>
                                <td>{{ $subgroup->subgroup_code ?? '' }}</td>
                                <td>{{isset($subgroup->group)?$subgroup->group->group_name:''}}
                                </td>
                                <td>{{ $subgroup->subgroup_name ?? '' }}</td>
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
$(function() {
    let route = "{{ route('admin.inventory_management.subgroup.massDestroy') }}";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
})

$(document).on("click", ".editAction", function() {
    let response = editAction(this);
    console.log(response);
    $("#update_id").val(response.id);
    $("#subgroup_code").attr("data-update_id",response.id);
    $("#subgroup_code").val(response.subgroup_code);
    $("#group_id").val(response.group_id).trigger('change');
    $("#subgroup_name").val(response.subgroup_name);
    changeSubmitButtonCaption();
})
</script>
@endsection