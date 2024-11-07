@extends('layouts.admin')
@section('content')

<div class="row row-sm">
    <div class="col-md-4 col-xl-4 col-xs-12 col-sm-4">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">{{ trans('cruds.create') }}
                    {{ trans('cruds.subgroup_volume') }}</h5>
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
                <form action="{{ route('admin.subgroupvolume.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.volume_code')}} (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control unique_code {{ $errors->has('subgroupvolume_code') ? 'is-invalid' : '' }}"
                            name="subgroupvolume_code" id="subgroupvolume_code"
                            placeholder="{{__('cruds.subgroupvolume_code')}}" data-model="SubGroupVolume" data-prefix="SGV" data-update_id="0" required>
                        @if($errors->has('subgroupvolume_code'))
                        <em class="invalid-feedback">
                            {{ $errors->first('subgroupvolume_code') }}
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
                        <p class="mg-b-10 tx-semibold">{{__('cruds.subgroup')}} (<span class="required">*</span>)
                        </p>
                        <select id="subgroup_id" name="subgroup_id" class="form-control select2">
                            <?=options('subgroups', array(), array(), 'id', 'subgroup_name', 'id', 'asc', trans('cruds.select'), 0)?>
                        </select>
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.volume')}} (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control  {{ $errors->has('subgroupvolume_name') ? 'is-invalid' : '' }}"
                            name="subgroupvolume_name" id="subgroupvolume_name"
                            placeholder="{{__('cruds.volume')}}">
                        @if($errors->has('subgroupvolume_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('subgroupvolume_name') }}
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
                <h5 class="main-content-label mb-0">{{ trans('cruds.volume') }}
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
                                <th>{{ trans('cruds.volume_code') }}</th>
                                <th>{{ trans('cruds.group_name') }}</th>
                                <th>{{ trans('cruds.subgroup_name') }}</th>
                                <th>{{ trans('cruds.volume') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subgroupvolumes as $key => $subgroupvolume)
                            <tr data-entry-id="{{ $subgroupvolume->id }}">
                                <td>

                                </td>
                                <td>
                                    @if(show())
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.subgroupvolume.show', $subgroupvolume->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endif

                                    @if(edit())
                                    <a class="btn btn-xs btn-info editAction" href="javascript:void(0)"
                                        data-table="SubGroupVolume" data-column="id" data-value="{{$subgroupvolume->id}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif

                                    @if(delete())
                                    <form action="{{ route('admin.subgroupvolume.destroy', $subgroupvolume->id) }}"
                                        method="POST" onsubmit="return confirm('{{ trans('cruds.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif
                                </td>
                                <td>{{ $subgroupvolume->subgroupvolume_code ?? '' }}</td>
                                <td>{{isset($subgroupvolume->group)?$subgroupvolume->group->group_name:''}}
                                </td>
                                <td>{{isset($subgroupvolume->subgroup)?$subgroupvolume->subgroup->subgroup_name:''}}
                                </td>
                                <td>{{ $subgroupvolume->subgroupvolume_name ?? '' }}</td>
                                
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
    let route = "{{ route('admin.inventory_management.subgroupvolume.massDestroy') }}";
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
    $("#subgroupvolume_code").attr("data-update_id",response.id);
    $("#subgroupvolume_code").val(response.subgroupvolume_code);
    $("#group_id").val(response.group_id).trigger('change');
    setTimeout(() => {
        $("#subgroup_id").val(response.subgroup_id).trigger('change');
    }, 1000);
    $("#subgroupvolume_name").val(response.subgroupvolume_name);
    changeSubmitButtonCaption();
})
</script>
@endsection