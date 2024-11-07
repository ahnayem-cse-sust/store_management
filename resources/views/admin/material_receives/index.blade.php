@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card-header">
                    {{ trans('cruds.material_receive_list') }}
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
                                    {{ trans('cruds.material_receive_code') }}
                                </th>
                                <th>
                                    {{ trans('cruds.material_receive_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.requisition_order_no') }}
                                </th>
                                <th>
                                    {{ trans('cruds.job_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.received_by') }}
                                </th>
                                <th>
                                    {{ trans('cruds.status') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($material_receives as $key => $material_receive)
                            <tr data-entry-id="{{ $material_receive->id }}">
                                <td>

                                </td>
                                <td>
                                    @if(show())
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.material_receive.show', $material_receive->id) }}" data-placement="top" data-toggle="tooltip" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endif

                                   {{--  @if(edit())
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.material_receive.edit', $material_receive->id) }}" data-placement="top" data-toggle="tooltip" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif --}}

                                     @if(edit())
                                    <a class="btn btn-xs btn-warning" href="/admin/main_warehouse_management/material_receive/approved/{{ $material_receive->id }}" data-placement="top" data-toggle="tooltip" title="Click to Approved Requisition">
                                        <i class="fas fa-refresh"></i>
                                    </a>
                                    @endif

                                    @if(delete())
                                    <form action="{{ route('admin.material_receive.destroy', $material_receive->id) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('cruds.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger" data-placement="top" data-toggle="tooltip" title="Delete">
                                            <i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif
                                </td>
                                
                                <td>
                                    {{ $material_receive->material_receive_code ?? '' }}
                                </td>
                                <td>
                                    {{ $material_receive->material_receive_date ?? '' }}
                                </td>
                                <td>
                                    {{ $material_receive->requisition_order_no ?? '' }}
                                </td>
                                <td>
                                    {{ $material_receive->job_no ?? '' }}
                                </td>
                                <td>
                                    {{ isset($material_receive->receivedBy)?$material_receive->receivedBy->name:'' }}
                                </td>
                                <td>
                                    {{ $material_receive->status ?? '' }}
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
    let route = "{{ route('admin.main_warehouse_management.material_receive.massDestroy') }}";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
})
</script>
@endsection