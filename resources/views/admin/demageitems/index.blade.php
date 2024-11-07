@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card-header">
                    {{ trans('cruds.demageitem_list') }}
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
                                    {{ trans('cruds.warehouse') }}
                                </th>
                                <th>
                                    {{ trans('cruds.demageitem_code') }}
                                </th>
                                <th>
                                    {{ trans('cruds.item') }}
                                </th>
                                <th>
                                    {{ trans('cruds.group') }}
                                </th>
                                <th>
                                    {{ trans('cruds.subgroup') }}
                                </th>
                                <th>{{ __('cruds.quantity') }}</th>
                                <th>{{ __('cruds.demage_by') }}</th>
                                <th>{{ __('cruds.remarks') }}</th>
                                <th>{{ __('cruds.status') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($demageitems as $key => $demageitem)
                            <tr data-entry-id="{{ $demageitem->id }}">
                                <td>

                                </td>
                                <td>
                                    @if(show())
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.demageitem.show', $demageitem->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endif
                                    @if(edit())
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.demageitem.edit', $demageitem->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif
                                    @if(edit())
                                    <a class="btn btn-xs btn-warning" href="/admin/tools_store_management/demageitem/approved/{{ $demageitem->id }}" data-placement="top" data-toggle="tooltip" title="Click to Approved Requisition">
                                        <i class="fas fa-refresh"></i>
                                    </a>
                                    @endif
                                    @if(delete())
                                    <form action="{{ route('admin.demageitem.destroy', $demageitem->id) }}" method="POST"
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
                                    {{ isset($demageitem->warehouse)?$demageitem->warehouse->warehouse_name:'' }}
                                </td>
                                <td>
                                    {{ $demageitem->demageitem_code ?? '' }}
                                </td>
                                <td>
                                    {{ isset($demageitem->item)?$demageitem->item->item_code.' - '.$demageitem->item->item_name:'' }}
                                </td>
                                <td>
                                    {{ isset($demageitem->group)?$demageitem->group->group_name:'' }}
                                </td>
                                <td>
                                    {{ isset($demageitem->subgroup)?$demageitem->subgroup->subgroup_name:'' }}
                                </td>
                                <td style="text-align: right">{{ $demageitem->quantity ?? '' }}</td>
                                <td>
                                    {{ isset($demageitem->demageBy)?$demageitem->demageBy->epf_no . ' - ' .$demageitem->demageBy->name:'' }}
                                </td>
                                <td>{{ $demageitem->remarks ?? '' }}</td>
                                <td>{{ $demageitem->status ?? '' }}</td>
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
    let route = "{{ route('admin.tools_store_management.demageitem.massDestroy') }}";
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