@extends('layouts.admin')
@section('content')

<div class="row row-sm">
    <div class="col-md-4 col-xl-4 col-xs-12 col-sm-4">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">{{ trans('cruds.create') }}
                    {{ trans('cruds.unit') }}</h5>
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
                <form action="{{ route('admin.unit.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.unit_code')}} (<span class="required">*</span>)
                        </p>
                        <input type="text" class="form-control unique_code {{ $errors->has('unit_code') ? 'is-invalid' : '' }}"
                            name="unit_code" id="unit_code" placeholder="{{__('cruds.unit_code')}}" data-model="Unit" data-prefix="UN" data-update_id="0"   required>
                        @if($errors->has('unit_code'))
                        <em class="invalid-feedback">
                            {{ $errors->first('unit_code') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.unit_name')}} (<span class="required">*</span>)
                        </p>
                        <input type="text" class="form-control  {{ $errors->has('unit_name') ? 'is-invalid' : '' }}"
                            name="unit_name" id="unit_name" placeholder="{{__('cruds.unit_name')}}" required>
                        @if($errors->has('unit_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('unit_name') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.description')}}
                        </p>
                        <input type="text" class="form-control" name="description" id="description"
                            placeholder="{{__('cruds.description')}}">
                        @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description') }}
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
                <h5 class="main-content-label mb-0">{{ trans('cruds.unit') }}
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
                                <th>{{ trans('cruds.actions') }} </th>
                                <th>{{ trans('cruds.unit_code') }}</th>
                                <th>{{ trans('cruds.unit_name') }}</th>
                                <th>{{ trans('cruds.description') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($units as $key => $unit)
                            <tr data-entry-id="{{ $unit->id }}">
                                <td>

                                </td>
                                <td>
                                    @if(show())
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.unit.show', $unit->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endif

                                    @if(edit())
                                    <a class="btn btn-xs btn-info editAction" href="javascript:void(0)"
                                        data-table="Unit" data-column="id" data-value="{{$unit->id}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif

                                    @if(delete())
                                    <form action="{{ route('admin.unit.destroy', $unit->id) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('cruds.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif
                                </td>
                                <td>{{ $unit->unit_code ?? '' }}</td>
                                <td>{{ $unit->unit_name ?? '' }}</td>
                                <td>{{ $unit->description ?? '' }}</td>
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
    let route = "{{ route('admin.inventory_management.unit.massDestroy') }}";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
})

$(document).on("click", ".editAction", function() {
    let response = editAction(this);
    $("#update_id").val(response.id);
    $("#unit_code").attr("data-update_id",response.id);
    $("#unit_code").val(response.unit_code);
    $("#unit_name").val(response.unit_name);
    $("#description").val(response.description);
    changeSubmitButtonCaption();
})
</script>
@endsection