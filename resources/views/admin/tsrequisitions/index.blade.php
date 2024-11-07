@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card-header">
                    {{ trans('cruds.tsrequisition_list') }}
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
                                    {{ trans('cruds.tsrequisition_code') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tsrequisition_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.warehouse_from') }}
                                </th>
                                <th>
                                    {{ trans('cruds.warehouse_to') }}
                                </th>
                                <th>
                                    {{ trans('cruds.status') }}
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tsrequisitions as $key => $tsrequisition)
                            <tr data-entry-id="{{ $tsrequisition->id }}">
                                <td>

                                </td>
                                <td>
                                    @if(show())
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tsrequisition.show', $tsrequisition->id) }}" data-placement="top" data-toggle="tooltip" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endif

                                    @if($tsrequisition->status == 'Pending')

                                    @if(edit())
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tsrequisition.edit', $tsrequisition->id) }}" data-placement="top" data-toggle="tooltip" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif

                                    @if(edit())
                                    <a class="btn btn-xs btn-warning" href="/admin/tools_store_management/tsrequisition/approved/{{ $tsrequisition->id }}" data-placement="top" data-toggle="tooltip" title="Click to Approved Requisition">
                                        <i class="fas fa-refresh"></i>
                                    </a>
                                    @endif

                                    @if(delete())
                                    <form action="{{ route('admin.tsrequisition.destroy', $tsrequisition->id) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('cruds.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger" data-placement="top" data-toggle="tooltip" title="Delete">
                                            <i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif

                                    @endif
                                </td>
                                
                                <td>
                                    {{ $tsrequisition->tsrequisition_code ?? '' }}
                                </td>
                                <td>
                                    {{ $tsrequisition->tsrequisition_date ?? '' }}
                                </td>
                                <td>
                                    {{ isset($tsrequisition->warehouseFrom)?$tsrequisition->warehouseFrom->warehouse_name:'' }}
                                </td>
                                <td>
                                    {{ isset($tsrequisition->warehouseTo)?$tsrequisition->warehouseTo->warehouse_name:'' }}
                                </td>
                                <td>
                                    {{ $tsrequisition->status ?? '' }}
                                </td>
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
    let route = "{{ route('admin.tools_store_management.tsrequisition.massDestroy') }}";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
})
</script>
@endsection