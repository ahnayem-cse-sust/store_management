@extends('layouts.admin')
@section('content')

<div class="row row-sm">
    <div class="col-md-4 col-xl-4 col-xs-12 col-sm-4">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">{{ trans('cruds.create') }}
                    {{ trans('cruds.rack') }}</h5>
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
                <form action="{{ route('admin.rack.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.rack_code')}} (<span class="required">*</span>)
                        </p>
                        <input type="text" class="form-control unique_code {{ $errors->has('rack_code') ? 'is-invalid' : '' }}"
                            name="rack_code" id="rack_code" placeholder="{{__('cruds.rack_code')}}" data-model="Rack" data-prefix="RC" data-update_id="0"   required>
                        @if($errors->has('rack_code'))
                        <em class="invalid-feedback">
                            {{ $errors->first('rack_code') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.rack_name')}} (<span class="required">*</span>)
                        </p>
                        <input type="text" class="form-control  {{ $errors->has('rack_name') ? 'is-invalid' : '' }}"
                            name="rack_name" id="rack_name" placeholder="{{__('cruds.rack_name')}}" required>
                        @if($errors->has('rack_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('rack_name') }}
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
                        <p class="mg-b-10 tx-semibold">{{__('cruds.room_name')}} (<span class="required">*</span>)
                        </p>
                        <select id="room_id" name="room_id" class="form-control select2" required>
                            <?=options('rooms', array(), array(), 'id', 'room_name', 'id', 'asc', trans('cruds.select'), 0)?>
                        </select>
                        @if($errors->has('room_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('room_name') }}
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
                <h5 class="main-content-label mb-0">{{ trans('cruds.rack') }}
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
                                <th>{{ trans('cruds.rack_code') }}</th>
                                <th>{{ trans('cruds.branch_name') }}</th>
                                <th>{{ trans('cruds.room_name') }}</th>
                                <th>{{ trans('cruds.rack_name') }}</th>
                                <th>{{ trans('cruds.description') }}</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($racks as $key => $rack)
                            <tr data-entry-id="{{ $rack->id }}">
                                <td>

                                </td>
                                <td>
                                    @if(show())
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.rack.show', $rack->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endif

                                    @if(edit())
                                    <a class="btn btn-xs btn-info editAction" href="javascript:void(0)"
                                        data-table="Rack" data-column="id" data-value="{{$rack->id}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif

                                    @if(delete())
                                    <form action="{{ route('admin.rack.destroy', $rack->id) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('cruds.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif
                                </td>
                                <td>{{ $rack->rack_code ?? '' }}</td>
                                <td>{{ isset($rack->branch)?$rack->branch->short_name : '' }}</td>
                                <td>{{ isset($rack->room)?$rack->room->room_name : '' }}</td>
                                <td>{{ $rack->rack_name ?? '' }}</td>
                                <td>{{ $rack->description ?? '' }}</td>
                                
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
    let route = "{{ route('admin.inventory_management.rack.massDestroy') }}";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
})

$(document).on("click", ".editAction", function() {
    let response = editAction(this);
    $("#update_id").val(response.id);
    $("#rack_code").attr("data-update_id",response.id);
    $("#rack_code").val(response.rack_code);
    $("#rack_name").val(response.rack_name);
    $("#branch_id").val(response.branch_id).trigger('change');
    $("#room_id").val(response.room_id).trigger('change');
    $("#description").val(response.description);
    changeSubmitButtonCaption();
})
</script>
@endsection