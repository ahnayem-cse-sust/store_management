@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card-header">
                    {{ trans('cruds.opening_list') }}
                </div>
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.actions') }}
                                </th>
                                <th>
                                    {{ trans('cruds.opening_code') }}
                                </th>
                                <th>
                                    {{ trans('cruds.opening_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.warehouse') }}
                                </th>
                                <th>
                                    {{ trans('cruds.group') }}
                                </th>
                                <th>
                                    {{ trans('cruds.subgroup') }}
                                </th>
                                <th>{{ __('cruds.item') }}</th>
                                <th>{{ __('cruds.opening_quantity') }}</th>
                                <th>{{ __('cruds.opening_price') }}</th>
                                <th>{{ __('cruds.description') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($openings as $key => $opening)
                            <tr data-entry-id="{{ $opening->id }}">
                                <td>

                                </td>
                                <td>
                                    @if(show())
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.opening.show', $opening->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endif
                                    {{-- @if(edit())
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.opening.edit', $opening->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif --}}
                                    @if(delete())
                                    <form action="{{ route('admin.opening.destroy', $opening->id) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('cruds.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif
                                </td>
                                <td>
                                    {{ $opening->opening_code ?? '' }}
                                </td>
                                <td>
                                    {{ $opening->opening_date ?? '' }}
                                </td>
                                <td>
                                    {{ isset($opening->warehouse)?$opening->warehouse->warehouse_name:'' }}
                                </td>
                                <td>
                                    {{ isset($opening->group)?$opening->group->group_name:'' }}
                                </td>
                                <td>
                                    {{ isset($opening->subgroup)?$opening->subgroup->subgroup_name:'' }}
                                </td>
                                <td>
                                    {{ isset($opening->item)?$opening->item->item_name:'' }}
                                </td>
                                <td>{{ $opening->opening_quantity ?? '' }}</td>
                                <td>{{ $opening->opening_price ?? '' }}</td>
                                <td>{{ $opening->description ?? '' }}</td>
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
    let route = "{{ route('admin.inventory_management.opening.massDestroy') }}";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
})

$(document).on("click", ".editAction", function() {
    let response = editAction(this);
    acl = response.acl;
    acl = acl.split(',');
    $("#update_id").val(response.id);
    $("#name").val(response.name);
    $("#email").val(response.email);
    $("#roles").val(response.role_id).trigger('change');
    
    $("#country_id").val(response.country_id).trigger('change');
    setTimeout(() => {
        $("#acl").val(acl).trigger('change');
        $("#office_id").val(response.office_id).trigger('change');
    }, 1000);
})
</script>
@endsection